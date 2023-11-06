<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index', 'show', 'search');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements=Announcement::orderBy('created_at','desc')->where('is_accepted', true)->paginate(8);
        return view('announcements.index' , compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreAnnouncementRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //

        return view ('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Announcement $announcement)
    // {
    //     //
    // }
    public function search(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(8);
        return view('announcements.index', compact('announcements'));
    }
}
