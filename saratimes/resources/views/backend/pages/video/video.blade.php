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
                        <h2>Video Gallery  <small>this is video-gallery section</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i>Add here</button>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>url</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $dat)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td><img src="{{URL::to('backend/images/video/'.$dat->featured_image)}}" alt="{{$dat->featured_image}}" style="height:50px;width:50px;" /></td>
                                    <td>{{$dat->title}}</td>
                                    <td>{{$dat->url}}</td>
                                    <td><div class="inline">
                                            <div style="float: left">
                                                <a href="{{route('video_edit',['id'=>$dat->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            </div>
                                            <div style="float:left">
                                                <form method="post" action="{{route('video_del',['id'=>$dat->id])}}">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</button>
                                                </form>
                                            </div>
                                        </div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--///////modal///////////////--}}
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Add videos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('video_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group col-lg-12">
                                                <label for="category">Featured Image: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="file" name="image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">URL: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="text" name="url" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Title: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="text" name="title" required  class="form-control">
                                                </div>
                                            </div><br>
                                            <div class="form-group col-lg-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /modals -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection