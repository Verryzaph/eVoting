<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\candidates;
use App\Models\positions;
use App\Models\votes;
use Session;

class ElectionController extends Controller
{
    //

    public function addTitle(){
        $admin = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $admin = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $title = session('title');

        return view('election.title', compact('admin','title'));
    }

    public function updateTitle(Request $request){
        session(['title' => $request->title]);

        return redirect()->route('admin.home');
    }

    public function ballot(){
        $admin = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $admin = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $position = positions::get();
        $candidate = candidates::get();

        return view('election.ballot', compact('admin','position','candidate'));
    }

    public function submitVote(Request $request){
        $request->validate([
            'candidates' => 'required|max:3',
        ],[
            'candidates.required' => 'Please vote atleast one candidate',
            'candidates.max' => 'You can only choose :max candidates for this position',
        ]);      

        foreach($request->candidates as $key=>$id){
            $saveRecord = [
                'voters_id' => $request->voter,
                'candidate_id' => $request->candidates[$key],
            ];
            votes::create($saveRecord);
        }

        if(Session::has('loginId')){
            $user = User::where('id', '=', Session::get('loginId'))->first();
            $user->update(['status'=>1]);
        }

        return redirect('submitted');
    }

    public function votes(){
        $admin = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $admin = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $vote = votes::get();
        $user = User::get();
        $candidate = candidates::get();

        return view('election.votes', compact('admin','vote', 'user', 'candidate'));
    }

    public function deleteVote(){
        votes::truncate();
        $user = User::where('is_admin','0');
        $user->update(['status'=>0]);
        return redirect()->route('votes')->with('success','All data deleted successfully.');
    }

    public function submitpage(){
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $vote = votes::get();
        $candidate = candidates::get();
        $title = session('title');

        return view('election.submit', compact('data','vote','candidate','title'));
    }

    public function platform($id){
        $candidate = candidates::find($id);
        return response()->json($candidate);
    }
}
