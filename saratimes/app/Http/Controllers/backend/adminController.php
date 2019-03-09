<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\User;
use school;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    use AuthenticatesUsers;

    public function dashboard(){
        return view('backend.pages.index');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/@dashboard@');
    }

    public function login(){
        return view('backend.pages.login');
    }

    public function login_action(Request $request){
        $this->validate($request,['email'=>'required',
            'password'=>'required|min:6']);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/dashboard');
        }
        return redirect('/@dashboard@')->with('alert','Credentials didnot match!!!');
    }

    public function register(){
        return view('backend.pages.register');
    }

    public function register_action(Request $request){
        $this->validate($request,['name'=>'required|string',
            'email'=>'required',
            'password'=>'required|min:6|confirmed']);

        $request['password']=bcrypt($request->password);
        User::create($request->all());
        /*return redirect('/login')->with('alert','successfully registered!!!');*/
        return redirect('/profile')->with('alert','added successfully!!!');
    }

    public function profile(Request $request){
        $id=(int)$request->id;
        $datas=User::find($id);
        if($datas['utype']=='user'){
            return view('backend/pages/user_profile');
        }else{
            $pem=User::where('utype','user')->get();
            return view('backend/pages/admin_profile',compact('pem'));
        }
    }

    public function edit_userprofile(Request $request){
        $id=(int)$request->id;
        $datas=User::find($id);
        return view('backend.pages.edit_userprofile',compact('datas'));
    }

    public function userprofile_action(Request $request){
        $this->validate($request,['name'=>'required|string',
            'email'=>'required',
            'address'=>'required|string',
            'profession'=>'required|string']);

        $id = (int)$request->id;
        $datas = User::find($id);
        $datas->name=$request->name;
        $datas->email=$request->email;
        $datas->address=$request->address;
        $datas->profession=$request->professsion;
        if(Input::hasfile('image')){
            $file=Input::file('image');
            $file->move(public_path().'/backend/images/profile_image',$file->getClientOriginalName());
            $datas->image=$file->getClientOriginalName();
        }
        $datas->save();
        return redirect()->back()->with('alert','successfully edited!!!');
    }

    public function password_action(Request $request){
        $id=(int)$request->id;
        $this->validate($request,['password'=>'required|min:6|confirmed',
            'oldpassword'=>'required']);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::find($id);



        if(!Hash::check($data['oldpassword'], $user->password)){

            return redirect()->back()->with('error','oopss!!! old password didnt match!!!');
        }
        else{
            $user->password = $data['password'];
            $user->save();
            return redirect()->back()->with('success','Succesfully Updated!!!');
        }
    }

    public function edit_adminprofile(Request $request){
        return view('backend.pages.edit_adminprofile');
    }

    public function adminprofile_action(Request $request){
        $this->validate($request,['name'=>'required|string',
            'email'=>'required',
            'address'=>'required|string',
            'profession'=>'required|string']);
        $datas = User::find(Auth::user()->id);
        $datas->name=$request->name;
        $datas->email=$request->email;
        $datas->address=$request->address;
        $datas->profession=$request->profession;
        if(Input::hasfile('image')){
            $file=Input::file('image');
            $file->move(public_path().'/backend/images/profile_image',$file->getClientOriginalName());
            $datas->image=$file->getClientOriginalName();
        }
        $datas->save();
        return redirect()->back()->with('alert','successfully edited!!!');
    }

    public function profile_del(Request $request){
        $id=(int)$request->id;
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('alert','successfully deleted!!!');

    }
}
