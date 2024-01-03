@extends('frontend.layout.layout')
@section('content')
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-7">
                    <h2 class="title">Blog</h2>
                </div>
                <div class="col-sm-5">
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
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">

                @foreach ($blog as $item)
                <div class="col-xl-4 col-md-6">
                    <div class="single-blog">
                        <figure class="blog-image">
                            <img src="{{asset($item->image)}}" alt="">
                        </figure>
                        <div class="blog-content">
                            <h3 class="title"><a href="{{route('single-blog', $item->id)}}">{{$item->title}}</a></h3>
                            <div class="desc">
                                <p>{!!Str::limit(strip_tags($item->description), 100)!!}</p>
                            </div>
                            <a href="{{route('single-blog', $item->id)}}" class="button-primary-trans mouse-dir">Read More <span
                                    class="dir-part"></span> <i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-sm-12 text-center">

                    <nav class="navigation pagination">
                        <div class="nav-links d-flex justify-content-center">
                            {{$blog->links()}}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-Area-End -->
@endsection
