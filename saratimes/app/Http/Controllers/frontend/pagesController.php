<?php

namespace App\Http\Controllers\frontend;

use App\Catagory;
use App\Comment;
use App\CompanyDetail;
use App\Post;
use App\PostModel;
use App\Social;
use App\SubCatagory;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Cmfcmf\OpenWeatherMap;
use App\Http\Controllers\Controller;

class pagesController extends Controller
{
    public function index(){
        $cata_count=Catagory::count();
        $first_cata=Catagory::skip(1)->take(1)->first();
        $catas=Catagory::skip(2)->take($cata_count-2)->get();
        $videos=Video::all();
//dd($catas);
        $popularity=PostModel::orderBy('popularity','desc')->take(4)->get();
        $cat=Catagory::where('slug','samachar')->first();
        $cat_id=$cat->id;
        /*if (Post::where('catagory_id',$cat_id)->count() > 0) {
            //$count_samachar = Post::where('catagory_id', $cat_id)->count();
            $first_samachar = Post::where('catagory_id', $cat_id)->orderBy('id', 'desc')->first();
            $samachar = Post::where('catagory_id', $cat_id)->skip(1)->take(4)->orderBy('id', 'desc')->get();
        }
        else{
            $samachar='empty';
        }*/

        if(Catagory::find($cat_id)->Post()->count() > 0){
            $first_samachar=Catagory::find($cat_id)->Post()->orderBy('id','desc')->first();
            $samachar=Catagory::find($cat_id)->Post()->skip(1)->take(4)->orderBy('id','desc')->get();
        }
        else{
            $samachar='empty';
        }

        $break_data=Catagory::where('slug','break')->first();
        $break_id=$break_data->id;
        if (Catagory::find($break_id)->Post()->count() > 0) {
            //$count_samachar = Post::where('catagory_id', $break_id)->count();
            $sidebreak = Catagory::find($break_id)->Post()->orderBy('id', 'desc')->take(3)->get();
            $break = Catagory::find($break_id)->Post()->orderBy('id', 'desc')->get();

        }
        else{
            $break='empty';
        }
//        for post according to 4rd catagory
        $third_cata=Catagory::skip(3)->first();
        $third_cata_id=$third_cata->id;
        if (Catagory::find($third_cata_id)->Post()->count() > 0) {
            $arthik_count = Catagory::find($third_cata_id)->Post()->count();
            $first_arthik = Catagory::find($third_cata_id)->Post()->orderBy('id', 'desc')->first();
            $arthik = Catagory::find($third_cata_id)->Post()->skip(1)->take($arthik_count - 1)->orderBy('id', 'desc')->get();
       }
        else{
            $arthik='empty';
        }
//        for post according to 5th catagory
        $forth_cata=Catagory::skip(4)->first();
        $forth_cata_id=$forth_cata->id;
        if (Catagory::find($forth_cata_id)->Post()->count() > 0) {
            $rajnitik_count = Catagory::find($forth_cata_id)->Post()->count();
            $first_rajnitik = Catagory::find($forth_cata_id)->Post()->orderBy('id', 'desc')->first();
            $rajnitik = Catagory::find($forth_cata_id)->Post()->skip(1)->take($rajnitik_count - 1)->orderBy('id', 'desc')->get();
      }
      else{
            $rajnitik='empty';
      }

//        for post according to 6th catagory
        $fifth_cata=Catagory::skip(5)->first();
        $fifth_cata_id=$fifth_cata->id;
       if (Catagory::find($fifth_cata_id)->Post()->count() > 0){
            $fifthcatapost_count=Catagory::find($fifth_cata_id)->Post()->count();
            $first_fifthcatapost=Catagory::find($fifth_cata_id)->Post()->orderBy('id','desc')->first();
            $fifthcatapost=Catagory::find($fifth_cata_id)->skip(1)->take($fifthcatapost_count-1)->orderBy('id','desc')->get();
      }
       else{
           $fifthcatapost='empty';
       }

//        for post according to 7th catagory
        $sixth_cata=Catagory::skip(6)->first();
       $sixth_cata_id=$sixth_cata->id;
        if (Catagory::find($sixth_cata_id)->Post()->count() > 0){
            $sixthcatapost_count=Catagory::find($sixth_cata_id)->Post()->count();
            $first_sixthcatapost=Catagory::find($sixth_cata_id)->Post()->orderBy('id','desc')->first();
            $sixthcatapost=Catagory::find($sixth_cata_id)->Post()->skip(1)->take($sixthcatapost_count-1)->orderBy('id','desc')->get();
        }
        else{
            $sixthcatapost='empty';
        }
//        for post according to 8th catagory
        $eighth_cata=Catagory::skip(7)->first();
        $eighth_cata_id=$eighth_cata->id;
        if (Catagory::find($eighth_cata_id)->Post()->count() > 0){
            $eighthcatapost_count=Catagory::find($eighth_cata_id)->Post()->count();
            $first_eighthcatapost=Catagory::find($eighth_cata_id)->Post()->orderBy('id','desc')->first();
            $eighthcatapost=Catagory::find($eighth_cata_id)->Post()->skip(1)->take(4)->orderBy('id','desc')->get();
        }
        else{
            $eighthcatapost='empty';
        }

        $company_detail=CompanyDetail::first();
        $social=Social::first();
        $subcatas=SubCatagory::all();

        /*//////weather////////////*/
        $owm = new OpenWeatherMap('b10a91f8985153cd4409621c6ade3711');
        $weather = $owm->getWeather('Kathmandu')->temperature->now->getValue();
        $celsius=($weather-32)*(5/9);


        return view('frontend.pages.index',compact('first_cata','catas','first_samachar','samachar','first_arthik','arthik',
            'first_rajnitik','rajnitik','first_fifthcatapost','fifthcatapost','first_sixthcatapost','sixthcatapost','break','sidebreak',
            'first_eighthcatapost','eighthcatapost','popularity','videos','company_detail','social','subcatas','celsius'));
    }

    public function singlepage(Request $request){
        $slug=$request->slug;
        $cat=Catagory::where('slug',$slug)->first();
        $cat_id=$cat->id;
        $cata_name=Catagory::where('id',$cat_id)->first();
        //$datas=Post::where('catagory_id',$cat_id)->orderBy('id','desc')->get();
        $datas=Catagory::find($cat_id)->Post()->orderBy('id','desc')->paginate(6);
        //dd($datas);
        $cata_count=Catagory::count();
        $first_cata=Catagory::skip(1)->take(1)->first();
        $catas=Catagory::skip(2)->take($cata_count-2)->get();
        $company_detail=CompanyDetail::first();
        $social=Social::first();
        $subcatas=SubCatagory::all();
        /*//////weather////////////*/
        $owm = new OpenWeatherMap('b10a91f8985153cd4409621c6ade3711');
        $weather = $owm->getWeather('Kathmandu')->temperature->now->getValue();
        $celsius=($weather-32)*(5/9);
        return view('frontend.pages.singlepage',compact('first_cata','catas','datas','cata_name','cat_id','company_detail','social','subcatas','celsius'));
    }

    public function subsinglepage(Request $request){
        $slug=$request->slug;
        $cata_count=Catagory::count();
        $first_cata=Catagory::skip(1)->take(1)->first();
        $catas=Catagory::skip(2)->take($cata_count-2)->get();
        $subcata=SubCatagory::where('slug',$slug)->first();
        $subcata_id=$subcata->id;
        $subcata_name=SubCatagory::where('id',$subcata_id)->first();
        $sub_datas=SubCatagory::find($subcata_id)->Post()->orderBy('id','desc')->paginate(6);
//        $comment_count=Comment::where('post_id',)
        $company_detail=CompanyDetail::first();
        $social=Social::first();
        $subcatas=SubCatagory::all();
        /*//////weather////////////*/
        $owm = new OpenWeatherMap('b10a91f8985153cd4409621c6ade3711');
        $weather = $owm->getWeather('Kathmandu')->temperature->now->getValue();
        $celsius=($weather-32)*(5/9);
        return view('frontend.pages.subsinglepage',compact('first_cata','catas','subcata_name','sub_datas','subcata_id','company_detail','social','subcatas','celsius'));
    }

    public function detailpage(Request $request){
        $slug=(int)$request->slug;
        $datas=PostModel::where('id',$slug)->first();

        /*$id=(int)$request->id;
        $datas=Post::find($id);*/
        $add = $datas->popularity+1;
        $datas->popularity = $add;
        $datas->save();
        $cata_count=Catagory::count();
        $first_cata=Catagory::skip(1)->take(1)->first();
        $catas=Catagory::skip(2)->take($cata_count-2)->get();

        $comments=Comment::where([['post_id','=',$datas->id],['status','=',1]])->take(2)->get();
        $company_detail=CompanyDetail::first();
        $social=Social::first();
        $subcatas=SubCatagory::all();
        /*//////weather////////////*/
        $owm = new OpenWeatherMap('b10a91f8985153cd4409621c6ade3711');
        $weather = $owm->getWeather('Kathmandu')->temperature->now->getValue();
        $celsius=($weather-32)*(5/9);
        return view('frontend.pages.detailpage',compact('first_cata','catas','datas','comments','company_detail','social','subcatas','celsius'));
    }

    public function subdetailpage(Request $request){
        $slug=(int)$request->slug;
        $datas=PostModel::where('id',$slug)->first();

        //dd($postmodel_id);
        //$a=PostModel::find($postmodel_id);
       // $sub_datas=SubCatagory::find($subcata_id)->Post()->orderBy('id','desc')->paginate(6);

        $add = $datas->popularity+1;
        $datas->popularity = $add;
        $datas->save();
        $cata_count=Catagory::count();
        $first_cata=Catagory::skip(1)->take(1)->first();
        $catas=Catagory::skip(2)->take($cata_count-2)->get();

        $comments=Comment::where([['post_id','=',$datas->id],['status','=',1]])->take(2)->get();
        $company_detail=CompanyDetail::first();
        $social=Social::first();
        $subcatas=SubCatagory::all();
        /*//////weather////////////*/
        $owm = new OpenWeatherMap('b10a91f8985153cd4409621c6ade3711');
        $weather = $owm->getWeather('Kathmandu')->temperature->now->getValue();
        $celsius=($weather-32)*(5/9);
        return view('frontend.pages.subdetailpage',compact('first_cata','catas','datas','comments','company_detail','social','subcatas','celsius'));
    }

    public function comment(Request $request){
        $this->validate($request,['name'=>'required','email'=>'required','message'=>'required',
            'image'=>'max:2000']);
        $data=new Comment;
        $data->post_id=$request->post_id;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->message=$request->message;
        if(input::hasFile('image')){
            $file=input::file('image');
            $filename=time().$file->getClientOriginalName();
            $file->move(public_path().'/backend/images/comment/',$filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->back()->with('success','your comment is sent successfully!!');
    }

    public function comments(Request $request){
        $id=(int)$request->id;
        $datas=PostModel::where('id',$id)->first();
        $comments=Comment::where([['post_id','=',$datas->id],['status','=',1]])->get();
        return view('frontend/pages/comments',compact('comments'));
    }
}
