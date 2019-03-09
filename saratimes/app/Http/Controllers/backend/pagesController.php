<?php

namespace App\Http\Controllers\backend;

use App\Catagory;
use App\SubCatagory;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class pagesController extends Controller
{
    public function category(){
        $count=Catagory::count();
        $skip=$count-2;
        $catas=Catagory::skip(2)->take($skip)->get();
        return view('backend.pages.catagory-section.catagory',compact('catas'));
    }

    public function catagory_action(Request $request){
        $this->validate($request,['catagory'=>'required|unique:catagories',
        'slug'=>'required|unique:catagories']);
        $cata=new Catagory;
        $cata->catagory=$request->catagory;
        $cata->slug=$request->slug;
        $cata->save();
        return redirect()->back()->with('success','catagory added successfully!!');
    }

    public function catagory_del(Request $request){
        $id=(int)$request->id;
        $data=Catagory::find($id);
        $data->delete();
        return redirect()->back()->with('success','catagory deleted successfully!!');
    }

    public function catagory_edit(Request $request){
        $id=(int)$request->id;
        $data=Catagory::find($id);
        $catas=Catagory::all();
        return view('backend.pages.catagory-section.catagory-edit',compact('data','catas'));
    }

    public function catagoryedit_action(Request $request){
        $id=(int)$request->id;
        $data=Catagory::find($id);
        $data->catagory=$request->catagory;
        $data->slug=$request->slug;
        $data->save();
        return redirect()->back()->with('success','catagory updated successfully!!');
    }
    /*////////subcatagory///////////*/

    public function sub_catagory(){
        $catas=Catagory::all();
        $subcatas=SubCatagory::all();
        return view('backend.pages.catagory-section.sub-catagory',compact('catas','subcatas'));
    }

    public function subcatagory_action(Request $request){
        $this->validate($request,['catagory_id'=>'required','subcatagory'=>'required',
        'slug'=>'required']);
        $subcata=new SubCatagory;
        $subcata->catagory_id=$request->catagory_id;
        $subcata->sub_catagory=$request->subcatagory;
        $subcata->slug=$request->slug;
        $subcata->save();
        return redirect()->back()->with('success','subcatagory added successfully!!');
    }

    public function subcatagory_del(Request $request){
        $id=(int)$request->id;
        $data=SubCatagory::find($id);
        $data->delete();
        return redirect()->back()->with('success','subcatagory deleted successfully!!');
    }

    public function subcatagory_edit(Request $request){
        $id=(int)$request->id;
        $data=SubCatagory::find($id);
        $cat_id=$data->catagory_id;
        $cats=Catagory::find($cat_id);
        $subcatas=SubCatagory::all();
        $catas=Catagory::all();
        return view('backend.pages.catagory-section.subcatagory-edit',compact('data','subcatas','cats','catas'));
    }

    public function subcatagoryedit_action(Request $request){
        $id=(int)$request->id;
        $data=SubCatagory::find($id);
        $data->catagory_id=$request->catagory_id;
        $data->sub_catagory=$request->subcatagory;
        $data->slug=$request->slug;
        $data->save();
        return redirect()->back()->with('success','subcatagory updated successfully!!');
    }

    public function video(){
        $data=Video::all();
        return view('backend.pages.video.video',compact('data'));
    }

    public function video_action(Request $request){
        $this->validate($request,['image'=>'required','url'=>'required','title'=>'required']);
        $data=new Video;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/video/',$filename);
            $data->featured_image=$filename;
        }
        $data->url=$request->url;
        $data->title=$request->title;
        $data->save();
        return redirect()->back()->with('success','video added successfully!!');
    }

    public function video_edit(Request $request){
        $id=(int)$request->id;
        $data=Video::find($id);
        return view('backend.pages.video.video-edit',compact('data'));
    }

    public function videoedit_action(Request $request){
        $id=(int)$request->id;
        $data=Video::find($id);
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/video/',$filename);
            $data->featured_image=$filename;
        }
        $data->url=$request->url;
        $data->title=$request->title;
        $data->save();
        return redirect()->back()->with('success','video updated successfully!!');
    }

    public function video_del(Request $request){
        $id=(int)$request->id;
        $data=Video::find($id);
        $data->delete();
        return redirect()->back()->with('success','video deleted successfully!!');
    }
}
