<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard');
    }
}
