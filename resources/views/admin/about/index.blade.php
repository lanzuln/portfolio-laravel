@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>About Section</h1>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('about.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- image  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview"
                                        style="background-image: url({{ asset($about->image) }});background-size: cover;
                                        background-position: center center;"
                                        class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                            {{-- title  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" value="{{ $about->title }}" class="form-control">
                                </div>
                            </div>
                            {{-- description  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote" name="description">{!! $about->description !!}</textarea>
                                </div>
                            </div>

                            @if($about->resume)
                            {{-- upload file for resume preview--}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <div><i class="far fa-file-pdf" style="font-size:100px"></i></div>
                                </div>
                            </div>
                            @endif

                            {{-- upload file for resume  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload resume</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="resume" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update about</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
