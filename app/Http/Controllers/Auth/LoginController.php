<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
      return view('auth.login');
    }

    public function verify(Request $req){

     //   $validator = Validator::make($req->all(), [
     //   'uname' => 'required',
     //   'psw' => 'required',
     // ])->validate();

      $user = User::where('email', $req->email)
           ->where('password', $req->password)
           ->first();
      $name=$user['name'];
     if($user){

           $req->session()->put('uname', $req->email);
           $req->session()->put('name', $name);
           return redirect()->route('admin.index');
     }

     else{

          return redirect()->route('login.index');

      }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
