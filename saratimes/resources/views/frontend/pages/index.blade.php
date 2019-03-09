@extends('frontend.pages.master')
@section('body')


<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(1)->take(1)->get() as $big)
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
            </div>
        </div>
            @endforeach
    </div>
</div>
<!-- Slider Section Start Here -->

<div class="trending-news separator-large">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-0">
                <div class="slider-area">
                    <div class="bend niceties preview-2">
                        <div id="ensign-nivoslider" class="slides">
                            @if($break == 'empty')
                                <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                            @else
                            @foreach($break as $brea)
                            <img src="{{URL::to('backend/images/post/'.$brea->main_image)}}" alt="" title="#{{$loop->index+1}}" />
                            @endforeach
                            @endif
                            {{--<img src="{{URL::to('frontend/images/slider/slide_3.jpg')}}" alt="" title="#slider-direction-2" />
                            <img src="{{URL::to('frontend/images/slider/slide_3.jpg')}}" alt="" title="#slider-direction-2" />--}}
                        </div>
                        <!-- direction 2 -->
                        @if($break == 'empty')
                            <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                        @else
                        @foreach($break as $bre)
                        <div id="{{$loop->index+1}}" class="slider-direction">
                            <div class="slider-content t-cn s-tb slider-1">
                                <div class="title-container s-tb-c">
                                    <div class="slider-botton">
                                        <ul>
                                            <li>
                                                <a class="cat-link" href="#">Breaking</a>
                                                <span class="date">
                                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>{{$bre->updated_at->format('Y/m/d')}}
                                                            </span>
                                                <span class="comment">
                                                                <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$bre->id],['status','=',1]])->count()}}

                                                            </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h1 class="title1"><a href="{{route('detailpage',['slug'=>$bre->id])}}"><span>'{{$bre->title}}'</span></a></h1>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- direction 2 -->


                    </div>
                </div>
            </div>
            <!-- Slider Area End Here-->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none">
                <div class="slider-right">
                    <ul> @if($break == 'empty')
                            <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                        @else
                        @foreach($sidebreak as $side)
                        <li>
                            <div class="right-content">
                                <span class="category"><a class="cat-link" href="#">Breaking</a></span>
                                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i> {{$side->updated_at->format('Y/m/d')}}</span>
                                <h3><a href="{{route('detailpage',['slug'=>$side->id])}}">'{{$side->title}}' </a></h3>
                                <p></p></h3>
                            </div>
                            <div class="right-image"><a href="{{route('detailpage',['slug'=>$side->id])}}"><img src="{{URL::to('backend/images/post/'.$side->main_image)}}" alt="sidebar image" style="height: 150px;"></a></div>
                        </li>
                        @endforeach
                             @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(2)->take(1)->get() as $big)
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
            </div>
        </div>
            @endforeach
    </div>
</div>
<!-- Trending news  here-->
<div class="trending-news separator-large">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8col-sm-12 col-xs-12">
                <div class="view-area">
                    <div class="col-sm-8">
                        @if($samachar == 'empty')

                        @else
                        <h3 class="title-bg">समाचार</h3>
                            @endif
                    </div>
                </div>
                @if($samachar == 'empty')
                    <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                @else
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="list-col">
                        <a href="{{route('detailpage',['slug'=>$first_samachar->id])}}"> <img src="{{URL::to('backend/images/post/'.$first_samachar->main_image)}}" alt="" ></a>
                        <div class="dsc">
                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$first_samachar->updated_at->format('Y/m/d')}} </span> <span class="comment"><i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$first_samachar->id],['status','=',1]])->count()}}</span>
                            <h3><a href="{{route('detailpage',['slug'=>$first_samachar->id])}}">‘{{$first_samachar->title}}’ </a></h3>
                            <p>{!! str_limit($first_samachar->detail,200) !!}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <ul class="news-post">
                        @if($rajnitik == 'empty')
                            <br/><br/><br/><h4 style="color:red">'sorry other datas have not been inserted!'</h4>
                        @else
                        @foreach($samachar as $samach)
                            <li>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                        <div class="item-post">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3 paddimg-right-none">
                                                    <a href="{{route('detailpage',['slug'=>$samach->id])}}"> <img src="{{URL::to('backend/images/post/'.$samach->main_image)}}" alt="" ></a>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9">
                                                    <h4><a href="{{route('detailpage',['slug'=>$samach->id])}}">‘{{$samach->title}}’ </a></h4>
                                                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$samach->updated_at->format('Y/m/d')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                            @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="view-area">
                    <div class="col-sm-8">
                        <h3 class="title-bg">वर्गीकृत डिस्प्ले </h3>
                    </div>
                </div>
                @foreach(App\Bigyapan::where([['position','=','side'],['catagory_id','=',2]])->take(2)->get() as $big)
                <div class="add-section">
                    <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="add image">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Trending news end  here-->
<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(3)->take(1)->get() as $big)
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
            </div>
        </div>
            @endforeach
    </div>
</div>
<!-- Hot News Start Here -->
<div class="hot-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div id="news-Carousel" class="carousel carousel-news slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <!-- Left and right controls -->
                                <div class="next-prev-top">
                                    <div class="row">
                                        <div class="col-sm-9 col-xs-9">
                                            <div class="view-area">
                                                @if($arthik == 'empty')

                                                @else
                                                @foreach(App\PostModel::find($first_arthik->id)->Catagory()->get() as $cata)
                                                <h3 class="title-bg">{{$cata->catagory}} </h3>
                                                    @endforeach
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3 next-prev col-xs-3">
                                            <a class="left news-control" href="#news-Carousel" data-slide="prev">
                                                <span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                            </a>
                                            <a class="right news-control" href="#news-Carousel" data-slide="next">
                                                <span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-inner">
                                    @if($arthik == 'empty')
                                        <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                                    @else
                                    <div class="item active">
                                        <a href="{{route('detailpage',['slug'=>$first_arthik->id])}}"><img src="{{URL::to('backend/images/post/'.$first_arthik->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                        <div class="dsc">
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        {{$first_arthik->updated_at->format('Y/m/d')}}
                                                    </span>
                                            <span class="comment">
                                                         <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$first_arthik->id],['status','=',1]])->count()}}

                                                    </span>
                                            <h4><a href="{{route('detailpage',['slug'=>$first_arthik->id])}}"> '{{$first_arthik->title}}'</a></h4>
                                            <p>{!! str_limit($first_arthik->detail,200) !!}</p>
                                        </div>
                                    </div>
                                    @endif
                                        @if($arthik == 'empty')

                                        @else
                                    @foreach($arthik as $artha)
                                    <div class="item">
                                        <a href="{{route('detailpage',['slug'=>$artha->id])}}"><img src="{{URL::to('backend/images/post/'.$artha->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                        <div class="dsc">
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        {{$artha->updated_at->format('Y/m/d')}}
                                                    </span>
                                            <span class="comment">
                                                         <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$artha->id],['status','=',1]])->count()}}

                                                    </span>
                                            <h4><a href="{{route('detailpage',['slug'=>$artha->id])}}">'{{$artha->title}}'</a></h4>
                                            <p>{!! str_limit($artha->detail,200) !!}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                            @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div id="news-Carousel2" class="carousel carousel-news slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <!-- Left and right controls -->
                                <div class="next-prev-top">
                                    <div class="row">
                                        <div class="col-sm-9 col-xs-9">
                                            <div class="view-area">
                                                @if($rajnitik == 'empty')

                                                @else
                                                    @foreach(App\PostModel::find($first_rajnitik->id)->Catagory()->get() as $cata)
                                                    <h3 class="title-bg">{{$cata->catagory}} </h3>
                                                @endforeach
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-3 next-prev">
                                            <a class="left news-control" href="#news-Carousel2" data-slide="prev">
                                                <span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                            </a>
                                            <a class="right news-control" href="#news-Carousel2" data-slide="next">
                                                <span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-inner">
                                    @if($rajnitik == 'empty')
                                        <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                                    @else
                                    <div class="item active">
                                        <a href="{{route('detailpage',['slug'=>$first_rajnitik->id])}}"><img src="{{URL::to('backend/images/post/'.$first_rajnitik->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                        <div class="dsc">
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        {{$first_rajnitik->updated_at->format('Y/m/d')}}
                                                    </span>
                                            <span class="comment">
                                                         <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$first_rajnitik->id],['status','=',1]])->count()}}

                                                    </span>
                                            <h4><a href="{{route('detailpage',['slug'=>$first_rajnitik->id])}}"> '{{$first_rajnitik->title}}'</a></h4>
                                            <p>{!! str_limit($first_rajnitik->detail,200) !!}</p>
                                        </div>
                                    </div>
                                    @endif
                                        @if($rajnitik == 'empty')

                                        @else
                                    @foreach($rajnitik as $rajniti)
                                        <div class="item">
                                            <a href="{{route('detailpage',['slug'=>$rajniti->id])}}"><img src="{{URL::to('backend/images/post/'.$rajniti->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                            <div class="dsc">
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        {{$rajniti->updated_at->format('Y/m/d')}}
                                                    </span>
                                                <span class="comment">
                                                         <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$rajniti->id],['status','=',1]])->count()}}

                                                    </span>
                                                <h4><a href="{{route('detailpage',['slug'=>$rajniti->id])}}">'{{$rajniti->title}}'</a></h4>
                                                <p>{!! str_limit($rajniti->detail,200) !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                            @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="view-area">
                                <div class="col-sm-8">
                                    <h3 class="title-bg">लोकप्रिय </h3>
                                </div>
                            </div>
                            <ul class="news-post">
                                @foreach($popularity as $popular)
                                <li>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                            <div class="item-post">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-right-none">
                                                        <a href="{{route('detailpage',['slug'=>$popular->id])}}"><img src="{{URL::to('backend/images/post/'.$popular->main_image)}}" alt="" title="News image"></a>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <h4><a href="{{route('detailpage',['slug'=>$popular->id])}}"> '{{$popular->title}}'</a></h4>
                                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$popular->updated_at->format('Y/m/d')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Trending news end  here-->

<!-- Trending news end  here-->
<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(4)->take(1)->get() as $big)
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
            </div>
        </div>
            @endforeach
    </div>
</div>
<!-- Hot News Start Here -->
<div class="hot-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div id="news-Carousel3" class="carousel carousel-news slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <!-- Left and right controls -->
                            <div class="next-prev-top">
                                <div class="row">
                                    <div class="col-sm-9 col-xs-9">
                                        <div class="view-area">
                                            @if($fifthcatapost == 'empty')

                                            @else
                                                @foreach(App\PostModel::find($first_fifthcatapost->id)->Catagory()->get() as $cata)
                                                    <h3 class="title-bg">{{$cata->catagory}} </h3>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3 next-prev col-xs-3">
                                        <a class="left news-control" href="#news-Carousel3" data-slide="prev">
                                            <span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        </a>
                                        <a class="right news-control" href="#news-Carousel3" data-slide="next">
                                            <span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-inner">
                                @if($fifthcatapost == 'empty')
                                    <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                                @else
                                <div class="item active">
                                    <a href="{{route('detailpage',['slug'=>$first_fifthcatapost->id])}}"><img src="{{URL::to('backend/images/post/'.$first_arthik->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                    <div class="dsc">
                                                <span class="date">
                                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                    {{$first_fifthcatapost->updated_at->format('Y/m/d')}}
                                                </span>
                                        <span class="comment">
                                                    <a href="#"> <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$first_fifthcatapost->id],['status','=',1]])->count()}}
                                                    </a>
                                                </span>
                                        <h4><a href="{{route('detailpage',['slug'=>$first_fifthcatapost->id])}}"> '{{$first_fifthcatapost->title}}'</a></h4>
                                        <p>{!! str_limit($first_fifthcatapost->detail,200) !!}</p>
                                    </div>
                                </div>
                                @endif

                                    @if($fifthcatapost == 'empty')

                                    @else
                                        @foreach($fifthcatapost as $fifth)
                                            <div class="item">
                                                <a href="{{route('detailpage',['slug'=>$fifth->id])}}"><img src="{{URL::to('backend/images/post/'.$fifth->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                                <div class="dsc">
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        {{$fifth->updated_at->format('Y/m/d')}}
                                                    </span>
                                                    <span class="comment">
                                                        <a href="#"> <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$fifth->id],['status','=',1]])->count()}}
                                                        </a>
                                                    </span>
                                                    <h4><a href="{{route('detailpage',['slug'=>$fifth->id])}}">'{{$fifth->title}}'</a></h4>
                                                    <p>{!! str_limit($fifth->detail,200) !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div id="news-Carousel4" class="carousel carousel-news slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <!-- Left and right controls -->
                            <div class="next-prev-top">
                                <div class="row">
                                    <div class="col-sm-9 col-xs-9">
                                        <div class="view-area">
                                            @if($sixthcatapost == 'empty')

                                            @else
                                                @foreach(App\PostModel::find($first_sixthcatapost->id)->Catagory()->get() as $cata)
                                                    <h3 class="title-bg">{{$cata->catagory}} </h3>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-xs-3 next-prev">
                                        <a class="left news-control" href="#news-Carousel4" data-slide="prev">
                                            <span class="news-arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                        </a>
                                        <a class="right news-control" href="#news-Carousel4" data-slide="next">
                                            <span class="news-arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-inner">
                                @if($sixthcatapost == 'empty')
                                    <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                                @else
                                    <div class="item active">
                                        <a href="{{route('detailpage',['slug'=>$first_sixthcatapost->id])}}"><img src="{{URL::to('backend/images/post/'.$first_arthik->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                        <div class="dsc">
                                                <span class="date">
                                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                    {{$first_sixthcatapost->updated_at->format('Y/m/d')}}
                                                </span>
                                            <span class="comment">
                                                    <a href="#"> <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$first_sixthcatapost->id],['status','=',1]])->count()}}
                                                    </a>
                                                </span>
                                            <h4><a href="{{route('detailpage',['slug'=>$first_sixthcatapost->id])}}"> '{{$first_sixthcatapost->title}}'</a></h4>
                                            <p>{!! str_limit($first_sixthcatapost->detail,200) !!}</p>
                                        </div>
                                    </div>
                                @endif
                                    @if($sixthcatapost == 'empty')

                                    @else
                                        @foreach($sixthcatapost as $sixth)
                                            <div class="item">
                                                <a href="{{route('detailpage',['slug'=>$sixth->id])}}"><img src="{{URL::to('backend/images/post/'.$sixth->main_image)}}" alt="" title="#slider-direction-1" /></a>
                                                <div class="dsc">
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                        {{$sixth->updated_at->format('Y/m/d')}}
                                                    </span>
                                                    <span class="comment">
                                                        <a href="#"> <i class="fa fa-comment-o" aria-hidden="true"></i> {{App\Comment::where([['post_id','=',$sixth->id],['status','=',1]])->count()}}
                                                        </a>
                                                    </span>
                                                    <h4><a href="{{route('detailpage',['slug'=>$sixth->id])}}">'{{$sixth->title}}'</a></h4>
                                                    <p>{!! str_limit($sixth->detail,200) !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none">
                        @foreach(App\Bigyapan::where([['position','=','side'],['catagory_id','=',2]])->skip(1)->take(2)->get() as $big)
                            <div class="add-section">
                                <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="add image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Trending news end  here-->
<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(5)->take(1)->get() as $big)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Hot News Start Here -->

<!-- Fetuered videos Start Here -->
<div class="fetuered-videos">
    <div class="container">
        <div class="row">
            <div class="view-area">
                <div class="col-sm-12">
                    <h3 class="title-bg">भिडिओ  हेर्नुहोस </h3>
                </div>
            </div>
        </div>
        <div id="featured-videos-section" class="owl-carousel">
            @foreach($videos as $video)
            <div class="item">
                <div class="single-videos">
                    <div class="images">
                        <a href="#"><img src="{{URL::to('backend/images/video/'.$video->featured_image)}}" alt=""></a>
                        <div class="overley">
                            <div class="videos-icon">
                                <a class="popup-videos" href="{{$video->url}}"><img src="{{URL::to('frontend/images/fetuered/video-icon.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="videos-text">
                        <h3>'{{$video->title}}'</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Fetuered videos End Here -->
<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(6)->take(1)->get() as $big)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="all-news-area">
    <div class="container">
        <!-- latest news Start Here -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tab-home">
                <ul class="nav nav-tabs">
                    @if($eighthcatapost == 'empty')
                        <h3 class="title-bg">dummy title</h3>
                    @else
                        @foreach(App\PostModel::find($first_eighthcatapost->id)->Catagory()->get() as $cata)
                            <h3 class="title-bg">{{$cata->catagory}} </h3>
                        @endforeach
                    @endif
                    {{--<li class="title-bg">मनोरञ्जन</li>--}}

                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active">
                        @if($eighthcatapost == 'empty')
                            <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                        @else
                        <div class="tab-top-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none">
                                    <a href="{{route('detailpage',['slug'=>$first_eighthcatapost->id])}}"><img src="{{URL::to('backend/images/post/'.$first_eighthcatapost->main_image)}}" alt="sidebar image"></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
                                    <h3><a href="{{route('detailpage',['slug'=>$first_eighthcatapost->id])}}">'{{$first_eighthcatapost->title}}'</a></h3>
                                    <p>{!! str_limit($first_eighthcatapost->detail,200) !!}</p>
                                    @foreach(App\Catagory::where('id','=',$first_eighthcatapost->catagory_id)->get() as $lin)
                                    <a href="{{route('singlepage',['slug'=>$lin->slug])}}" class="read-more hvr-bounce-to-right">Read More</a>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="tab-bottom-content">
                            <div class="row">
                                @if($eighthcatapost == 'empty')
                                    <br/><br/><br/><h4 style="color:red">'sorry no data has been inserted!'</h4>
                                @else
                                    @foreach($eighthcatapost as $eighth)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
                                    <div class="col-sm-12 col-xs-3 img-tab">
                                        <a href="{{route('detailpage',['slug'=>$eighth->id])}}"><img src="{{URL::to('backend/images/post/'.$eighth->main_image)}}" alt="News image"></a>
                                    </div>
                                    <div class="col-sm-12 col-xs-9 img-content">
                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i>{{$eighth->updated_at->format('Y/m/d')}}</span>
                                        <h4><a href="{{route('detailpage',['slug'=>$eighth->id])}}">'{{$eighth->title}}'</a></h4>
                                    </div>
                                </div>
                                    @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Sidebar Start Here -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none sidebar-latest">
                @foreach(App\Bigyapan::where([['position','=','side'],['catagory_id','=',2]])->skip(3)->take(4)->get() as $big)
                    <div class="add-section">
                        <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="add image">
                    </div>
            @endforeach

            </div>
        </div>
    </div>
</div>


<div class="add-section separator-large2">
    <div class="container">
        @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->skip(7)->take(3)->get() as $big)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
