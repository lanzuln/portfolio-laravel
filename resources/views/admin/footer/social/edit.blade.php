@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <div class="section-header-back">
                      <a href="{{route('social.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Footer social</h1>
                  </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Update Footer social</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{route('social.update', $social->id)}}" method="post" >
                            @csrf
                            @method('PUT')
                            <i class=""></i>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="link" value="{{$social->link}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-secondary" name="icon"  data-icon="{{$social->icon}}" role="iconpicker"></button>
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
