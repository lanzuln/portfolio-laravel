@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="{{ route('setting') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Update setting</h1>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('general-setting.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site logo preview</label>
                                <div class="col-sm-12 col-md-7">
                                       <img style="max-width:150px" src="{{asset($genearlSetting->site_logo)}}" alt="">

                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site logo</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" value="{{$genearlSetting->site_logo}}" name="site_logo" id="site_logo">
                                        <label class="custom-file-label" for="site_logo">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer logo preview</label>
                                <div class="col-sm-12 col-md-7">
                                       <img style="max-width:150px" src="{{asset($genearlSetting->footer_logo)}}" alt="">

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer logo</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  value="{{$genearlSetting->footer_logo}}" name="footer_logo" id="footer_logo">
                                        <label class="custom-file-label" for="footer_logo">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon logo preview</label>
                                <div class="col-sm-12 col-md-7">
                                       <img style="max-width:150px" src="{{asset($genearlSetting->favicon)}}" alt="">

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" value="{{$genearlSetting->favicon}}" name="favicon" id="favicon">
                                        <label class="custom-file-label" for="favicon">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update</button>
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
