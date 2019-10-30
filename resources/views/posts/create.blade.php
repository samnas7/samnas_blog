@extends('layouts.app')

@section('content')

<!-- Body Cntent -->
<div class="container" id="body_content">
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
    <!-- Error Message -->
    <div class="row">
        <!--Grid column-->
    </div>
    <form id="comment-form" name="comment-form" action="{{ route('posts.store') }}" method="POST">
        <!--Grid row-->
        <div class="row">
            @csrf
            <!--Grid column-->
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
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
        <div class="row">

            <!--Grid column-->
            <div class="col-md-6">
                <div class="md-form  mb-0">

                    <select class="form-control" name=" category" id="category" aria-placeholder="Category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>

                        @endforeach
                    </select>

                </div>
            </div>
            <!--Grid column-->
            <div class="col-md-6">
                <div class="md-form  mb-0">

                    <select class="form-control" name=" type" id="type">
                        @foreach($types as $type)
                        <option value="{{ $type->id }}"> {{ $type->name }} </option>
                        @endforeach
                    </select>

                </div>
            </div>
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



</div>
<!--Grid column-->



</div>

</div>

<!-- /.Body Content -->


@endsection