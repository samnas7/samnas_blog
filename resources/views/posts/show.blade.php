@extends('layouts.app')


@section('content')


<!--  -->
<div class="container" id="body_content">

    <div class="row">
        <!-- Page Content -->
        <div class="col-md-12" id="page_content">

            @if( session()->has('message') )
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if($post)
            <div class=" col-md- mb-4" data-no="">
                <div class="card ">
                    <div class="card-body text-primary">
                        <h5 class="card-title">{{ $post->title }} </h5>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @if($post->images->count() !== 0)
                                <div id="carousel-thumb" class="carousel slide carousel-thumbnails carousel-fade" data-ride="carousel">
                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($post->images as $image)

                                        @if ($loop->first)
                                        <div class="carousel-item  active">
                                            <div class="col-md-12">
                                                <div class="card mb-2">
                                                    <img class="card-img-top" src="{{ URL::to('public/storage/img', $image->title) }}" alt="Card image cap">

                                                    <div class="card-body" style="text-align:center;">
                                                        @guest
                                                        @else
                                                        @foreach(Auth::user()->roles as $role)
                                                        @if($role->pivot->role_id === 1)
                                                        <a href="" id="but_delete" class='delete text-danger' onclick="event.preventDefault(); Deleteconfirmation('Are you sure you want to delete this?','delete-image_{{$image->id}}');">
                                                            <i class="fas fa-trash"></i>Delete this Image
                                                        </a>

                                                        <form style='display:none' id="delete-image_{{$image->id}}" action="{{ route('images.destroy', $image->id ) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        <a href="{{ URL::to('public/storage/img', $image->title) }}"><i class="fas fa-eye"></i>View this Image</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        @else
                                        <div class="carousel-item">
                                            <div class="col-md-12">
                                                <div class="card mb-2">
                                                    <img class="card-img-top" src="{{ URL::to('public/storage/img', $image->title) }}" alt="Card image cap">

                                                    <div class="card-body" style="text-align:center;">
                                                        @guest
                                                        @else
                                                        @foreach(Auth::user()->roles as $role)
                                                        @if($role->pivot->role_id === 1)
                                                        <a href="" id="but_delete" class='delete text-danger' onclick="event.preventDefault();  Deleteconfirmation('Are you sure you want to delete this?','delete-image_{{$image->id}}');">
                                                            <i class="fas fa-trash"></i>Delete this Image
                                                        </a>
                                                        <form style='display:none' id="delete-image_{{$image->id}}" action="{{ route('images.destroy', $image->id ) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        <a href="{{ URL::to('public/storage/img', $image->title) }}"><i class="fas fa-eye"></i>View this Image</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                            </div>


                                        </div>
                                        @endif
                                        @endforeach
                                        <!--/.Slides-->
                                        <!--Controls-->
                                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>

                                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <!--/.Controls-->
                                        <ol class="carousel-indicators">
                                            @foreach($post->images as $image)

                                            @if ($loop->first)
                                            <li data-target="#carousel-thumb" data-slide-to="{{ $loop->index }}" class="active">
                                                <img src="{{ URL::to('public/storage/img', $image->title) }} " width="100">
                                            </li>
                                            @else
                                            <li data-target="#carousel-thumb" data-slide-to="{{ $loop->index }}">
                                                <img src="{{ URL::to('public/storage/img', $image->title) }} " width="100">
                                            </li>
                                            @endif

                                            @endforeach
                                        </ol>
                                    </div>


                                    <!--Carousel Wrapper-->


                                    <!--/.Carousel Wrapper-->
                                    <!--/.Carousel Wrapper-->
                                </div>
                                @else
                                <img src="{{ URL::to('public/img/Nyesom-Wike.jpg') }}" alt="" class="img-fluid img-responsive img-thumbnail" srcset="">
                                @endif
                                <!-- Show Videos -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @if($post->videos->count() !== 0)
                                <!--Carousel Wrapper-->
                                <div id="video-carousel-example2" class="carousel slide  carousel-fade" data-ride="carousel">
                                    <!--Indicators-->
                                    <ol class="carousel-indicators">
                                        @foreach($post->videos as $video)

                                        @if ($loop->first)
                                        <li data-target="#video-carousel-example2" data-slide-to="{{ $loop->index }}" class="active"></li>
                                        @else
                                        <li data-target="#video-carousel-example2" data-slide-to="{{ $loop->index }}"></li>
                                        @endif
                                        @endforeach

                                    </ol>
                                    <!--/.Indicators-->
                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        <!-- First slide -->
                                        @foreach($post->videos as $video)

                                        @if ($loop->first)
                                        <div class="carousel-item active col-md-12">
                                            <!--Mask color-->
                                            <div class="view card">
                                                <!--Video source-->
                                                <video class="video-fluid" autoplay loop muted>
                                                    <source src="{{ URL::to('public/storage/videos', $video->title) }}" type="video/mp4" />
                                                </video>
                                                <div class="mask rgba-indigo-light"></div>
                                            </div>

                                            <!--Caption-->
                                            <div class="carousel-caption">
                                                <div class="animated fadeInDown">
                                                    <div class="card-body" style="text-align:center;">
                                                        @guest
                                                        @else
                                                        @foreach(Auth::user()->roles as $role)
                                                        @if($role->pivot->role_id === 1)
                                                        <a href="" id="but_delete" style="background:white;" class='btn btn-danger delete' onclick="event.preventDefault(); Deleteconfirmation('Are you sure you want to delete this?','delete-video_{{$video->id}}');">
                                                            <i class="fas fa-trash"></i>Delete this video
                                                        </a>

                                                        <form style='display:none' id="delete-video_{{$video->id}}" action="{{ route('videos.destroy', $video->id ) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        <a href="{{ URL::to('public/storage/videos', $video->title) }}" style="color:white;" class='btn btn-primary'>
                                                            <i class="fas fa-eye"></i>View this video
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Caption-->
                                        </div>
                                        @else
                                        <div class="carousel-item col-md-12">
                                            <!--Mask color-->
                                            <div class="view card">
                                                <!--Video source-->
                                                <video class="video-fluid" autoplay loop muted>
                                                    <source src="{{ URL::to('public/storage/videos', $video->title) }}" type="video/mp4" />
                                                </video>
                                                <div class="mask rgba-indigo-light"></div>
                                            </div>

                                            <!--Caption-->
                                            <div class="carousel-caption">
                                                <div class="animated fadeInDown">
                                                    <div class="card-body" style="text-align:center;">
                                                        @guest
                                                        @else
                                                        @foreach(Auth::user()->roles as $role)
                                                        @if($role->pivot->role_id === 1)
                                                        <a href="" id="but_delete" style="background:white;" class='btn btn-danger delete' onclick="event.preventDefault(); Deleteconfirmation('Are you sure you want to delete this?','delete-video_{{$video->id}}');">
                                                            <i class="fas fa-trash"></i>Delete this video
                                                        </a>
                                                        <form style='display:none' id="delete-video_{{$video->id}}" action="{{ route('videos.destroy', $video->id ) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        @endif
                                                        @endforeach
                                                        @endif

                                                        <a href="{{ URL::to('public/storage/videos', $video->title) }}" style="color:white;" class='btn btn-primary'>
                                                            <i class="fas fa-eye"></i>View this video
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Caption-->
                                        </div>

                                        @endif
                                        @endforeach
                                        <!-- /.First slide -->

                                    </div>
                                    <!--/.Slides-->
                                    <!--Controls-->
                                    <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <!--/.Controls-->
                                </div>
                                <!--Carousel Wrapper-->
                                @endif
                            </div>
                        </div>

                        <!-- End of Show Videos -->
                        <p class="card-text">
                            {{ $post->body }} <b>posted by {{ $post->user->name }}</b>
                        </p>
                        <div class="row">
                            <div class="col-md-2">
                                @if($comnts)
                                <strong>Comments (0)</strong>
                                @else
                                <strong>Comments {{ $post->comments->count() }} </strong>
                                @endif
                            </div>

                            <div class="col-md-2"><b><a id="view_comment" class="text-primary"><i class="fas fa-eye"></i>View Comment</a></b></div>
                            <div class="col-md-2"><b><a id="add_comment" class="text-primary"><i class="fas fa-add"></i>Add Comment</a></b></div>

                            @guest

                            @else
                            @foreach(Auth::user()->roles as $role)
                            <div class="col-md-2"><b><a data-toggle="modal" data-target="#AddImageModal" id="image" class="text-primary"><i class="fas fa-camera"></i> Add Image</a></b></div>
                            <div class="col-md-2"><b><a data-toggle="modal" data-target="#AddImageModal" id="video" class="text-primary"><i class="fas fa-video"></i> Add Video</a></b></div>
                            @if($role->pivot->role_id === 1)


                            <div class="col-md-1"><b> <a class="text-success" href="{{ route('posts.edit', $post->id ) }}"><i class="fas fa-plus"></i> Edit</a></b></div>

                            <div class="col-md-1"><b><a href="" class='delete text-danger' onclick="event.preventDefault();
                                            Deleteconfirmation('Are you sure you want to delete this?', 'delete-form');">
                                        <i class="fas fa-trash"></i>Delete
                                    </a>
                                    <form style='display:none' id="delete-form" action="{{ route('posts.destroy', $post->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </b>
                            </div>

                            @endif

                            @endforeach

                            @endguest



                        </div>

                    </div>

                </div><!--  col-sm-12 col-xs-12 -->
                @endif


            </div>
            <!-- /.Page Content -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!--Section: Contact v.2-->
            <div class="card" id="view_comment_body">
                @if($post->comments->count() != 0)

                @foreach($post->comments as $comment)

                @if($comment->status != 0 || Auth::user())

                <div class="row justify-content-center">

                    <div class="col-8 align-self-center ">

                        <!--Card-->
                        <div class="card card-cascade" style="margin-top:10px">
                            <!--Card content-->
                            <div class="card-body card-body-cascade text-center">
                                <!--Title -->
                                <h4 class="card-title"><strong>{{ $comment->name }}</strong></h4>
                                <h5>{{ $comment->email }}</h5>

                                <p class="card-text">{{ $comment->body }}
                                </p>
                                <a style="margin-right:12px" dt-no="{{$comment->id}}" class='view_reply' href="#">
                                    <i class="fas fa-reply"></i>
                                    View Replies
                                    @if($comment->replies)
                                    <?php $i = 0; ?>
                                    @foreach($comment->replies as $reply)

                                    @php
                                    $i+= $reply->status === 0 ? 0 : 1
                                    @endphp

                                    @endforeach
                                    {{ $i }}
                                    @else
                                    0
                                    @endif
                                </a>
                                <a style="margin-right:12px" dt-no="{{$comment->id}}" class='reply' href="#"><i class="fas fa-reply"></i> Reply </a>
                                @guest
                                @else
                                @foreach(Auth::user()->roles as $role)
                                @if($role->pivot->role_id === 1)


                                <a href="{{  route('comments.destroy', $comment->id ) }}" class='delete text-danger' onclick="event.preventDefault();
                                        Deleteconfirmation('Are you sure you want to delete this?', 'comment-form').submit());">

                                    <i class="fas fa-trash"></i> Delete Comment
                                </a>
                                <form style='display:none' id="comment-form" action="{{ route('comments.destroy', $comment->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>


                                <!-- if for activating or deactivating -->
                                @if($comment->status != 0)

                                <a href="{{  route('comments.update', $comment->id ) }}" onclick="event.preventDefault();
                                                     document.getElementById('comment_deactive').submit();" class="text-danger">
                                    <i class="fas fa-eye-slash"></i> Deactivate Comment
                                </a>
                                <form id="comment_deactive" action="{{ route('comments.update', $comment->id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="0">
                                </form>
                                @else

                                <a href="{{  route('comments.update', $comment->id ) }}" onclick="event.preventDefault();
                                                     document.getElementById('comment_active').submit();" class="text-success">
                                    <i class="fas fa-eye"></i> Activate Comment
                                </a>
                                <form id="comment_active" action="{{ route('comments.update', $comment->id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="1">
                                </form>
                                @endif
                                <!-- if for activating or deactivating Comment-->

                                @endif
                                <!--  -->
                                @endforeach

                                @endguest

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                        <!--Card content-->
                        <div class='reply_body' dt-no="{{$comment->id}}" class="card card-cascade text-center ">
                            @if($comment->replies->count() != 0)
                            @foreach($comment->replies as $reply)

                            <div class="card-body card-body-cascade text-center">
                                <!--Title -->
                                @if($reply->status != 0 || Auth::user())
                                <h4 class="card-title"><strong>{{ $reply->name }}</strong></h4>
                                <h5>{{ $reply->email }}</h5>

                                <p class="card-text">{{ $reply->body }}
                                </p>

                                <a style="margin-right:12px" href=""> <i class="far fa-thumbs-up"></i> Like </a>
                                <a class="text-danger" style="margin-right:12px" href=""><i class="far fa-thumbs-down"></i> Dislike</a>

                                @endif
                                @guest

                                @else
                                @foreach(Auth::user()->roles as $role)
                                @if($role->pivot->role_id === 1)
                                <!-- <a class="text-danger" style="margin-right:12px" href=""><i class="fas fa-trash"></i> Delete Reply</a> -->
                                <a style="margin-right:12px" href="{{  route('replies.destroy', $reply->id ) }}" class='delete text-danger' onclick="event.preventDefault(); 
                                     Deleteconfirmation('Are you sure you want to delete this?', 'reply_delete');">
                                    <i class="fas fa-trash"></i> Delete Reply
                                </a>
                                <form style="display:none" id="reply_delete" action="{{ route('replies.destroy', $reply->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <!-- if for activating or deactivating -->
                                @if($reply->status != 0)
                                <a style="margin-right:12px" class='text-danger' href="{{  route('replies.update', $reply->id ) }}" onclick="event.preventDefault();
                                                     document.getElementById('reply_deactive').submit();" class="text-danger">
                                    <i class="fas fa-eye-slash"></i> Deactivate Reply
                                </a>
                                <form style="display:none" id="reply_deactive" action="{{ route('replies.update', $reply->id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="0">
                                </form>
                                @else

                                <a style="margin-right:12px" href="{{  route('replies.update', $reply->id ) }}" onclick="event.preventDefault();
                                                     document.getElementById('reply_active').submit();" class="text-success">
                                    <i class="fas fa-eye"></i> Activate Reply
                                </a>
                                <form style="display:none" id='reply_active' action="{{ route('replies.update', $reply->id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="1">
                                </form>
                                @endif
                                <!-- if for activating or deactivating for reply -->

                                @endif
                                <!-- (' -->
                                @endforeach

                                @endguest
                            </div>
                            @endforeach
                            @endif

                        </div>
                        <!--/.Card-->
                        <!--Card-->
                        <div class='reply_form' dt-no='{{$comment->id}}' class="card card-cascade " style="margin-top:10px; padding:10px">

                            <!--Title -->
                            <h4 class="card-title"><strong>Reply</strong></h4>
                            <h5></h5>

                            @if( session()->has('reply_message') )
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('reply_message') }}
                            </div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form id="comment-form" name="comment-form" action="{{ route('replies.store') }}" method="POST">
                                <!--Grid row-->
                                <div class="row">
                                    @csrf
                                    <input type="hidden" id="comment_id" name="comment_id" value="{{ $comment->id }}" class="form-control">
                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                            <label for="name" class="">Your name</label>
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="email" name="email" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                            <label for="email" class="">Your email</label>
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->
                                <!--Grid row-->
                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <textarea type="text" id="body" name="body" rows="2" class="form-control md-textarea {{ $errors->has('body') ? ' is-invalid' : '' }}" required></textarea>
                                            <label for="body">Your message</label>
                                        </div>
                                        @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--Grid row-->
                                <div class="text-center ">

                                    <input class="btn btn-primary" type="submit" value="Send">
                                </div>
                            </form>


                        </div>
                        <!--/.Card content-->

                    </div>
                </div>
                @endif
                <!-- comment -->
                @endforeach
                @endif
                <hr>

            </div>
            <!--Section: Contact v.2-->
        </div>


    </div>

    <div class="card mb-2" id="add_comment_body">
        <!-- Error Message -->

        <div class="row">
            <!--Grid column-->

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!--Section heading-->
                <h2>Comments</h2>
                <!--Section description-->
                <p>Add your comments.Note that comments are always verified </p>
                <!-- Success message -->
                @if( session()->has('message') )
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
                @endif
                <!-- Success Message -->

                <!-- Error Message -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="comment-form" name="comment-form" action="{{ route('comments.store') }}" method="POST">
                    <!--Grid row-->
                    <div class="row">
                        @csrf
                        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}" class="form-control">
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                <label for="name" class="">Your name</label>
                            </div>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                <label for="email" class="">Your email</label>
                            </div>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->


                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="body" name="body" rows="2" class="form-control md-textarea {{ $errors->has('body') ? ' is-invalid' : '' }}" required></textarea>
                                <label for="body">Your message</label>
                            </div>
                            @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="text-center ">
                        <!-- <a  onclick="document.getElementById('contact-form').submit();">Send</a> -->
                        <input class="btn btn-primary" type="submit" value="Send">
                    </div>
                </form>


                <div class="status"></div>
            </div>
            <!--Grid column-->

        </div>
    </div>
