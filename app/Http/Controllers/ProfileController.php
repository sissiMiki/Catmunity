<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{

    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index(User $user)
    {


		return view('profile.show', compact('users'));
    }

    public function edit()
    {
    	$user = auth()->user();
    	return view('profile.edit', compact('users'));
    }


    public function update()
    {
    	//$user = auth()->user();

    	$user->name = request('name');

    	//$user->address = request('address');

    	$user->save();
    	// dd(DB::getQueryLog());
    	return view('profile.show', compact('users'));

    }
}
