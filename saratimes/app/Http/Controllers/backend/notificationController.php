<?php

namespace App\Http\Controllers\backend;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class notificationController extends Controller
{
    public function bookingMessages()
    {
        $notifications = Comment::where('count', 0)->limit(5)->get();
        $count = Comment::where('count', '=', '0')->count();
        $output = '';

        if ($count == 0) $output .= "<li><a href='" . route('allbooking-message') . "'><span><span>View Previous Messages</span></span>";

        foreach ($notifications as $key => $notification) {
            $output .= "<li><a href='" . route('allbooking-message') . "'><span>{$notification->name}</span><br>";
            $output .= "<span class='message'> {$notification->email}</span> </a> </li>";
        }
        $response = [
            'status' => true,
            'code' => 200,
            'data' => $output,
            'count' => $count
        ];
        return response()->json($response);
    }

    public function viewbookingMessages(){
        $datas = Comment::Orderby('id','desc')->paginate(10);
        return view('backend.pages.notification.all_notification', compact('datas'));
    }

    public function allbooking_view(Request $request){
        $id=(int)$request->id;
        $datas=Comment::find($id);
        $datas->count=1;
        $datas->save();
        return view('backend.pages.notification.allbooking_show',compact('datas'));
    }

    public function allbooking_delete_action(Request $request){
        $id=(int)$request->id;
        $datas=Comment::find($id);
        $datas->delete();
        return redirect('/dashboard/allcomment')->with('success','deleted successfully!!');
    }

    public function comment_post(Request $request){
        $id=(int)$request->id;
        $data=Comment::find($id);
        $data->status=1;
        $data->save();
        return redirect()->back()->with('success','comment posted successfully!!');
    }
}
