<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AnnouncementCreateForm extends Component
{

    use WithFileUploads;

    public $title, $description, $price, $category, $temporary_images = [], $images = [], $announcement = [], $iteration=0;
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
            unset($this->images[$key]);
        }
    }


    public function store()
    {
        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());

        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName="announcements/{$this->announcement->id}";
                $newImage=$this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

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
        $this->announcement->save();

        session()->flash('message', 'Annuncio inserito con successo, verrà pubblicato una volta revisionato');
        $this->clearForm();
    }

    public function render()
    {
        return view('livewire.announcement-create-form');
    }

    public function clearForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->iteration++;
        
    }

    protected function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
