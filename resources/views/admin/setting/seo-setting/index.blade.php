@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <div class="section-header-back">
                      <a href="{{ route('setting') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>SEO setting</h1>
                  </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('seo-setting.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" value="{{$SeoSetting->title}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Description</label>
                                <div class="col-sm-12 col-md-7">
                                   <textarea name="description" id="" class="form-control" style="height:100px">{!!$SeoSetting->description!!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Keywords</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="keywords" value="{{$SeoSetting->keywords}}" class="form-control">
                                    <code>keywords will be comma separated !</code>
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
