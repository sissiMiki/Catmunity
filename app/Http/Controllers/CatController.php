<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatController extends Controller
{

public function index()
{
    $cats=Cat::get();
    return view('cat.index',compact('cats'));


}


    public function create()
    {

        return view('cat.create');
    }

    public function edit()
    {


    }

    public function delete()
    {


    }

    public function store()
    // {
	// auth()->user()->addCat(new Cat(request(['name', 'breed', 'gender', 'age', 'description'])));
    // 	$user = auth()->user();
    // 	// return view('profiles.show', compact('user'));
    // 	return redirect()->action('CatController@index');
    // }
{
    $cats = New Cat(['name','breed','gender','age','description']);
    $user = auth()->user();
    $cats->save();
    return redirect()->action('CatController@index');

}

}