</div>

<!-- /.Body Content -->


@endsection
@section('script')

<script>
    function Deleteconfirmation(params = ' Are you sure you want to delete this?', action) {
        if (confirm(params))
            document.getElementById(action).submit();
        else
            return false;

    }
    $(document).ready(function() {
        var boxes = [".reply_body", ".reply_form", "#view_comment_body", "#add_comment_body"];
        for (index = 0; index < boxes.length; index++) {
            $(boxes[index]).hide();
        }
        $("#video").click(function() {
            $('#video-form').css({
                "visibility": "visible",
                "display": "inherit"
            });
            $('#videoModalLabel').css({
                "visibility": "visible",
                "display": "inherit"
            });
            $('#image-form').css({
                "visibility": "hidden",
                "display": "none"
            });
            $('#imageModalLabel').css({
                "visibility": "hidden",
                "display": "none"
            });
        });
        $("#image").click(function() {
            $('#image-form').css({
                "visibility": "visible",
                "display": "inherit"
            });
            $('#imageModalLabel').css({
                "visibility": "visible",
                "display": "inherit"
            });
            $('#video-form').css({
                "visibility": "hidden",
                "display": "none"
            });
            $('#videoModalLabel').css({
                "visibility": "hidden",
                "display": "none"
            });
        });
        $(".view_reply").click(function(params) {
            params.preventDefault();
            var dt_no = $(this).attr('dt-no');
            var body = $(".reply_body");
            body.each(function(params) {

                if ($(this).attr('dt-no') === dt_no) {
                    $(this).toggle('slow');
                }
            })
            //.toggle('slow', function() {});

        });
        $(".reply").click(function(params) {
            params.preventDefault();
            //$(".reply_form").toggle('slow', function() {});
            params.preventDefault();
            var dt_no = $(this).attr('dt-no');
            var body = $(".reply_form");
            body.each(function(params) {
                if ($(this).attr('dt-no') === dt_no) {
                    $(this).toggle('slow');
                }
            })
        });
        $("#view_comment").click(function(params) {
            params.preventDefault();
            $("#view_comment_body").toggle('slow', function() {});
        });
        $("#add_comment").click(function(params) {
            params.preventDefault();
            $("#add_comment_body").toggle('slow', function() {});
        });

        $('.carousel').carousel('pause');
    });
</script>

@endsection