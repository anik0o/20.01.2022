<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function alone()
    {
        return view('profile.alone');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //validation rules

        $request->validate([
            'nick' =>'min:4|string|max:255',

        ]);
        $user =Auth::user();
        $user->nick = $request['nick'];

        $oldImagePath = $user->photo;
        if ($request->hasFile('photo')) {
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $user->photo = $request->file('photo')->store('users');
        }
        $user->save();
        return redirect('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function join($id)
    {
        $users = Auth::user();
        $groups = Group::find($id);

        $users -> group_id = $groups -> id;
        $users -> save();

        return redirect('/groups/yours/'.$groups ->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::find($user);
        return view('profile.edit', compact('users'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function leave()
    {
        $users = Auth::user();
        $users->group_id = null;
        $users->save();
        return redirect('/withoutgroup')->with('success','Opuściłeś grupę');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function out(Request $request, $id)
    {   $group=$request->user();
        $users = User::find($id);
        $users->group_id = null;
        $users->save();
        return redirect('/groups/users/list/'.$group->group_id)->with('success','Usunąłeś użytkownika z grupy');
    }


}
