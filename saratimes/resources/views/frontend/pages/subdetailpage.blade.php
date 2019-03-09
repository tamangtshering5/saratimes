@extends('frontend.pages.master')
@section('body')


    <!--Header area end here-->

    <div class="add-section separator-large2">
        <div class="container">
            @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$datas->subcatagory_id]])->take(1)->get() as $big)
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="{{$big->url}}" target="_blank"><img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Slider Section Start Here -->


    <!-- Blog Single Start Here -->
    <div class="single-blog-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="single-image">
                        <img src="{{URL::to('backend/images/post/'.$datas->featured_image)}}" alt="Blog single photo">
                    </div>
                    <h3><a href="#">{{$datas->title}}</a></h3>
                    <p>{!! $datas->detail !!}</p>
                    <div class="add-section separator-large2">
                        <div class="container">
                            @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$datas->subcatagory_id]])->skip(1)->take(1)->get() as $big)
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <a href="{{$big->url}}" target="_blank"><img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p> </p>
                    <div class="share-section">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 life-style">
                                <span class="author">
                                    <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Admin </a>
                                </span>
                                <span class="comment">

                                    <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$datas->id],['status','=',1]])->count()}}
                                </span>
                                <span class="date">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$datas->updated_at->format('Y/m/d')}}
                                </span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="share-link">
                                    <li class="hvr-bounce-to-right"><a href="#"> Tags:</a></li>
                                    <li class="hvr-bounce-to-right"><a href="#"> Food</a></li>
                                    <li class="hvr-bounce-to-right"><a href="#"> Fashion</a></li>
                                    <li class="hvr-bounce-to-right"><a href="#"> Travel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="add-section separator-large2">
                        <div class="container">
                            <div class="row">
                                @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$datas->subcatagory_id]])->skip(2)->take(1)->get() as $big)
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <a href="{{$big->url}}" target="_blank"><img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="share-section share-section2">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <span> You Can Share It : </span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="share-link">
                                    <li class="hvr-bounce-to-right"><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                    <li class="hvr-bounce-to-right"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                    <li class="hvr-bounce-to-right"><a href="#"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="next-pre-section">
                                <li class="left-arrow"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Post</a></li>
                                <li class="right-arrow"><a href="#">Next Post <i class="fa fa-angle-right" aria-hidden="true"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="add-section separator-large2">
                        <div class="container">
                            <div class="row">
                                @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$datas->subcatagory_id]])->skip(3)->take(1)->get() as $big)
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <a href="{{$big->url}}" target="_blank"><img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="like-section">
                        <h3 class="title-bg">YOU MIGHT ALSO LIKE</h3>
                        <div class="row">
                            @foreach($datas->SubCatagory as $da)
                                @foreach(App\SubCatagory::find($da->pivot->sub_catagory_id)->Post()->orderBy('id','desc')->take(6)->get() as $dat)
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="popular-post-img">
                                            <a href="{{route('subdetailpage',['slug'=>$dat->id])}}"><img src="{{URL::to('backend/images/post/'.$dat->main_image)}}" alt="Blog single photo"></a>
                                        </div>
                                        <h3>
                                            <a href="{{route('subdetailpage',['slug'=>$dat->id])}}">'{{$dat->title}}'</a>
                                        </h3>
                                    </div>
                                    @endforeach
                                @endforeach
                        </div>
                    </div>
                    <div class="add-section separator-large2">
                        <div class="container">
                            <div class="row">
                                @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',$datas->catagory_id]])->skip(4)->take(1)->get() as $big)
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <a href="{{$big->url}}" target="_blank"><img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="author-comment">
                        <h3 class="title-bg">Recent Comments</h3>
                        <ul>
                            <div id="comment">
                            @foreach($comments as $comment)
                            <li>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="image-comments"><img src="{{URL::to('backend/images/comment/'.$comment->image)}}" alt=""></div>
                                    @if($comment->image == null)
                                            <div class="image-comments"><img src="{{URL::to('backend/images/comment/dummy.png')}}" alt=""></div>
                                    @endif
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <span class="reply"> <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$comment->created_at->format('l j F Y')}}</span></span>
                                        <div class="dsc-comments">
                                            <h3>{{$comment->name}}</h3>
                                            <p>'{{$comment->message}}'</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            </div>
                            @if(count($comments))
                                <button class="btn btn-primary" >see more</button>
                            @else
                                <h4>no reviews..</h4>
                            @endif
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var c=2;
                                    $("button").click(function(){
                                            c=c+2;
                                            $("#comment").load("{{route('comments',['id'=>$datas->id])}}");
                                        }
                                    );
                                });
                            </script>

                        </ul>
                    </div>
                    <div class="leave-comments-area">
                        <h4 class="title-bg">Leave Comments</h4>
                        <form method="post" action="{{route('comment')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error )
                                    <p class=" alert-success">{{$error}}</p>

                                @endforeach
                            @endif

                            @if(session('success'))
                                <p class="alert alert-success">{{session('success')}}</p>

                            @endif
                            <fieldset>
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                                {{--@foreach($datas->SubCatagory as $da)
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" name="name" value="{{$da->pivot->sub_catagory_id}}"required class="form-control">
                                </div>
                                @endforeach--}}
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input type="email" name="email" requiredclass="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Your comment here...</label>
                                    <textarea cols="40" rows="10" class="textarea form-control" name="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="post_id" value="{{$datas->id}}" required class="form-control">
                                </div>
                                @captcha
                                <div class="form-group">
                                    <button class="btn-send" type="submit">Post Comment</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    @foreach(App\Bigyapan::where([['position','=','side'],['subcatagory_id','=',$datas->subcatagory_id]])->get() as $big)
                        <div class="add">
                            <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Blog Details Page end here -->


    <div class="add-section separator-large2">
        <div class="container">
            <div class="row">
                @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$datas->subcatagory_id]])->skip(5)->take(1)->get() as $big)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection