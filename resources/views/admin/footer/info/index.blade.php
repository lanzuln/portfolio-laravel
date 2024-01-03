@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>Footer Information</h1>
                  </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('footer-info.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subtitle</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle" value="{{ $footerInfo->subtitle ?? old('subtitle') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Copyright</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="copyright" class="form-control summernote"  style="height:100px">{{ $footerInfo->copyright ?? old('copyright') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Powerde By</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="powerde" value="{{ $footerInfo->powerde ?? old('powerde') }}" class="form-control">
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
