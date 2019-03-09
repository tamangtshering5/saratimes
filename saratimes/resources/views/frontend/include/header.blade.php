<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sara Times</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('frontend/images/fav.png')}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/bootstrap.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/font-awesome.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/animate.css')}}">
    <!-- hover-min css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/hover-min.css')}}">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/magnific-popup.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/meanmenu.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/owl.carousel.css')}}">
    <!-- lightbox css -->
    <link href="{{URL::to('frontend/css/lightbox.min.css')}}" rel="stylesheet">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="{{URL::to('frontend/inc/custom-slider/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{URL::to('frontend/inc/custom-slider/css/preview.css')}}" type="text/css" media="screen" />
    <!-- style css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/responsive.css')}}">
    <!-- modernizr js -->
    <script src="{{URL::to('frontend/js/modernizr-2.8.3.min.js')}}"></script>
</head>

<body class="home">
<!--Header area start here-->
<header>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="header-top-left">
                        <ul>
                            <li><span id="today"></span></li>
                            <li>Kathmandu, {{$celsius}} <sup>o</sup> C</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="social-media-area">
                        <nav>
                            <ul>
                                <li><a href="{{$social->facebook}}" class="active" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$social->twitter}}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="{{$social->instagram}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$social->linkedin}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="{{route('index')}}"><img src="{{URL::to('backend/images/company/'.$company_detail->logo)}}" alt="logo"></a>
                    </div>
                </div>
                @foreach(App\Bigyapan::where([['position','=','flat'],['catagory_id','=',2]])->take(1)->get() as $big)
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="right-banner">
                        <img src="{{URL::to('backend/images/bigyapan/'.$big->image)}}" alt="add image">
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="header-bottom-area" id="sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-112 col-md-12 col-sm-12 col-xs-12">
                    <div class="navbar-header">
                        <div class="col-sm-8 col-xs-8 padding-null">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="col-sm-4 col-xs-4 hidden-desktop text-right search">
                            <a href="#search-mobile" data-toggle="collapse" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <div id="search-mobile" class="collapse search-box">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                    <div class="main-menu navbar-collapse collapse">

                        <nav>
                            <ul>
                                <li><a href="{{route('index')}}" >{{$first_cata->catagory}}  </a>
                                @foreach($catas as $cata)
                                <li><a href="{{route('singlepage',['slug'=>$cata->slug])}}" >{{$cata->catagory}}  </a>
                                    @if (App\SubCatagory::where('catagory_id','=',$cata->id)->count() > 0)
                                    <ul class="sub-menu">
                                        @foreach(App\SubCatagory::where('catagory_id','=',$cata->id)->get() as $subcata)
                                        <li><a href="{{route('subsinglepage',['slug'=>$subcata->slug])}}" >{{$subcata->sub_catagory}}</a></li>
                                        @endforeach
                                    </ul>
                                        @endif
                                </li>
                                @endforeach
                                {{--
                                <li><a href="video.php" >भिडिओ हेर्नुहोस </a>
                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- <div class="col-lg-2 col-md-2 col-sm-hidden col-xs-hidden text-right search hidden-mobile">
                    <a href="#search" data-toggle="collapse" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div id="search" class="collapse search-box">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</header>
<!--Header area end here-->