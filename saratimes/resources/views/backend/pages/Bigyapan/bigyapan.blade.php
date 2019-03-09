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
                        <h2>Bigyapan <small>this is advertisement section</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i>Add here</button>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{--{{route('products_action')}}--}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="form-group col-lg-4" >
                                <label for="select-from">Select Catagory:<span class="required">*</span></label>
                                <select class="form-control" name="catagory_id" id="catagory">
                                    <option>Choose</option>
                                    @foreach($catas as $cata)
                                        <option value="{{$cata->id}}">{{$cata->catagory}}</option>
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

                            <div class="form-group col-lg-4">
                                <label for="select-from">Select Sub-Catagory:<span class="required">*</span></label>
                                <select class="form-control"  name="subcatagory" id="subcatagory">
                                    <option value="">Choose</option>
                                </select>
                            </div>

                            {{--============//////search on the basis of catagory////////////=============--}}
                            <script type="text/javascript">
                                $(document).ready(function(){

                                    $("#catagory").click(function(){
                                            var cat=$(this).val();
                                                /*alert(cat);*/
                                            $.ajax({
                                                type:'get',
                                                dataType:'html',
                                                url:'{{URL::to('dashboard/cataad-find')}}',
                                                data:'pcat_id='+cat,
                                                success:function(response){
                                                    //console.log(response);
                                                    $("#products").html(response);
                                                }
                                            });
                                        }
                                    );


                                });
                            </script>

                            {{--============//////search on the basis of sub catagory////////////=============--}}
                            <script type="text/javascript">
                                $(document).ready(function(){

                                    $("#subcatagory").click(function(){
                                            var cat=$(this).val();
                                                /*alert(cat);*/
                                            $.ajax({
                                                type:'get',
                                                dataType:'html',
                                                url:'{{URL::to('dashboard/subcataad-find')}}',
                                                data:'pcat_id='+cat,
                                                success:function(response){
                                                    //console.log(response);
                                                    $("#products").html(response);
                                                }
                                            });
                                        }
                                    );


                                });
                            </script>

                            <div id="products">
                            </div>


                        </form>
                        {{--///////modal///////////////--}}
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Add advertisement</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('bigyapan_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group col-lg-12" >
                                                <label for="select-from">Select Catagory:<span class="required">*</span></label>
                                                <select class="form-control" id="cata" name="catagory">
                                                    <option>Choose</option>
                                                    @foreach($catas as $cata)
                                                        <option value="{{$cata->id}}">{{$cata->catagory}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <script type="text/javascript">

                                                $(document).ready(function(){

                                                    $(document).on('change','#cata',function(){
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

                                            <div class="form-group col-lg-12">
                                                <label for="select-from">Select Sub-Catagory:<span class="required">*</span></label>
                                                <select class="form-control"  name="subcatagory" id="subcatagory">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Image: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="file" name="image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12" >
                                                <label for="select-from">Select Position:<span class="required">*</span></label>
                                                <select class="form-control" id="position" name="position">
                                                    <option value="flat">Flat Banner</option>
                                                    <option value="side">Side Banner</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">URL: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="text" name="url" required  class="form-control">
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