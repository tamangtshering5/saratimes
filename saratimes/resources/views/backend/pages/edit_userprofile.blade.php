@extends('backend.pages.master')

@section('body')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 25%">
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
                        <h2><i class="fa fa-tag"></i> Edit Profile </h2>
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
                                <li role="presentation" class="active"><a href="#profile" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Profile</a>
                                </li>
                                <li role="presentation" class=""><a href="#password" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Change Password</a>
                                </li>

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="home-tab">

                                    <form class="form-horizontal form-label-left" method="post" action="{{route('adminprofile_action')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="category">First Name <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="name"  value="{{Auth::user()->name}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Email <span class="required"></span> </label>
                                            <div>
                                                <input type="email" name="email"  value="{{Auth::user()->email}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Address <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="address"  value="{{Auth::user()->address}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Job <span class="required"></span> </label>
                                            <div>
                                                <input type="text" name="profession"  value="{{Auth::user()->profession}}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>User Image</label>
                                            <input type="file" name="image" class="btn btn-default">
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;">Submit</button>
                                            </div>
                                        </div>

                                    </form>



                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="password" aria-labelledby="profile-tab">


                                    <form action="{{route('password_action')}}" method="post">
                                        {{csrf_field()}}

                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" name="oldpassword" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success pull-right" style="background: #1abb9c;"> Change</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
