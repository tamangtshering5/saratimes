@if($comments != null)
    @foreach($comments as $comment)
        <li>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="image-comments"><img src="{{URL::to('backend/images/comment/'.$comment->image)}}" alt=""></div>
                    @if($comment->image == null)
                        <div class="image-comments"><img src="{{URL::to('backend/images/comment/dummy.png')}}" alt=""></div>
                    @endif                                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <span class="reply"> <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{$comment->created_at->format('l j F Y')}}</span></span>
                    <div class="dsc-comments">
                        <h3>{{$comment->name}}</h3>
                        <p>'{{$comment->message}}'</p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
@else
    <h3>no comments</h3>
@endif

