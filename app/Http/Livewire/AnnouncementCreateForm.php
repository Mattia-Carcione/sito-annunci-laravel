<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class AnnouncementCreateForm extends Component
{
    protected $title, $description, $price;

    public function store()
    {
        Announcement::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price
        ]);
    }
    public function render()
    {
        return view('livewire.announcement-create-form');
    }
}
