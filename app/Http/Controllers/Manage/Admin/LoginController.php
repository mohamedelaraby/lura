<?php

namespace App\Http\Controllers\Manage\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     *  Display admin login view
     *
     * @return Response
     */
    public function index(){
        return view('admin.Auth.login');
    }
}
