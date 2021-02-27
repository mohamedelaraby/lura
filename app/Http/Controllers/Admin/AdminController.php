<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\loginRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     *  Display admin dashboard
     *
     * @return Response
     */
    public function dashboard(){
        return view('admin.dashboard');
    }


     /**
     *  Display admin login view
     *
     * @return Response
     */
    public function index(){
        return view('admin.Auth.login');
    }

    /**
     *  Manage Admin login
     *
     * @return Response
     */
    public function login(loginRequest $request){

        if(auth()->guard('admin')->attempt($this->loginCredential($request))){
            return redirect()->route('admin.dashboard');
        }

        // If fail redirect with errors
        show_message('error',trans('auth.data-errors'));
        return redirect()->back();
    }


    /**
     *  Login request credentials
     *
     * @return array
     */
    protected function loginCredential(loginRequest $request){
        return [
            'email'=> $request->input('email'),
            'password' => $request->input('password'),
            'remember_me' =>$this->isRemember($request),
         ];
    }

      /**
     *  Check reuqest  remeber me token
     *
     * @return bool
     */
    protected function isRemember(loginRequest $request){
        return $request->has('remember_me') ? true: false;
    }
}
