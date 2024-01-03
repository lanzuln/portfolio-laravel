<section class="testimonial-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{$FeedBackSetting->title}}</h3>
                    <div class="desc">
                        {{$FeedBackSetting->subtitle}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="testimonial-slider">
                    @foreach ($feedback as $item)
                        <div class="single-testimonial">
                            <div class="testimonial-header">
                                <div class="quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <h5 class="title">{{$item->name}}</h5>
                                <h6 class="position">{{$item->designation}}</h6>
                            </div>
                            <div class="content">
                                {!!$item->comment!!}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
