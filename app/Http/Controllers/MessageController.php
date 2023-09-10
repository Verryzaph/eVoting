<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\messages;
use App\Models\User;
use Session;

class MessageController extends Controller
{
    //

    public function submitMessage(Request $request){
        $message = new messages();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return back();
    }

    public function getMessage(){
        $admin = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $admin = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $message = messages::get();
        return view('election.message',compact('admin','message'));
    }

    public function delete($id){
        messages::find($id)->delete();
        return redirect()->route('messages')->with('success','Message deleted successfully.');
    }
}
