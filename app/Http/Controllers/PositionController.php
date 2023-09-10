<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\positions;
use App\Models\User;
use Session;

class PositionController extends Controller
{
    //

    public function index(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $position = positions::get();
        return view('positions.index',['admin' => $data, 'data' => $position]);
    }

    public function add(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        return view('positions.form',['admin' => $data]);
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'vote' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'vote' => $request->vote
        ];

        positions::create($data);
        return redirect()->route('positions')->with('success','Position added successfully.');
    }

    public function edit($id){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $position = positions::find($id);
        return view('positions.form',['admin' => $data, 'position' => $position]);
    }

    public function update($id, Request $request){
        $data = [
            'name' => $request->name,
            'vote' => $request->vote
        ];
        
        positions::find($id)->update($data);
        return redirect()->route('positions')->with('success','Position updated successfully.');
    }

    public function delete($id){
        positions::find($id)->delete();
        return redirect()->route('positions')->with('success','Position deleted successfully.');
    }
}
