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
        $this->middleware('isRevisor')->except('becomeRevisor', 'makeRevisor');
        $this->middleware('auth')->only('becomeRevisor');
    }
    public function index()
    {
        $announcements = Announcement::where('is_accepted', null)->first();
        return view('revisors.revisorhome', compact('announcements'));
    }
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', 'Complimenti, hai accettato l\'annuncio');
    }
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('fail', 'Non hai accettato l\'annuncio');
    }

    public function becomeRevisor()
    {
     Mail::to('admin@findeasy.it')->send(new BecomeRevisor(Auth::user())); 
     return redirect()->back()->with('message', 'Complimenti, hai richiesto di diventare revisore correttamente'); 
    }

    public function makeRevisor(User $user){
        Artisan::call('FindEasy:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }

    public function revisedShow (Announcement $announcement) {
        
        return view('revisors.revisedshow', compact('announcement'));
    }

    public function revisedIndex () {
        $announcements = Announcement::orderBy('updated_at','desc')->where('is_accepted', '!=', null)->paginate(10);
        return view('revisors.revisedindex', compact('announcements'));
    }

    public function search(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', '!=', null)->paginate(10);
        return view('revisors.revisedindex', compact('announcements'));
    }
}
