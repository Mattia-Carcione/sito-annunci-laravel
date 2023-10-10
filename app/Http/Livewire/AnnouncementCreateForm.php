<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AnnouncementCreateForm extends Component
{
    protected $title, $description, $price;
    public function render()
    {
        return view('livewire.announcement-create-form');
    }
}
