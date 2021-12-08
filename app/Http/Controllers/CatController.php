<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatController extends Controller
{

public function index()
{
    $cats=Cat::where('user_id', auth()->user()->id)->get();//all cats belong to user, '()' calls functions




    return view ('cat.index')->with(compact('cats'));


}


    public function create()
    {

        return view('cat.create');
    }

    public function edit(Request $request)
    {

        $cat=Cat::where('id', $request->route('id'))->get();
        return view ('cat.edit')->with(compact('cat'));

    }

    public function update()

    {
        return view ('cat.edit');

    }

    public function delete()
    {


    }

    public function store(Request $request)
    {

        $catdata= $request->all();
        $catdata['user_id'] = auth()->user()->id;


         $cat= Cat::create($catdata); //call function Cat Model create-> create and save


        return redirect()->action ('CatController@index');

    }

    public function __construct()
    {
        $this->middleware('auth');

    }
}
