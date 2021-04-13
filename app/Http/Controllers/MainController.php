<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Controller 
use App\Models\Settings;
use App\Models\Social;

class MainController extends Controller
{
    public function index(){
    	$setting = Settings::first();
    	$socials = Social::where('status','0')->get();
    	return view('frontend.index',compact('setting','socials'));
    }
}
