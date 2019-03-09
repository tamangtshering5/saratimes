@extends('backend.pages.master')
@section('body')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 16%">
                <div class="x_panel">

                    <div class="x_title">
                        @if(session('success'))
                            <center>
                                <div class="alert alert-success alert-dismissible" style="width:800px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('success')}}</strong>
                                </div>

                            </center>
                        @endif
                        @if(session('error'))
                            <center>
                                <div class="alert alert-danger alert-dismissible" style="width:800px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{session('error')}}</strong>
                                </div>

                            </center>
                        @endif
                        @if(session('alert'))
                            <p class="alert alert-success"> {{session('alert')}}   </p>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <h2><i class="fa fa-tag"></i> Settings </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#company_detail" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Company Details</a>
                                </li>
                                <li role="presentation" class=""><a href="#social" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Social Sites</a>
                                </li>
                                <li role="presentation" class=""><a href="#seo" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Seo</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                {{--///////////////company detail/////////////--}}
                                <div role="tabpanel" class="tab-pane fade active in" id="company_detail" aria-labelledby="home-tab">
                                    @foreach($datas as $data)
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('company_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group col-lg-12">
                                                <label>Company Logo</label>
                                                <input type="file" name="logo" class="btn btn-default">
                                                <div class="jumbotron jumbotron-fluid">
                                                    <div class="container">
                                                        <img src="{{URL::to('backend/images/company/'.$data->logo)}}" style="height:100px;width:120px;">
                                                    </div>
                                                </div>
                                            </div><br>

                                            <div class="form-group ">
                                                <label for="category">Detail <span class="required"></span> </label>
                                                <div>
                                                    <textarea name="detail" id="detail">{{$data->detail}}</textarea>
                                                </div>
                                            </div>

                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'detail' );
                                            </script>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach

                                </div>

                                {{--////////////seo///////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="seo" aria-labelledby="profile-tab">

                                    @foreach($seos as $bran)
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form class="form-horizontal form-label-left" method="post" action="{{route('seo_action',['id'=>$bran->id])}}" enctype="multipart/form-data">
                                                {{csrf_field()}}

                                                <div class="form-group">
                                                    <label for="category">Title  </label>
                                                    <div>
                                                        <input type="text" name="title"  value="{{$bran->title}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Keywords  </label>
                                                    <div>
                                                        <input type="text" name="keywords"  value="{{$bran->keywords}}"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Description  </label>
                                                    <div>
                                                        <input type="text" name="description"  value="{{$bran->description}}"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Author  </label>
                                                    <div>
                                                        <input type="text" name="author"  value="{{$bran->author}}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;border-color:#1abb9c; ">Update</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    @endforeach

                                </div>


                                {{--//////////social sites//////////////////////////////--}}
                                <div role="tabpanel" class="tab-pane fade" id="social" aria-labelledby="profile-tab">

                                    @foreach($socials as $soci)
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('social_action',['id'=>$soci->id])}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="category">Facebook <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="facebook"  value="{{$soci->facebook}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Twitter <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="twitter"  value="{{$soci->twitter}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Instagram <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="instagram"  value="{{$soci->instagram}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">LinkedIn <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="linkedin"  value="{{$soci->linkedin}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Youtube <span class="required"></span> </label>
                                                <div>
                                                    <input type="text" name="youtube"  value="{{$soci->youtube}}" required class="form-control">
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Update</button>
                                                </div>
                                            </div>


                                        </form>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection