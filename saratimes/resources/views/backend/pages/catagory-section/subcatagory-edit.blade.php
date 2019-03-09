@extends('backend.pages.master')
@section('body')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
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
                        <h2>Sub-Catagory <small>this is add sub-catagory section</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left input_mask" method="post" action="{{route('subcatagoryedit_action',['id'=>$data->id])}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Catagory</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="catagory_id" id="category" required class="form-control">
                                        <option value="">Choose</option>
                                        @foreach($catas as $cat)
                                            <option value="{{$cat->id}}" {{($cat->catagory===$cats->catagory) ? 'selected' : ''}}>{{$cat->catagory}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub-Catagory</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="subcatagory" id="subcatagory" class="form-control" value="{{$data->sub_catagory}}" placeholder="Enter subcatagory name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Slug</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{$data->slug}}"readonly>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function(){
                                    $("input#subcatagory").keyup(function(){
                                        var val = $(this).val();
                                        val = val.replace(/[^\w]+/g,"-");
                                        $("input#slug").val(val);

                                    });
                                });
                            </script>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Available subcatagory <small>here you can edit/delete subcatagory</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Catagory</th>
                                <th>Subcatagory</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcatas as $cata)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    @foreach(App\Catagory::where('id','=',$cata->catagory_id)->get() as $cat)
                                        <td>{{$cat->catagory}}</td>
                                    @endforeach
                                    <td>{{$cata->sub_catagory}}</td>
                                    <td>{{$cata->slug}}</td>
                                    <td>
                                        <div class="inline">
                                            <div style="float: left">
                                                <a href="{{route('subcatagory_edit',['id'=>$cata->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            </div>
                                            <div style="float:left">
                                                <form method="post" action="{{route('subcatagory_del',['id'=>$cata->id])}}">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection