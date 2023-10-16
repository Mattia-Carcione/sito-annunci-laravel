<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('IsRevisor')->except('becomeRevisor');
        $this->middleware('auth')->only('becomeRevisor');
    }
    public function index()
    {
        $announcements_to_check = Announcement::where('is_accepted',null)->first();
        return view('revisors.index', compact('announcements_to_check'));
    }
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accetto l\'annuncio');
    }
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Non hai accettato l\'annuncio');
    }

    public function becomeRevisor()
    {
    }
}
