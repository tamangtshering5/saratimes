<footer>
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <!-- Footer About Section Start Here -->
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="single-footer footer-one">
                        <h3>महत्वपूर्ण लिंक </h3>
                        @foreach($catas as $cata)
                            <ul>
                            <li><a href="{{route('singlepage',['slug'=>$cata->slug])}}" ><h4>{{$cata->catagory}}</h4>  </a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>
                <!-- Footer About Section End Here -->

                <!-- Footer About Section End Here -->
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="single-footer footer-one">
                        <h3>प्रदेश बिशेष </h3>
                        @foreach($subcatas as $subcata)
                            <ul>
                            <li><a href="{{route('subsinglepage',['slug'=>$subcata->slug])}}" ><h4>{{$subcata->sub_catagory}}</h4></a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>
                <!-- Footer About Section End Here -->



                <!-- Footer Popular Post Section End Here -->

                <!-- Footer From Flickr Section Start Here -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="single-footer footer-three">
                        <h3>फेसबुकमा जोडिनु होस् </h3>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSaratimesnp%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="99%" height="220" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
                <!-- Footer From Flickr Section End Here -->
                <!-- Footer About Section Start Here -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="single-footer footer-one">
                        <h3>सम्पर्क ठेगाना </h3>
                        <p>सारा टाइम्स  प्रा लि <br/>
                            {!! $company_detail->detail !!}
                           </p>
                        <div class="footer-social-media-area">
                            <nav>
                                <ul>
                                    <!-- Facebook Icon Here -->
                                    <li><a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <!-- Google Icon Here -->
                                    <li><a href="{{$social->twitter}}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <!-- Twitter Icon Here -->
                                    <li><a href="{{$social->instagram}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <!-- Vimeo Icon Here -->
                                    <li><a href="{{$social->linkedin}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <!-- Pinterest Icon Here -->
                                    <li><a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Footer About Section End Here -->
            </div>
        </div>
    </div>
    <!-- Footer Copyright Area Start Here -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-bottom">
                        <p style="float: left;"> &copy; सर्वाधिकार सारा टाइम्स डट कम  सुरक्षित. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-bottom">
                        <p style="float: right;"> Powered By <a href="https://grafiastech.com" target="_blank"> <strong>Grafias Technology</strong></a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copyright Area End Here -->
</footer>

<!-- Start scrollUp  -->
<div id="return-to-top">
    <span>Top</span>
</div>
<!-- End scrollUp  -->

<!-- Footer Area Section End Here -->