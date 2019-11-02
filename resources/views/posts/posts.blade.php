@extends('layouts.app')

@section('content')

<!-- Body Cntent -->
<div class="container" id="body_content">
    <div class="row">

        <!-- Ads Content -->
        <div class="col-md-1" id="ads_content">

        </div>
        <!-- /.Ads Content  -->

        <!-- Page Content -->
        <div class="col-md-8" id="page_content">
            <div class="row" id="blog_post">
                <?php $n = 1; ?>

                @foreach ($posts as $post)

                <div class=" col-md-6 mb-4" data-no="<?php echo $n ?>">
                    <div class="card " style="max-width: 20rem;">
                        <div class="card-body text-primary">
                            <h5 class="card-title">{{ $post->title }} {{ $post->id }} </h5>
                            <div class="view overlay hm-white-sligth z-depth-1-half">
                                <img src="public/img/Nyesom-Wike.jpg" alt="" class="img-fluid" srcset="">
                                <div class="mask"></div>
                            </div>
                            <p class="card-text">
                                {{ $post->body }} <b>posted by {{ $post->user->name }}</b>
                            </p>
                            <p>
                                <a href="">
                                    @if($post->comments)
                                    <?php $i = 0; ?>
                                    @foreach($post->comments as $comment)

                                    @php
                                    $i+= $comment->status === 0 ? 0 : 1
                                    @endphp
                                    @endforeach
                                    <strong>Comments {{ $i }}</strong>
                                    @else
                                    <strong>Comments {{ $i }}</strong>
                                    @endif

                                </a>
                                <a href="{{ route('posts.show', $post->id ) }}" style="float:right;" class="text-right">Read more.....</a>
                            </p>
                        </div>
                    </div>

                </div><!--  col-sm-12 col-xs-12 -->

                <?php $n = $n + 1; ?>
                @endforeach

            </div>

        </div>
        <!-- /.Page Content -->

        <!-- Page Content -->
        <div class="col-md-3" id="content">

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
                                Recently News
                            </li>
                        </ul>
                    </div>

                </nav>
                <!--/.Side Content Navbar-->

                <div class="card-body grey lighten-5 rounded-bottom">

                    <!-- Grid row -->
                    <div class="row">
                        @if($sidePost->count())
                        @foreach ($sidePost as $post)

                        <div class=" col-12 p-1 " data-no="<?php echo $n ?>">
                            <div class="card grey lighten-2 ">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">{{ $post->title }} {{ $post->id }} </h5>
                                    <div class="view overlay hm-white-sligth z-depth-1-half">
                                        <img src="public/img/Nyesom-Wike.jpg" alt="" class="img-fluid" srcset="">
                                        <div class="mask"></div>
                                    </div>
                                    <p class="card-text">
                                        {{ $post->body }} <b>posted by {{ $post->user->name }}</b>
                                    </p>
                                    <p>
                                        <a href="">
                                            @if($post->comments)
                                            <?php $i = 0; ?>
                                            @foreach($post->comments as $comment)

                                            @php
                                            $i+= $comment->status === 0 ? 0 : 1
                                            @endphp
                                            @endforeach
                                            <strong>Comments {{ $i }}</strong>
                                            @else
                                            <strong>Comments {{ $i }}</strong>
                                            @endif

                                        </a>
                                        <a href="/posts/{{$post}}" style="float:right;" class="text-right">Read more.....</a>
                                    </p>
                                </div>
                            </div>

                        </div><!--  col-sm-12 col-xs-12 -->

                        <?php $n = $n + 1; ?>
                        @endforeach
                        @endif
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                </div>

            </div>
        </div>
        <!-- /.Page Content -->

    </div>

    <div class="row">


        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            {{ $posts->links() }}
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<!-- /.Body Content -->


@endsection