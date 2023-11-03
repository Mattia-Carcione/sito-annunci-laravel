<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function profile() {
        $announcements=Auth::user()->announcements()->orderBy("created_at","desc")->paginate(4);
        return view('users.profile', compact('announcements'));
    }
}
