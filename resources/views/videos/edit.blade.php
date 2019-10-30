@extends('layouts.app')

@section('content')

<!-- Body Cntent -->

<div class="container" id="body_content">
    <!-- Error Message -->
    <div class="row">
        <!--Grid column-->
        <h3>Add Video</h3>
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
    </div>
    <form id="comment-form" name="comment-form" action="{{ route('posts.update', $post->id ) }}" method="POST">
        <!--Grid row-->
        <div class="row">
            @csrf
            @method('PUT')

            <!--Grid column-->
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <input type="text" id="title" value="{{ $post->title}}" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <label for="title" class="">Your title</label>
                </div>
                @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </div>
            <!--Grid column-->

        </div>

        <!--Grid column-->


        <!--Grid row-->


        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <!-- <div class="col-md-2">
            </div> -->
            <div class="col-md-12">

                <div class="md-form">
                    <textarea type="text" id="body" name="body" rows="2" class="form-control md-textarea {{ $errors->has('body') ? ' is-invalid' : '' }}" required>{{ $post->body}}</textarea>
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



</div>
<!--Grid column-->



</div>

</div>

<!-- /.Body Content -->


@endsection