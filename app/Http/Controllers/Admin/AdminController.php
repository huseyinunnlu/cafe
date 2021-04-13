<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Controller 
use App\Models\Settings;
use App\Models\Social;
//Request
use App\Http\Requests\SettingsRequest;
use App\Http\Requests\SocialRequest;

class AdminController extends Controller
{
    public function index(){
        return view('adminpanel.dashboard');
    }
    public function settings(){
    	$setting = Settings::first() ?? abort(404,'Quiz Bulunamadı');
    	$socials = Social::get();
    	return view('adminpanel.settings.settings',compact('setting','socials'));
    }


    public function update(SettingsRequest $request ,$id){
    	$key = '';
        $keys = array_merge(range('a', 'z'), range('A', 'Z'));
        for($i=0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    	if($request->hasFile('logo')){
        $filename = $key.'.'.$request->logo->extension();
        $filenameWithUpload = 'uploads/'.$filename;
        $request->logo->move(public_path('uploads'),$filename);
        $request->merge([
            'logo'=>$filenameWithUpload
        ]);
    	}
        Settings::find($id)->update($request->post());
        return redirect()->back()->withsuccess('Successfuly Updated');
    }



    public function socialCreate(SocialRequest $request){
    	Social::create($request->post());
    	return redirect()->back()->withsuccess('Social Media Link Has Added Successfuly');
    }

    public function socialEdit($id){
        $setting = Settings::first() ?? abort(404,'Quiz Bulunamadı');
        $socials = Social::get();
        $social = Social::find($id);
        return view('adminpanel.settings.settings',compact('setting','socials','social'));
    }
    
    public function socialUpdate(SocialRequest $request,$id){
    	Social::find($id)->update($request->post());
    	return redirect()->route('settings.index')->withsuccess('Social Media Link Has Updated Successfuly');
    }    
    public function socialDestroy($id){
        Social::find($id)->delete() ?? abort(404,'Link Not found');
        return redirect()->back()->withsuccess('Social Media Link Has Deleted Successfuly');
    }
}
