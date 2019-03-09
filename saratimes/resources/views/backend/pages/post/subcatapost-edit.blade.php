@extends('backend.pages.master')
@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
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
                        <h2>Post Edit <small>this is post edit section</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{route('post')}}"><button type="button" class="btn btn-primary">Back</button></a>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                        @foreach(App\PostModel::find($data->id)->SubCatagory()->get() as $subcata)
                            <h4>{{$subcata->sub_catagory}}</h4>
                        @endforeach
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{route('subcatapostedit_action',['id'=>$data->id])}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            {{--<div class="form-group col-lg-6" >
                                <label for="select-from">Select Catagory:<span class="required">*</span></label>
                                <select class="form-control" name="catagory" id="catagory">
                                    <option>Choose</option>
                                    @foreach($catas as $cata)
                                        <option value="{{$cata->id}}" {{($cata->catagory===$cats->catagory) ? 'selected' : ''}}>{{$cata->catagory}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <script type="text/javascript">

                                $(document).ready(function(){

                                    $(document).on('change','#catagory',function(){

                                        var a = $(this).val();

                                        $.ajax({

                                            type:'get',
                                            url: '{{URL::to('dashboard/subcatagory-select')}}',
                                            data:{'id':a},
                                            success:function(datas){

                                                $("select#subcatagory").empty();
                                                $.each(datas,function(i,data){
                                                    $("select#subcatagory").append('<option value="'+data.id+'"> '+data.sub_catagory+'</option>');
                                                });


                                            }
                                        });

                                    });
                                });

                            </script>

                            <div class="form-group col-lg-6">
                                <label for="select-from">Select Sub-Catagory:<span class="required">*</span></label>
                                <select class="form-control"  name="subcatagory" id="subcatagory">
                                    <option value="">Choose</option>
                                    @foreach($subcatas as $subcata)
                                        <option value="{{$subcata->id}}" {{($subcata->sub_catagory===$subcats->sub_catagory) ? 'selected' : ''}}>{{$subcata->sub_catagory}}</option>
                                    @endforeach
                                </select>
                            </div>--}}

                            <div class="form-group col-lg-12">
                                <label for="category">Main Image: <span class="required">*</span> </label>
                                <div>
                                    <input type="file" name="main_image"  class="form-control">
                                </div>
                                <div class="jumbotron">
                                    <img src="{{URL::to('backend/images/post/'.$data->main_image)}}" alt="{{$data->main_image}}" style="height:150px;width:150px;margin-left: 20%;">
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="category">Featured Image: <span class="required">*</span> </label>
                                <div>
                                    <input type="file" name="featured_image"  class="form-control">
                                </div>
                                <div class="jumbotron">
                                    <img src="{{URL::to('backend/images/post/'.$data->featured_image)}}" alt="{{$data->featured_image}}" style="height:150px;width:150px;margin-left: 20%;">
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="category">Title: <span class="required">*</span> </label>
                                <div>
                                    <input type="text" name="title" value="{{$data->title}}" required  class="form-control">
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="category">Detail: <span class="required">*</span> </label>
                                <div>
                                    <textarea class="form-control" id="detail" name="detail">{{$data->detail}}</textarea>
                                </div>
                            </div><br>
                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                            <script>
                                CKEDITOR.replace( 'detail' );
                            </script>
                            <div class="form-group col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection