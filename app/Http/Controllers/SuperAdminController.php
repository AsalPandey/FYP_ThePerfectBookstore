<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function show_users()
    {
            $users = User::all();
            return view('admin.superhome', compact('users'));

    }

    public function show_admins()
    {
        $users = User::where('usertype', 1)->get();
        return view('admin.superhome', compact('users'));
    }



    public function search_user(Request $request)
    {
        $searchText=$request->search;
        $users= User::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"$searchText%")->orWhere('usertype','LIKE',"$searchText")->get();
        return view('admin.superhome',compact('users'));
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id); // Find the user by ID, or throw a 404 error if not found
        $user->delete(); // Delete the user
        return redirect('/show_users')->with('success', 'User deleted successfully.'); // Redirect back to the users page with a success message
    }

    public function makeadmin($id)
    {
        $user = User::findOrFail($id);
        $user->usertype = 1;
        $user->save();
        return redirect()->back()->with('message','user upgraded to staff');;
    }

}
