@extends('layouts.app')

@section('content')

<!-- Body Cntent -->
<div class="container" id="body_content">
    <div class="row">


        <!-- /.Ads Content  -->

        <!-- Page Content -->
        <div class="col-md-8" id="page_content">
            <div class="row" id="blog_post">
                @foreach ($posts as $post)
                <div class=" col-md-6 mb-4">

                    <h5>{{ $post->title }} {{ $post->id }} </h5>
                    <div class="view overlay hm-white-sligth z-depth-1-half">
                        @if($post->images->count() !== 0)

                        @foreach($post->images as $image)
                        @if($loop->first)
                        <img src="{{ URL::to('public/storage/img', $image->title) }}" alt="" class="img img-rounded img-fluid img-responsive" srcset="">
                        @endif
                        @endforeach

                        @else
                        <img src="public/img/Nyesom-Wike.jpg" alt="" class="img  img-rounded img-fluid img-responsive" srcset="">
                        @endif

                    </div>
                    <p>
                        {{ $post->body }} <b>posted by {{ $post->user->name }}</b>
                    </p>
                    <p>
                        <small> {{ $post->created_at}} |
                            @if($post->comments)
                            <?php $i = 0; ?>
                            @foreach($post->comments as $comment)

                            @php
                            $i+= $comment->status === 0 ? 0 : 1
                            @endphp

                            @endforeach
                            <i>{{ $i }} Comments </i>
                            @else
                            <i>{{ $i }} Comments </i>
                            @endif
                        </small>
                        <b><a href="{{ route('posts.show', $post->id ) }}" style="float:right;" class="text-right">Read more.....</a></b>
                    </p>

                </div><!--  col-sm-12 col-xs-12 -->
                <hr style=" border: 0;
                height: 1px;
                background: #333;
                background-image: linear-gradient(to right, #ccc, #333, #ccc);" />
                @endforeach

            </div>

        </div>
        <!-- /.Page Content -->

        <!-- Page Content -->
        <div class="col-md-4" id="content">

            <div class="card panels-card">

                <div class="rounded-top grey lighten-2 dark-grey-text">
                    <ul class="list-inline float-right my-0 py-1 pr-3">
                        <li class="list-inline-item">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                        </li>
                        <li class="list-inline-item">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                        </li>
                        <li class="list-inline-item">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </li>
                    </ul>
                </div>

                <!-- Side Content Navbar-->
                <nav class="navbar navbar-expand-lg navbar-dark grey lighten-5 d-flex justify-content-between z-depth-1-bottom">

                    <div>
                        <ul class="list-inline my-2 py-1 dark-grey-text">
                            <li class="list-inline-item font-weight-bold text-uppercase">
                                Recently News {{ $post->count() }}
                            </li>
                        </ul>
                    </div>

                </nav>
                <!--/.Side Content Navbar-->

                <div class="card-body grey lighten-5 rounded-bottom">

                    <!-- Grid row -->
                    @if($sidePost->count() !== 0)
                    <div class="row">
                        {{ $sidePost->count() }}

                        @foreach ($sidePost as $post)

                        <div class=" col-12 p-1 ">
                            <div class="card grey lighten-2 ">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">{{ $post->title }} {{ $post->id }} </h5>
                                    <div class="row">

                                        <div class="col-md-6">
                                            @if($post->images->count() !== 0)
                                            @foreach($post->images as $image)
                                            @if($loop->first)
                                            <img src="{{ URL::to('public/storage/img', $image->title) }}" alt="" class="img img-fluid img-rounded img-fluid img-responsive" srcset="">
                                            @endif
                                            <?php
                                            ?>
                                            @endforeach
                                            @else

                                            <img src="{{ URL::to('public/img/Nyesom-Wike.jpg') }}" alt="" class="img img-rounded img-fluid img-responsive" srcset="">
                                            @endif
                                            <div class="mask"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text">
                                                {{ $post->body }} <b>posted by {{ $post->user->name }}</b>
                                            </p>
                                        </div>
                                    </div>
                                    <p>
                                        <small> {{ $post->created_at->toDateString()}} |
                                            @if($post->comments)
                                            <?php $i = 0; ?>
                                            @foreach($post->comments as $comment)

                                            @php
                                            $i+= $comment->status === 0 ? 0 : 1
                                            @endphp

                                            @endforeach
                                            <i>{{ $i }} Comments </i>
                                            @else
                                            <i>{{ $i }} Comments </i>
                                            @endif
                                        </small>
                                        <b><a href="{{ route('posts.show', $post->id ) }}" style="float:right;" class="text-right">Read more.....</a></b>
                                    </p>

                                </div>
                            </div>

                        </div><!--  col-sm-12 col-xs-12 -->


                        @endforeach
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                    @endif
                </div>

            </div>
        </div>
        <!-- /.Page Content -->

    </div>

    <div class="row">


        <div class="col-md-4">
            <!-- Pagination -->
            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination pg-blue">
                    <li class="page-item disabled">
                        <a class="page-link" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link">1</a></li>
                    <li class="page-item active">
                        <a class="page-link">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item">
                        <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav> -->
            <!-- /.Pagination -->
        </div>
        <div class="col-md-4">
            {{ $posts->links() }}
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<!-- /.Body Content -->


@endsection