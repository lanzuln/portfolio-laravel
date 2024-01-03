@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>Hero Section</h1>
                  </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('hero.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" value="{{ $hero->title }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description" class="form-control" id="" style="height:100px">{{ $hero->description }} </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button text</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="btn_text" value="{{ $hero->btn_text }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Url</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="btn_link" value="{{ $hero->btn_link }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background
                                    image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <label class="custom-file-label" name="background" for="customFile">Choose
                                            file</label>
                                        <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                            class="form-control" id="customFile" name="background" f>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background
                                    image</label>
                                <div class="col-sm-12 col-md-7">
                                    <img class="preview_image" id="newImg"
                                        src="{{ isset($hero->background) ? $hero->background : '' }}" />
                                </div>


                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update Hero</button>
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
