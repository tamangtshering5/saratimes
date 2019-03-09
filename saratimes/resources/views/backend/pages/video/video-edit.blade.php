@extends('backend.pages.master')
@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="x_panel">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error )
                            <p class=" alert-success">{{$error}}</p>

                        @endforeach
                    @endif

                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>

                    @endif
                    <div class="x_title">
                        <h2>Video Gallery Edit  <small>this is video-gallery edit section</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{route('video')}}"><button type="button" class="btn btn-primary"><i class="fa fa-mail-reply"></i>Back</button></a>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" method="post" action="{{route('videoedit_action',['id'=>$data->id])}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group col-lg-12">
                                <label for="category">Featured Image: <span class="required">*</span> </label>
                                <div>
                                    <input type="file" name="image"   class="form-control">
                                </div>
                                <div class="jumbotron">
                                    <img src="{{URL::to('backend/images/video/'.$data->featured_image)}}" alt="{{$data->featured_image}}" style="height:150px;width:150px;margin-left: 20%;">
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="category">URL: <span class="required">*</span> </label>
                                <div>
                                    <input type="text" name="url" value="{{$data->url}}" required  class="form-control">
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="category">Title: <span class="required">*</span> </label>
                                <div>
                                    <input type="text" name="title" value="{{$data->title}}" required  class="form-control">
                                </div>
                            </div><br>
                            <div class="form-group col-lg-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection