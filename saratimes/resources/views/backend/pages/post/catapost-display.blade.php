<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Catagory</th>
        <th>Image</th>
        <th>Title</th>
        <th>Detail</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $dat)
        <tr>
            <th scope="row">{{$loop->index+1}}</th>
            @foreach(App\Catagory::where('id','=',$a)->get() as $cata)
                <td>{{$cata->catagory}}</td>
            @endforeach
            {{--@if($dat->subcatagory_id != '')
            @foreach(App\SubCatagory::where('id','=',$dat->subcatagory_id)->get() as $subcata)
                <td>{{$subcata->sub_catagory}}</td>
            @endforeach
            @else
                <td>no subcategory</td>
            @endif--}}
            <td><img src="{{URL::to('backend/images/post/'.$dat->main_image)}}" alt="{{$dat->main_image}}" style="height:50px;width:50px;" /></td>
            <td>{{$dat->title}}</td>
            <td>{!! str_limit($dat->detail,50) !!}</td>
            <td><div class="inline">
                    <div style="float: left">
                        <a href="{{route('catapost_edit',['id'=>$dat->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                    </div>
                    <div style="float:left">
                        <form method="post" action="{{route('catapost_del',['id'=>$dat->id])}}">
                            {{csrf_field()}}
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</button>
                        </form>
                    </div>
                </div></td>
        </tr>
    @endforeach
    </tbody>
</table>