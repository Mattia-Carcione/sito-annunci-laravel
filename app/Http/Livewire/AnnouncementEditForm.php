<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;

use App\Models\Category;
use App\Jobs\ResizeImage;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AnnouncementEditForm extends Component
{

    use WithFileUploads;

    public Announcement $announcement;
    public $title, $description, $price, $category, $temporary_images = [], $images = [], $iteration=0;

    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:8',
        'price' => 'required|numeric',
        'images.*' => 'image|max: 1024',
        'temporary_images.*' => 'image|max: 1024'
    ];

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio',
        'title.min' => 'Il titolo deve avere almeno 4 caratteri',
        'description.required' => 'La descrizione è obbligatoria',
        'description.min' => 'La descrizione deve avere almeno 8 caratteri',
        'price.required' => 'Il prezzo è obbligatorio',
        'price.numeric' => 'Il prezzo deve essere un numero',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di un mb'

    ];

    public function mount()
    {
        $this->title = $this->announcement->title;
        $this->description = $this->announcement->description;
        $this->price = $this->announcement->price;
        $this->category = $this->announcement->category_id;
        if (is_array($this->announcement->images)) {
            $this->temporary_images = $this->announcement->images;
            $this->images = $this->announcement->images;
        } else {
            $this->temporary_images[] = $this->announcement->images;
            $this->images[] = $this->announcement->images;
        }
        
        

    }

    public function updatedTemporaryImages()
    {
        
        if ($this->validate([
            'temporary_images.*' => 'image| max: 1024'
        ])) {

            foreach ($this->temporary_images as $image) {
                $this->images[]= $image;
            }
        }
    }
 
    public function removeImage($key)
    {
        
        if (in_array($key, array_keys($this->images))) {
            dd('test');
            dd($key);
            unset($this->images[$key]);
        }
    }

    protected function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    
    
    public function update()
    {
        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->update($this->validate());
        
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName="announcements/{$this->announcement->id}";
                $newImage=$this->announcement->images()->create(['path' => $image->update($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,300,300),
                    new ResizeImage($newImage->path,600,400),
                    new GoogleVisionSafeSearch($newImage->id), 
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->announcement->user()->associate(Auth::user());
        $this->announcement->update();

        session()->flash('message', 'Annuncio modificato con successo, verrà pubblicato una volta revisionato');
        
    }

    public function render()
    {
        return view('livewire.announcement-edit-form');
    }
}
