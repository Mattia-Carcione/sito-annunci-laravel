<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RouteController extends Controller
{

   

    public function homepage()
    {
        return view('welcome', ['announcements' => Announcement::orderBy('created_at','desc')->where('is_accepted', true)->take(6)->get()]);
    }

    public function setLanguage($lang) {

        session()->put('locale', $lang);
        return redirect()->back();

    }
}
