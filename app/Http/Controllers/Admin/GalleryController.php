<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::get();
        return view('adminpanel.gallery.gallery',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        if($request->type=='image'){
            $message='Image';
            $key = '';
            $keys = array_merge(range('a', 'z'), range('A', 'Z'));
            for($i=0; $i < 10; $i++) {
                $key .= $keys[array_rand($keys)];
            }
            if($request->hasFile('url')){
                $filename = $key.'.'.$request->url->extension();
                $filenameWithUpload = 'uploads/'.$filename;
                $request->url->move(public_path('uploads'),$filename);
                $request->merge([
                    'url'=>$filenameWithUpload
                ]);
            }
        Gallery::create($request->post());

        }else if($request->type=='video'){
            $message='Video';
            Gallery::create($request->post());
        }else{
            return redirect()->back()->withErrors(['Select Any Url Type']);
        }
        return redirect()->back()->withSuccess($message.' Has Created Successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::get();
        $gallery = Gallery::find($id) ?? abort('404' ,'Gallery Not Found');
        return view('adminpanel.gallery.gallery',compact('gallery','galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->type=='image'){
            $message='Image';
            $key = '';
            $keys = array_merge(range('a', 'z'), range('A', 'Z'));
            for($i=0; $i < 10; $i++) {
                $key .= $keys[array_rand($keys)];
            }
            if($request->hasFile('url')){
                $filename = $key.'.'.$request->url->extension();
                $filenameWithUpload = 'uploads/'.$filename;
                $request->url->move(public_path('uploads'),$filename);
                $request->merge([
                    'url'=>$filenameWithUpload
                ]);
            }
        Gallery::find($id)->update($request->post());

        }else if($request->type=='video'){
            $message='Video';
            Gallery::find($id)->update($request->post());
        }else{
            return redirect()->back()->withErrors(['Select Any Url Type']);
        }
        return redirect()->route('gallery.index')()->withSuccess($message.' Has Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::find($id)->delete();
        return redirect()->route('gallery.index')->withSuccess('Has Deleted Successfuly');
    }
}
