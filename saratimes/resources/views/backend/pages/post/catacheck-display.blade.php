
<div class="form-group col-lg-3">
    {{--<label for="category">Sub-Categories</label>--}}
    @foreach($data as $dat)
        <div class="col-md-9 col-sm-9 col-xs-6">
            <div class="checkboxm">
                <label>
                    <input type="text" value="{{$cat_id}}" name="cat_id">
                    <input type="checkbox" class="flat" id="subcata_id" value="{{$dat->id}}" name="checked_subcata[]"> {{$dat->sub_catagory}}
                    <input type="text" value="{{$dat->id}}" name="">

                </label>
            </div>
        </div>
    @endforeach
</div>

