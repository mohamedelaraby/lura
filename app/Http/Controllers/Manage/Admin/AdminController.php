<?php

namespace App\Http\Controllers\Manage\Admin;

use App\Http\Controllers\Controller;
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
}
