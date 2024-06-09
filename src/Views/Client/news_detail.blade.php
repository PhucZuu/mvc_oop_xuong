@extends('layouts.master')

@section('title')
    {{ $news['title'] }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Breadcrumb -->
            <ul class="breadcrumbs bg-light mb-4">
                <li class="breadcrumbs__item">
                    <a class='breadcrumbs__url' href='{{ url() }}'>
                        <i class="fa fa-home"></i> Trang chủ</a>
                </li>
                <li class="breadcrumbs__item">
                    <a class='breadcrumbs__url' href='index.html'>{{ $news['category'] }}</a>
                </li>
                <li class="breadcrumbs__item breadcrumbs__item--current">
                    {{ $news['title'] }}
                </li>
            </ul>
        </div>
        <div class="col-md-8">

            <!-- Article Detail -->
            <div class="wrap__article-detail">
                <div class="wrap__article-detail-title">
                    <h1>
                        {{ $news['title'] }}
                    </h1>
                    <h3>
                        {{ $news['description'] }}
                    </h3>
                </div>
                <hr>
                <div class="wrap__article-detail-info">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <figure class="image-profile ">
                                <img src="{{ isset($news['avatar']) ? asset($news['avatar']) : asset('assets/admin/img/avatardefault.jpg') }}" alt="">
                            </figure>
                        </li>
                        <li class="list-inline-item">

                            <span>
                                by
                            </span>
                            <a href="#">
                                {{ $news['author'] }},
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <span class="text-dark text-capitalize ml-1">
                                {{ $date }}
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="wrap__article-detail-image mt-4">
                    <figure>
                        <img src="{{ asset($news['image']) }}" alt="" class="img-fluid">
                    </figure>
                </div>
                <div class="wrap__article-detail-content">
                    <div class="total-views">
                        <div class="total-views-read">
                            {{$news['view']}}
                            <span>
                                views
                            </span>
                        </div>


                        <ul class="list-inline">
                            <!-- <span class="share">share on:</span> -->
                            <li class="list-inline-item">
                                <a class="btn btn-social-o facebook" href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <span>facebook</span>
                                </a>

                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-social-o twitter" href="#">
                                    <i class="fa-brands fa-twitter"></i>
                                    <span>twitter</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-social-o whatsapp" href="#">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <span>whatsapp</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-social-o telegram" href="#">
                                    <i class="fa-brands fa-telegram"></i>
                                    <span>telegram</span>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a class="btn btn-linkedin-o linkedin" href="#">
                                    <i class="fa-brands fa-linkedin"></i>
                                    <span>linkedin</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="has-drop-cap-fluid">
                        {!! $news['content'] !!}
                    </div>

                </div>


            </div>



            <div class="clearfix"></div>



        </div>
        <div class="col-md-4">
            <div class="sidebar-sticky">
  


                <aside class="wrapper__list__article">
                    <h4 class="border_section">newsletter</h4>
                    <!-- Form Subscribe -->
                    <div class="widget__form-subscribe bg__card-shadow">
                        <h6>
                            Những tin tức thế giới và các sự kiện trong ngày
                        </h6>
                        <p><small>Nhận bản tin hàng ngày của RETNEWS trên hộp thư đến của bạn.</small></p>
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Your email address">
                            <div class="input-group-append">
                                <a href="{{url('register')}}">
                                    <button class="btn btn-primary form-control" type="button">Đăng ký</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <aside class="wrapper__list__article">
                    <h4 class="border_section">Advertise</h4>
                    <a href="#">
                        <figure>
                            <img src="{{asset('assets/client/images/banner2.jpg')}}" alt="" class="img-fluid">
                        </figure>
                    </a>
                </aside>

            </div>
        </div>
    </div>
@endsection
