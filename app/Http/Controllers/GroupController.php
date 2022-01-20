<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::paginate(2);
        return view('group.show', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth_user=$request->user();
        $groups = new Group;
        $groups->about = $request->input('about');
        $groups->name_of_group = $request->input('name_of_group');
        $oldImagePath = $groups->picture;
        if ($request->hasFile('picture')) {
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $groups->picture = $request->file('picture')->store('groups');
        }
        else $groups->picture = '1';
        $groups->admin_id = $auth_user->id;
        $groups->save();
        $auth_user->group_id=$groups->id;
        $auth_user->save();
        return redirect('groups/yours/'.$groups->id);//->back()->with('state', 'Utworzono grupę');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Group::find($id);
        return view('group.view', compact('groups'));
    }
    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search_name = $request -> get('query');
        $groups = Group::where('name_of_group','LIKE','%'.$search_name.'%')->get();

        return view('group.search', compact('groups'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::find($id);
        return view('group.edit', compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $groups = Group::find($id);
        $groups->name_of_group = $request->input('name_of_group');
        $groups->about = $request->input('about');
        $oldImagePath = $groups->picture;
        if ($request->hasFile('picture')) {
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $groups->picture = $request->file('picture')->store('groups');
        }
        $groups->update();
        return redirect('groups/yours/'.$groups->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function menu()
    {
        return view('group.menu');
    }
    public function view()
    {
        return view('group.view');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function list($id)
    {
        $users = User::where('group_id',$id)->get();
        return view('group.list', compact('users'));
    }

}
