<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Catagory</th>
        <th>Sub-catagory</th>
        <th>Image</th>
        <th>Position</th>
        <th>url</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $dat)
    <tr>
        <th scope="row">{{$loop->index+1}}</th>
        @foreach(App\Catagory::where('id','=',$dat->catagory_id)->get() as $cata)
        <td>{{$cata->catagory}}</td>
        @endforeach
        @foreach(App\SubCatagory::where('id','=',$dat->subcatagory_id)->get() as $subcata)
        <td>{{$subcata->sub_catagory}}</td>
        @endforeach
        <td><img src="{{URL::to('backend/images/bigyapan/'.$dat->image)}}" alt="{{$dat->image}}" style="height:50px;width:50px;" /></td>
        <td>{{$dat->position}}</td>
        <td>{{$dat->url}}</td>
        <td><div class="inline">
                <div style="float: left">
                    <a href="{{route('cataad_edit',['id'=>$dat->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                </div>
                <div style="float:left">
                    <form method="post" action="{{route('cataad_del',['id'=>$dat->id])}}">
                        {{csrf_field()}}
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</button>
                    </form>
                </div>
            </div></td>
    </tr>
        @endforeach
    </tbody>
</table>