<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('isRevisor')->except('becomeRevisor');
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
     Mail::to('admin@findeasy.it')->send(new BecomeRevisor(Auth::user())); 
     return redirect()->back()->with('message', 'Complimenti, hai richiesto di diventare revisore correttamente'); 
    }

    public function makeRevisor(User $user){
        Artisan::call('FindEasy:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti! l\'utente è diventato revisore');
    }
}
