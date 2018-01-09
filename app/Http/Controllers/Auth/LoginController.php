<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){

        return \Auth::user()->role==User::ROLE_ADMIN ? '/admin/home':'/home';
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->invalidate();

        return redirect($request->is('admin/*')? '/admin/login':'/login');
    }
    protected function credentials(Request $request)
    {
        $data= $request->only($this->username(), 'password');

        //$data['phone']=$data['email'];
        $usernameKey= $this->usernameKey();

        if ($usernameKey!=$this->username()){
            $data[$this->usernameKey()]=$data[$this->username()];
            unset($data[$this->username()]);
        }

        return $data;
    }

    protected function usernameKey(){
        $email = \Request::get('email');

        $validator= \Validator::make([
            'email'=>$email
        ], ['email'=>'cpf']);

        if (!$validator->fails()){
            return 'cpf';
        }
        if (is_numeric($email)){
            return'phone';
        }
        return 'email';
    }
}
