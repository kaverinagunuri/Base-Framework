<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\FileLoader;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
Use Illuminate\Support\Facades\Hash;
use DateTime;
use Mail;
use Illuminate\Http\Request;

class BaseFrameworkController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        return view('registration.register');
    }

    public function Register() {
        $FirstName = Input::get('FirstName');
        $lastName = Input::get('LastName');
        $Gender = Input::get('gender');

        $Date = new DateTime;
        $Email = Input::get('UserName');
        $Password = Input::get('Password');
        $ValidationToken = md5($Email);
        $body = "Dear $FirstName Please click on the below link to validate your email."
                . "http://baseframework.karmanya.dev/verifyEmail/$ValidationToken";
        $val = Mail::raw($body, function ($ValidationToken)use($Email) {

                    $ValidationToken->from('kaveri.nagunuri@karmanya.co.in', 'kaveri');
                    $ValidationToken->to($Email)->subject('Generated ');
                });
        $validator = Validator::make(Input::all(), array(
                    'UserName' => 'required|max:50|email',
                    'FirstName' => 'required|max:50|min:3',
                    'LastName' => 'required|max:50|min:3',
                    'Password' => 'required|min:6',
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('index')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user = User::create(['FirstName' => $FirstName,
                        'LastName' => $lastName,
                        'GenderId' => $Gender,
                        'UserName' => $Email,
                        'Password' => $Password,
                        'ValidationToken' => $ValidationToken,
                        'IsValidated' => 0,
                        'CreatedAt' => $Date,
                        'UpdateAt' => $Date]);
            $info = null;
            if ($user) {
                $info.="successfully registered";
            } else {
                $info.="There is a problem in registration.Please try Again!";
            }
        }
        return view('registration.register', ['message' => $info]);
    }

    public function Login($ValidationToken) {
        $Check = User::select('UserName')->where('ValidationToken', $ValidationToken)->count();
        if ($Check == 0) {
            $validate="Invalid Token";
            return Redirect::route('index')
                            ->withErrors($validate)
                            ->withInput();
            //return view('registration.register', ['message' => 'Invalid Token ']);
        } else {

            User::where('ValidationToken', $ValidationToken)->update(['IsValidated' => 1]);
           return Redirect::route('index');
                  
             //return view('layouts.app');
         
        }
    }
    public function Dashboard() {
       
           return view('layouts.app');
        
    }

}
