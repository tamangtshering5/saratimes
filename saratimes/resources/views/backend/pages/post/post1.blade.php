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
                        <h2>Post <small>this is post section</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Add here</button>

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
                                                url:'{{URL::to('dashboard/catapost-find')}}',
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
                                                url:'{{URL::to('dashboard/subcatapost-find')}}',
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
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2">Add advertisement</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" method="post" action="{{route('post_action')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group col-lg-3">
                                                <label for="category">Categories</label>
                                                @foreach($catas as $cata)
                                                    <div class="col-md-9 col-sm-9 col-xs-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="chkbox" id="cata_checkbox" value="{{$cata->id}}" name="checked_cata[]"> {{$cata->catagory}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    $('.chkbox').click(function(){
                                                            var checked = !$(this).data('checked');
                                                            $(this).data('checked', checked);
                                                            if (checked == true){
                                                                //console.log('dddd');
                                                                var cat="";
                                                                cat=$(this).val();
                                                                //alert(cat);
                                                                $.ajax({
                                                                    type:'get',
                                                                    dataType:'html',
                                                                    url:'{{URL::to('dashboard/catacheck-find')}}',
                                                                    data:'pcat_id='+cat,
                                                                    success:function(response){
                                                                        //console.log(response);
                                                                        $("#check_subcata").append(response)/*html(response)*/;

                                                                    }
                                                                });
                                                            } else if (checked == false) {
                                                                /*var cat="";
                                                                 cat=$(this).val();
                                                                 //alert(cat);
                                                                 var a=document.getElementById("subcata_id");
                                                                 $('.checkboxm'+'cat'+'').remove();*/

                                                            }



                                                        }
                                                    );
                                                });
                                            </script>

                                            <div id="check_subcata">

                                            </div>


                                            {{--<div class="form-group col-lg-12">
                                                <label for="category">Title: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="text" name="title" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Main image: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="file" name="main_image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="category">Featured image: <span class="required">*</span> </label>
                                                <div>
                                                    <input type="file" name="featured_image" required  class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="category">Detail: <span class="required">*</span> </label>
                                                <div>
                                                    <textarea class="form-control" id="detail" name="detail"></textarea>
                                                </div>
                                            </div>--}}<br>
                                            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                            <script>
                                                CKEDITOR.replace( 'detail' );
                                            </script>
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