@extends('frontend.pages.master')
@section('body')
    <!-- Slider Section Start Here -->

    <!--Header area end here-->

    <div class="add-section separator-large2">
        <div class="container">
            @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$subcata_id]])->take(1)->get() as $big)
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="{{$big->url}}" target="_blank"><img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Slider Section Start Here -->
    <!-- Category Page Start Here -->
    <div class="blog-page-area gallery-page category-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h3 class="title-bg">{{$subcata_name->sub_catagory}}</h3>
                    @foreach($sub_datas->chunk(2) as $subdata)
                        <div class="row">
                            @foreach($subdata as $datum)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul>
                                        <li>
                                            <div class="blog-image">
                                                <a href="{{route('subdetailpage',['slug'=>$datum->id])}}">
                                                    <i class="fa fa-link" aria-hidden="true"></i>
                                                    <img src="{{URL::to('backend/images/post/'.$datum->main_image)}}" alt="{{$datum->main_image}}">
                                                </a>
                                            </div>

                                            <h3><a href="{{route('subdetailpage',['slug'=>$datum->id])}}">{{$datum->title}}</a></h3>
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$datum->updated_at->format('Y/m/d')}}</span>
                                            <span class="like"><i class="fa fa-comment-o" aria-hidden="true"></i>  {{App\Comment::where([['post_id','=',$datum->id],['status','=',1]])->count()}} </span>
                                            <p>{!! str_limit($datum->detail,200) !!}</p>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <div class="add-section separator-large2">
                            <div class="container">
                                @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$subcata_id]])->skip(1)->take(1)->get() as $big)
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                                </div>
                                    @endforeach
                            </div>
                        </div>

                @endforeach
                {{$sub_datas->links()}}
                <!-- Hot News Start Here -->

                </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        @foreach(App\Bigyapan::where([['position','=','side'],['subcatagory_id','=',$subcata_id]])->get() as $big)
                            <div class="add">
                                <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="Add">
                            </div>
                        @endforeach

                    </div>

            </div>
        </div>
    </div>


    <div class="add-section separator-large2">
        <div class="container">
            @foreach(App\Bigyapan::where([['position','=','flat'],['subcatagory_id','=',$subcata_id]])->skip(2)->take(3)->get() as $big)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="footer">
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection