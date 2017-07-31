<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function getList()
    {
    	return view('admin.user.list');
    }

    public function getCreate()
    {
    	return view('admin.user.create');
    }

    public function postStore()
    {

    }
}
