@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <div class="section-header-back">
                      <a href="{{ route('portfolio-item.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Portfolio Category</h1>
                  </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Update Portfolio Category</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('portfolio-item.update', $portfolioItem->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- image  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview"  class="image-preview" style="background-image: url({{ asset($portfolioItem->image) }});background-size: cover;
                                        background-position: center center;">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                            {{-- title  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title"  value="{{$portfolioItem->title}}" class="form-control">
                                </div>
                            </div>
                             {{-- category select  --}}
                             <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select id="" class="form-control selectric" name="category_id">
                                        <option>select</option>
                                        @foreach ($category as $item)
                                        <option {{$item->id==$portfolioItem->category_id? 'selected':""}} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- description  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote" name="description">{!!$portfolioItem->description!!}</textarea>
                                </div>
                            </div>
                            {{-- clent  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Client</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="client"  value="{{$portfolioItem->client}}" class="form-control">
                                </div>
                            </div>
                            {{-- website  --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Website</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="website"  value="{{$portfolioItem->website}}" class="form-control">
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
