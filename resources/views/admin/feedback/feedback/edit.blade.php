@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <div class="section-header-back">
                      <a href="{{route('feedback.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Feedback</h1>
                  </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Update feedback</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{route('feedback.update', $feedback->id)}}" method="post" >
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" value="{{$feedback->name}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Designation</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="designation" value="{{$feedback->designation}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comment</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="comment" id="" class="form-control summernote">{!!$feedback->comment!!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Edit</button>
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
