<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; //user model path
use App\Models\candidates; //candidate model path
use App\Models\positions; //position model path
use App\Models\votes; //votes model path
use Hash; //for encrypting password
use Session; //for Session

class CustomAuthController extends Controller
{
    //

    public function login(){
        return view("auth.login");
    }
    public function register(){
        return view("auth.registration");
    }

    // function for user registration 
    public function registerUser(Request $request){
        // adding validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
        // registration logic: to fetch data
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save(); //this command is used to save the data into database
        // message
        if($res){
            // success message
            return back()->with('success','You have registered successfully!');
        }else{
            // failed message
            return back()->with('fail','Something went wrong!');
        }
    }

    // function for user login
    public function loginUser(Request $request){
        // adding validation
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        // login logic: to fetch data
        $user = User::where('email', '=', $request->email)->first();
            // where: this keyword is used to check if email id or any data is present inside the user database or not
        if($user){
            // compare the password with Hash
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id); //saving the ID of the logged-in user to the loginId
                $request->session()->put('isAdmin', $user->is_admin); //saving the is_admin of the logged-in admin to the isAdmin
                $request->session()->put('status', $user->status); //saving the status of the logged-in admin to the isAdmin
                // checking for admin
                if($user->is_admin==1){
                    // redirect to admin/home link
                    return redirect()->route('admin.home');
                }else{
                    // redirect to user/home link
                    return redirect('dashboard');
                }
            }else{
                return back()->with('fail','Password not matched.');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }

    // function for dashboard
    public function dashboard(){
        // to see user's data
        $data = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $data = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $position = positions::get();
        $candidate = candidates::get();

        $title = session('title');

        return view('dashboard', compact('data','position','candidate','title'));
    }

    // function for admin/home
    public function adminHome(){
        $admin = array();
        if(Session::has('loginId')){
            // user is loggedIn
            $admin = User::where('id', '=', Session::get('loginId'))->first(); //to setIn the login id
        }

        $voter = User::where('is_admin','0')->count();
        $voted = User::where('status', '1')->count();
        $candidate = candidates::get();
        $position = positions::get();
        $vote = votes::get();

        return view('admin-home', compact('admin','voter','voted','candidate','position','vote'));
    }

    // function for logout
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId'); //to forgot the login id
            return redirect('/');
        }
    }

}
