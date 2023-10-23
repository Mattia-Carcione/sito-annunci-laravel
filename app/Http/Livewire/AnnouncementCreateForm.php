<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnnouncementCreateForm extends Component
{

    use WithFileUploads;

    public $title, $description, $price, $category, $temporary_images, $images = [];
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
        'temporary_images.required' =>'L\'immagine è richiesta',
        'temporary_images.*.image' =>'I file devono essere immagini',
        'temporary_images.*.max' =>'L\'immagine deve essere massimo di un mb'

    ];

    public function updatedTemporaryImages () {
         if ($this->validate([
            'temporary_images.*'=> 'image| max: 1024'
         ])) {
            
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
         }
         
    }

    public function removeImage($key) {
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function store()
    {
        $this->validate();
        $category = Category::find($this->category);

        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price
        ]);
        if (count($this->images)) {
            foreach($this->images as $image) 
            { $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
            } 
        }
        Auth::user()->announcements()->save($announcement);

        session()->flash('message', 'Annuncio inserito con successo');
        $this->clearForm();
    }
    public function render()
    {
        return view('livewire.announcement-create-form');
    }

    public function clearForm() {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->images = '';
        $this->temporary_images = '';
    }

    protected function updated($propertyName) {
        $this->validateOnly($propertyName);
    }
}