<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    

        return view('announcements.index' , ['announcements' => Announcement::all()->sortByDesc('created_at')]);

        //
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
        //
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
}
