<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;

class VoterController extends Controller
{
    //

    public function index(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $user = User::all();
        return view('voters.index', ['admin' => $data, 'data' => $user]);
    }

    public function add(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        return view('voters.form', ['admin' => $data]);
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'level' => $request->level,
        ];

        User::create($data);
        return redirect()->route('voters')->with('success','Voter added successfully.');
    }

    public function edit($id){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $user = User::find($id);
        return view('voters.form',['admin' => $data, 'user' => $user]);
    }

    public function update($id, Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'level' => $request->level,
        ];
        
        User::find($id)->update($data);
        return redirect()->route('voters')->with('success','Voter updated successfully.');
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('voters')->with('success','Voter deleted successfully.');
    }
}
