<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Models
use App\Models\Settings;
use App\Models\Social;
use App\Models\Gallery;
use App\Models\Chef;

class MainController extends Controller
{
    public function index(){
    	$setting = Settings::first();
    	$socials = Social::where('status','0')->get();
    	$simgs = Gallery::where('status','0')->where('location','0')->orderBy('id','desc')->take(4)->get();
    	$vabout = Gallery::where('type','video')->where('status','0')->where('location','1')->orderBy('id','desc')->first();
        $chefs = Chef::orderBy('id','asc')->limit(3)->get();
    	return view('frontend.index',compact('setting','socials','simgs','vabout','chefs'));
    }

    public function gallery() {
    	$setting = Settings::first();
    	$socials = Social::where('status','0')->get();
    	$galleries = Gallery::where('status','0')->paginate(12);
    	return view('frontend.gallery',compact('setting','socials','galleries'));
    }
}
