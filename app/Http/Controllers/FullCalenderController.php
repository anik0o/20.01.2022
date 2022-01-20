<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FullCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth_user = $request->user();
        $events = new Event;
        $events->title = $request->input('title');
        $events->start_day = $request->input('start_day');
        $events->start_time = $request->input('start_time');
        $events->end_day = $request->input('end_day');
        $events->end_time = $request->input('end_time');
        $events->status = '0';
        $events->owner_id = $auth_user->id;
        $events->group_id = $auth_user->group_id;
        $events->save();
        return redirect('full')->with('success','Zadanie "'. $events->title .'" zostało dodane do terminarza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('events.edit', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'min:4|string|max:255',

        ]);
        $auth_user=$request->user();
        $events = Event::find($id);
        $events->title = $request->input('title');
        $events->start_day = $request->input('start_day');
        $events->start_time = $request->input('start_time');
        $events->end_day = $request->input('end_day');
        $events->end_time = $request->input('end_time');
        $events->status = '0';
        $events->owner_id = $auth_user->id;
        $events->group_id = $auth_user->group_id;
        $events->save();
        return redirect('full')->with('success','Informacje na temat zadania "'. $events->title .'" zostały zaktualizowane.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);
        Event::find($id)->delete();

        return redirect('full')->with('success','Zadanie "'. $events->title .'" zostało usunięte z terminarza.');
    }
    public function display(Request $request)
    {
        $auth_user = $request->user()->group_id;
        $events = Event::where('group_id',$auth_user)->get();
        return view('events.index', compact('events'));
    }
}
