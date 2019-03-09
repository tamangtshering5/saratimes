<?php

namespace App\Http\Controllers\backend;

use App\Catagory;
use App\CatagoryPostmodel;
use App\Post;
use App\PostModel;
use App\SubCatagory;
use App\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class postController extends Controller
{
    public function post(){
        $catas=Catagory::all();
        $subcatas=SubCatagory::all();
        return view('backend.pages.post.post',compact('catas','subcatas'));
    }

    public function post_action(Request $request){
        //dd($request->all());
        $random=str_random(7);
        $main_img=$request->main_image;
        $featured_img=$request->featured_image;
        $filename=$random.$main_img->getClientOriginalName();
        $main_img->move(public_path().'/backend/images/post',$filename);
        $filename2=$random.$featured_img->getClientOriginalName();
        $featured_img->move(public_path().'/backend/images/post',$filename2);
        $post=new PostModel;
        $post->title=$request->title;
        $post->detail=$request->detail;
        //$filename=$random.$main_img->getClientOriginalName();
        $post->main_image=$filename;
        //$filename2=$random.$featured_img->getClientOriginalName();
        $post->featured_image=$filename2;
        $post->save();

        $post_id=$post->id;

        if(input::has('checked_cata')){
            $checked_cata=$request->checked_cata;
            /*$main_img=$request->main_image;
            $featured_img=$request->featured_image;
            $title=$request->title;
            $detail=$request->detail;*/
            //dd($checked_cata);
            foreach ($checked_cata as $data){



                $pos=PostModel::find($post_id);
                $pos->Catagory()->attach([$data]);

            }

        }

        if(input::has('checked_subcata')){
            //dd($request->all());
            $checked_subcata=$request->checked_subcata;
            /*$cat_id=$request->cat_id;
            $main_img=$request->main_image;
            $featured_img=$request->featured_image;
            $title=$request->title;
            $detail=$request->detail;*/
            foreach ($checked_subcata as $subdata){
                /*$subpost=new PostModel;
                $subpost->title=$title;
                $subpost->detail=$detail;
                $filename=$random.$main_img->getClientOriginalName();
                $subpost->main_image=$filename;
                $filename2=$random.$featured_img->getClientOriginalName();
                $subpost->featured_image=$filename2;
                $subpost->save();*/

                //$post_id=$subpost->id;
                $subpos=PostModel::find($post_id);
                $subpos->SubCatagory()->attach([$subdata]);
            }

        }
        return redirect()->back()->with('success','post added successfully!!');
    }

    public function catacheck_find(Request $request){
        $id=(int)$request->pcat_id;
//        dd($id);
        $datas=SubCatagory::where('catagory_id',$id)->get();

//        dd($datas);
        return view('backend.pages.post.catacheck-display',[
            'data'=>$datas,'cat_id'=>$id,'CatByUser'=>'All Products'
        ]);
//        return response()->json($datas);
    }

    public function catapost_find(Request $request){
        $id=(int)$request->pcat_id;
        $datas=Catagory::find($id)->Post()->get();

        return view('backend.pages.post.catapost-display',[
            'data'=>$datas,'a'=>$id,'CatByUser'=>'All Products'
        ]);
    }



    public function catapostedit_action(Request $request){
        $id=(int)$request->id;
        $data=PostModel::find($id);
        /*if(input::has('catagory')){
            //dd($request->catagory);

            $data->Catagory()->sync([$request->catagory]);

        }
        if(input::has('subcatagory')){
            //$data->Catagory()->detach();
            $data->SubCatagory()->attach([$request->subcatagory]);
        }*/

        if(input::hasFile('main_image')){
            $file=input::file('main_image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/post',$filename);
            $data->main_image=$filename;
        }
        if(input::hasFile('featured_image')){
            $file=input::file('featured_image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/post',$filename);
            $data->featured_image=$filename;
        }
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect()->back()->with('success','post updated successfully!!');
    }

    public function catapost_del(Request $request){
        $id=(int)$request->id;
        $data=PostModel::find($id);
        $data->Catagory()->detach();
        $data->delete();
        return redirect()->back()->with('success','post deleted successfully!!');
    }

    public function subcatapost_find(Request $request){
        $id=(int)$request->pcat_id;
        $datas=SubCatagory::find($id)->Post()->get();
        return view('backend.pages.post.subcatapost-display',[
            'data'=>$datas,'a'=>$id,'CatByUser'=>'All Products'
        ]);
    }

    public function catapost_edit(Request $request){
        $id=(int)$request->id;
        $data=PostModel::find($id);
        $catas=Catagory::all();
        $cat_id=$data->catagory_id;
        //$cats=Catagory::find($cat_id);
        $cats=PostModel::find($id)->Catagory()->first();
//        if(PostModel::find($id)->SubCatagory()->count() > 0){
            $subcats=PostModel::find($id)->SubCatagory()->first();
//        }

        $subcatas=SubCatagory::all();
        return view('backend.pages.post.catapost-edit',compact('data','catas','cats','subcatas','subcats'));
    }

    public function subcatapost_edit(Request $request){
        $id=(int)$request->id;
        $data=PostModel::find($id);
        $catas=Catagory::all();
        $cat_id=$data->catagory_id;
        $cats=Catagory::find($cat_id);
        $subcatas=SubCatagory::all();
        $subcat_id=$data->subcatagory_id;
        $subcats=SubCatagory::find($subcat_id);
        return view('backend.pages.post.subcatapost-edit',compact('data','catas','cats','subcatas','subcats'));
    }

    public function subcatapostedit_action(Request $request){
        $id=(int)$request->id;
        $data=PostModel::find($id);
        /*if(input::has('catagory')){
            //dd($request->catagory);

            $data->Catagory()->sync([$request->catagory]);

        }
        if(input::has('subcatagory')){
            //$data->Catagory()->detach();
            $data->SubCatagory()->attach([$request->subcatagory]);
        }*/

        if(input::hasFile('main_image')){
            $file=input::file('main_image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/post',$filename);
            $data->main_image=$filename;
        }
        if(input::hasFile('featured_image')){
            $file=input::file('featured_image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/post',$filename);
            $data->featured_image=$filename;
        }
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect()->back()->with('success','post updated successfully!!');
    }

    public function subcatapost_del(Request $request){
        $id=(int)$request->id;
        $data=PostModel::find($id);
        $data->SubCatagory()->detach();
        $data->delete();
        return redirect()->back()->with('success','post deleted successfully!!');
    }

    public function hell(Request $request){
        dd($request->all());
    }

}
