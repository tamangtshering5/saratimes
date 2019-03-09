<?php

namespace App\Http\Controllers\backend;

use App\CompanyDetail;
use App\Seo;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class settingsController extends Controller
{
    public function settings(){
        $datas=CompanyDetail::all();
        $socials=Social::all();
        $seos=Seo::all();
        return view('backend.pages.settings.settings',compact('datas','socials','seos'));
    }

    public function company_action(Request $request){
        $id=(int)$request->id;
        $data=CompanyDetail::find($id);
        if(input::hasFile('logo')){
            $file=input::file('logo');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/company/',$filename);
            $data->logo=$filename;
        }
        $data->detail=$request->detail;
        $data->save();
        return redirect()->back()->with('success','company detail updated successfully!!');
    }

    public function social_action(Request $request){
        $id=(int)$request->id;
        $data=Social::find($id);
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->instagram=$request->instagram;
        $data->linkedin=$request->linkedin;
        $data->youtube=$request->youtube;
        $data->save();
        return redirect()->back()->with('success','social sites updated successfully!!');
    }

    public function seo_action(Request $request){
        $id=(int)$request->id;
        $data=Seo::find($id);
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->author=$request->author;
        $data->save();
        return redirect()->back()->with('success','social sites updated successfully!!');
    }
}
