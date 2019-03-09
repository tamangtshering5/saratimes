@extends('backend.pages.master')
@section('body')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-2 "></div>
            <div class=" col-lg-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Messages <small>recent</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">

                            <ul class="list-unstyled timeline widget">

                                <li>
                                    <div class="btn-group pull-left">
                                        <a href="{{route('allbooking-message')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Back</button>&nbsp;</a>
                                    </div>


                                    <div class="btn-group pull-right">
                                        {{--
                                                                                <a href="{{route('allbooking-delete',['id'=>$datas->id])}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete</button>&nbsp;</a>
                                        --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ChildModal"><i class="fa fa-trash"></i>Delete</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ChildModal" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        {{--//////--}}
                                                        <div class="dashboard-widget-content">

                                                            <ul class="list-unstyled timeline widget">

                                                                <li>


                                                                    <div class="btn-group pull-right">

                                                                        <form action="{{route('allbooking-delete',['id'=>$datas->id])}}" method="post">
                                                                            {{ csrf_field() }}

                                                                            <button class="btn btn-md btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button>
                                                                            {{--<a class="btn btn-md btn-danger pull-right" title='delete message'><i class='fa fa-trash'></i>--}}
                                                                        </form>


                                                                    </div>

                                                                    <br>



                                                                    <br><div class="block_content">

                                                                        <h2>Are you sure you want to delete?</h2>
                                                                        <br>
                                                                    </div>
                                                            </ul>
                                                        </div>
                                                        {{--//////--}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="clearfix"></div>
                                    <br>

                                    @if(count($errors)>0)
                                        @foreach($errors->all() as $error )
                                            <p class=" alert-success">{{$error}}</p>

                                        @endforeach
                                    @endif

                                    @if(session('success'))
                                        <p class="alert alert-success">{{session('success')}}</p>

                                    @endif

                                    <br><div class="block_content">

                                        <div class="byline">
                                            <span>{{ \Carbon\Carbon::parse($datas->created_at)->format('l j F Y')}}</span>   &nbsp;
                                        </div>
                                        <br>
                                        <h2 class="title">
                                            <b><a style="color:black">Name</a></b> : {{$datas->name}}<br><br>
                                            <b><a style="color:black">Email </a></b>:&nbsp; {{$datas->email}}<br><br>
                                            <b><a style="color:black">Message </a></b>:&nbsp;&nbsp;{{$datas->message}} <br><br>
                                            {{--@foreach(App\Catagory::where('id','=',$datas->pivot->catagory_id)->get() as $cata)
                                            <b><a style="color:black">Category </a></b>:&nbsp;&nbsp;{{$cata->catagory}}
                                                @endforeach
                                            <br><br>
                                            @if($datas->subcatagory_id != null)
                                                @foreach(App\SubCatagory::where('id','=',$datas->subcatagory_id)->get() as $subcata)
                                                    <b><a style="color:black">Sub-Category </a></b>:&nbsp;&nbsp;{{$subcata->sub_catagory}}
                                                @endforeach
                                            @endif--}}
                                            {{--<b><a style="color:black">Package Name </a></b>:&nbsp;&nbsp;{{$datas->package_id}} <br><br>--}}
                                        </h2>

                                        <br>
                                    </div>
                                    @if($datas->status==0)
                                    <a href="{{route('comment_post',['id'=>$datas->id])}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success">Post comment</button>&nbsp;</a>
                                @else
                                        <button class="btn btn-info">Already Posted</button>
                                    @endif
                            </ul>
                        </div>
                        </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection