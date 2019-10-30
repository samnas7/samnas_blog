<!-- Button trigger modal -->

@if(!empty($post))

<!-- Modal -->
<div class="modal fade" id="AddImageModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Add Image</h5>
                <h5 class="modal-title" id="videoModalLabel">Add Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="image-form" action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf

                        <input type="hidden" value="{{ $post->id }}" name="post_id" />

                        <!--Grid column-->
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="file" name="image_title" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" class="form-control {{ $errors->has('image_title') ? 'is-invalid' : '' }}" />

                            </div>
                            @if ($errors->has('image_title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="text-centre">
                            <button type="submit" name="submit" class="btn btn-primary">Submit Image</button>
                        </div>
                    </div>
                </form>
                <form id="video-form" action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf

                        <input type="hidden" value="{{ $post->id }}" name="post_id" />

                        <!--Grid column-->
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="file" id="video" name="video" class="form-control {{ $errors->has('video') ? ' is-invalid' : '' }}">

                            </div>
                            @if ($errors->has('video'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('video') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="text-centre">
                            <button type="submit" name="submit" class="btn btn-primary">Submit Video</button>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@endif

<!-- Modal -->