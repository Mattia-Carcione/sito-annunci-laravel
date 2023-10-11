<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function homepage()
    {
        return view('welcome', ['announcements' => Announcement::take(6)->get()->sortByDesc('created_at')]);
    }
}