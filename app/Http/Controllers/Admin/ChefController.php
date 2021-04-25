<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
    	return view('adminpanel.chefs.list');
    }
}
