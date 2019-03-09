<?php

namespace App\Http\Controllers\backend;

use App\Bigyapan;
use App\Catagory;
use App\SubCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class bigyapanController extends Controller
{
    public function bigyapan(){
        $cata_count=Catagory::count();
        $catas=Catagory::skip(1)->take($cata_count-1)->get();
        return view('backend.pages.Bigyapan.bigyapan',compact('catas'));
    }

    public function subcatagory_select(Request $request){
        $id=(int)$request->id;
        $datas=SubCatagory::where('catagory_id',$id)->get();
        return response()->json($datas);
    }

    public function bigyapan_action(Request $request){
        $this->validate($request, ['catagory' => 'required',
            'image' => 'required', 'position' => 'required', 'url' => 'required']);
        $data=new Bigyapan;
        $data->catagory_id=$request->catagory;
        $data->subcatagory_id=$request->subcatagory;
        $data->url=$request->url;
        $data->position=$request->position;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/bigyapan/',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->back()->with('success','advertisement added successfully!!');
    }

    public function cataad_find(Request $request){
        $id=(int)$request->pcat_id;
        $datas=Bigyapan::where('catagory_id',$id)->get();
        return view('backend.pages.Bigyapan.cataad-display',[
            'data'=>$datas,'CatByUser'=>'All Products'
        ]);
    }

    public function subcataad_find(Request $request){
        $id=(int)$request->pcat_id;
        $datas=Bigyapan::where('subcatagory_id',$id)->get();
        return view('backend.pages.Bigyapan.subcataad-display',[
            'data'=>$datas,'CatByUser'=>'All Products'
        ]);
    }

    public function cataad_del(Request $request){
        $id=(int)$request->id;
        $data=Bigyapan::find($id);
        $data->delete();
        return redirect()->back()->with('success','advertisement deleted successfully!!');
    }

    public function cataad_edit(Request $request){
        $id=(int)$request->id;
        $data=Bigyapan::find($id);
        $cata_count=Catagory::count();
        $catas=Catagory::skip(1)->take($cata_count-1)->get();
        $cata_id=$data->catagory_id;
        $cats=Catagory::find($cata_id);
        /*$subcata_id=$data->subcatagory_id;
        $subcats=SubCatagory::find($subcata_id);*/
        $subcatas=SubCatagory::all();
        return view('backend.pages.Bigyapan.catabigyapanedit',compact('data','catas','cats','subcatas'));
    }

    public function cataadedit_action(Request $request){
        $id=(int)$request->id;
        $data=Bigyapan::find($id);
        $data->catagory_id=$request->catagory;
        $data->subcatagory_id=$request->subcatagory;
        $data->url=$request->url;
        $data->position=$request->position;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/bigyapan/',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->back()->with('success','advertisement updated successfully!!');
    }

    public function subcataad_edit(Request $request){
        $id=(int)$request->id;
        $data=Bigyapan::find($id);
        $catas=Catagory::all();
        $cata_id=$data->catagory_id;
        $cats=Catagory::find($cata_id);
        $subcata_id=$data->subcatagory_id;
        $subcats=SubCatagory::find($subcata_id);
        $subcatas=SubCatagory::all();
        return view('backend.pages.Bigyapan.bigyapanedit',compact('data','catas','cats','subcats','subcatas'));
    }

    public function subcataadedit_action(Request $request){
        $id=(int)$request->id;
        $data=Bigyapan::find($id);
        $data->catagory_id=$request->catagory;
        $data->subcatagory_id=$request->subcatagory;
        $data->url=$request->url;
        $data->position=$request->position;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/bigyapan/',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->back()->with('success','advertisement updated successfully!!');
    }


    }

