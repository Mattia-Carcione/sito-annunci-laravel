<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnnouncementCreateForm extends Component
{
    public $title, $description, $price, $category;
    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:8',
        'price' => 'required|numeric'
    ];

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio',
        'title.min' => 'Il titolo deve avere almeno 4 caratteri',
        'description.required' => 'La descrizione è obbligatoria',
        'description.min' => 'La descrizione deve avere almeno 8 caratteri',
        'price.required' => 'Il prezzo è obbligatorio',
        'price.numeric' => 'Il prezzo deve essere un numero'
    ];


    public function store()
    {
        $category = Category::find($this->category);

        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price
        ]);
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
    }

    protected function updated($propertyName) {
        $this->validateOnly($propertyName);
    }
}