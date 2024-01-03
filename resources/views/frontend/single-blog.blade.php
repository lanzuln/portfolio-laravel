@extends('frontend.layout.layout')
@section('content')
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">Blog Details</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="blog-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="head-title">{{$singleBlog->title}}</h2>
                <div class="blog-meta">
                    <div class="single-meta">
                        <div class="meta-title">Published</div>
                        <h4 class="meta-value"><a href="javascript:void(0)"><p>{{date('d,M,Y', strtotime($singleBlog->created_at))}}</p></a></h4>
                    </div>
                    <div class="single-meta">
                        <div class="meta-title">Tag</div>
                        <h4 class="meta-value"><a href="javascript:void(0)">{{$singleBlog->category->name}}</a></h4>
                    </div>
                </div>
                <figure class="image-block">
                    <img src="{{asset($singleBlog->image)}}" alt="">
                </figure>
                <div class="description">
                    {!!$singleBlog->description!!}
                </div>
                <div class="single-navigation">
                    @if ($oldPost)
                    <a href="{{route('single-blog', $oldPost->id)}}" class="nav-link"><span class="icon"><i
                        class="fal fa-angle-left"></i></span><span class="text">{{$oldPost->title}}</span></a>
                    @endif

                   @if ($newPost)
                   <a href="{{route('single-blog', $newPost->id)}}" class="nav-link"><span class="text">{{$newPost->title}}</span><span
                    class="icon"><i class="fal fa-angle-right"></i></span></a>
                   @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->


@endsection
