<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\candidates;
use App\Models\positions;
use App\Models\User;
use Session;

class CandidateController extends Controller
{
    //

    public function index(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $candidate = candidates::get();
        return view('candidates.index',['admin' => $data, 'data' => $candidate]);
    }

    public function add(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $position = positions::get();
        return view('candidates.form', ['admin' => $data, 'position' => $position]);
    }

    public function save(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'position' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'platform' => 'required',
        ]);

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'position' => $request->position,
            'profile' => $request->profile,
            'platform' => $request->platform,
        ];

        if($image = $request->file('profile')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis'). '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['profile'] = "$profileImage";
        }
        
        candidates::create($data);
        return redirect()->route('candidates')->with('success','Candidate added successfully.');
    }

    public function edit($id){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $candidate = candidates::find($id);
        $position = positions::get();
        return view('candidates.form',['admin' => $data, 'candidate' => $candidate, 'position' => $position]);
    }

    public function update($id, Request $request){
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'platform' => $request->platform,
            'position' => $request->position
        ];

        if($image = $request->file('profile')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis'). '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['profile'] = "$profileImage";
        }else{
            unset($data['profile']);
        }
        
        candidates::find($id)->update($data);
        return redirect()->route('candidates')->with('success','Candidate updated successfully.');
    }

    public function delete($id){
        candidates::find($id)->delete();
        return redirect()->route('candidates')->with('success','Candidate deleted successfully.');
    }

    public function show($id){
        $candidate = candidates::find($id);
        return response()->json($candidate);
    }
}
