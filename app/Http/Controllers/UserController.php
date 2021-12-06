<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('role')->orderBy('email')->get();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter,dns|unique:users,email',
            'password' =>['required','confirmed','password'=>Password::min(8)->mixedCase()->numbers()->symbols()],
            'role' => 'roles_id'
        ]);



        return redirect()->route('user.index')->with('success','User saved!');
    }



    public function edit(User $user)
    {
        //$user = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit',compact('users','roles'));
    }


    public function update(Request $request, User $user)
    {
        /*$validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter,dns|unique:users,email,'.$user->id.',id',
            'password' =>['nullable','confirmed','password'=>Password::min(8)->mixedCase()->numbers()->symbols()],
            'role' => 'nullable|exists:roles,id'
        ]);*/

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        if( $request->password ){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.index')->with('success','User updated!');
    }



	public function deleteUser()
	{
		$user = User::find(request('id'));
		$user->delete();

		return redirect()->route('user.index')->with('success','User deleted!');
	}

}
