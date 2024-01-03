<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="{{asset($GeneralSetting->footer_logo)}}" alt="">
                    </figure>
                    <p>{{$footerInfo->subtitle}}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($social as $item)
                            <li><a href="{{$item->link}}"><i class="{{$item->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">

                    @foreach ($FooterUseful as $item)
                    <li><a href="{{$item->url}}">{{$item->name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{!!$footerContact->address!!}</li>
                    <li><a href="#">{{$footerContact->phone}}</a></li>
                    <li><a href="#">{{$footerContact->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach ($help as $item)

                    @endforeach
                    <li><a href="{{$item->url}}">{{$item->name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        {!!$footerInfo->copyright !!}
                        <p>{{$footerInfo->powerde}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
