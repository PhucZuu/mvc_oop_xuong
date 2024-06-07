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


            <!-- Profile author -->
            <div class="wrap__profile">
                <div class="wrap__profile-author">
                    <figure>
                        <img src="images/profile2.png" alt="">
                    </figure>
                    <div class="wrap__profile-author-detail">
                        <div class="wrap__profile-author-detail-name">author</div>
                        <h4>jhon doe</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad
                            beatae itaque ea non
                            placeat officia ipsum praesentium! Ullam?</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-social btn-social-o facebook ">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-social btn-social-o twitter ">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-social btn-social-o instagram ">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-social btn-social-o telegram ">
                                    <i class="fa-brands fa-telegram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-social btn-social-o linkedin ">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Comment  -->


            <div class="clearfix"></div>

            <div class="related-article">
                <h4>
                    you may also like
                </h4>

                <div class="article__entry-carousel-three">
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="#">
                                    <img src="images/newsimage9.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            by david hall
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            descember 09, 2016
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="#">
                                        Maecenas accumsan tortor ut velit pharetra mollis.
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="#">
                                    <img src="images/newsimage9.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            by david hall
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            descember 09, 2016
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="#">
                                        Maecenas accumsan tortor ut velit pharetra mollis.
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="#">
                                    <img src="images/newsimage9.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            by david hall
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            descember 09, 2016
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="#">
                                        Maecenas accumsan tortor ut velit pharetra mollis.
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="#">
                                    <img src="images/newsimage9.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            by david hall
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            descember 09, 2016
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="#">
                                        Maecenas accumsan tortor ut velit pharetra mollis.
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="#">
                                    <img src="images/newsimage9.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            by david hall
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            descember 09, 2016
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="#">
                                        Maecenas accumsan tortor ut velit pharetra mollis.
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="sidebar-sticky">
                <aside class="wrapper__list__article ">
                    <!-- <h4 class="border_section">Sidebar</h4> -->

                    <div class="wrapper__list__article-small">
                        <div class="mb-3">
                            <!-- Post Article -->
                            <div class="card__post card__post-list">
                                <div class="image-sm">
                                    <a href="#">
                                        <img src="images/thumb/news6.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>


                                <div class="card__post__body ">
                                    <div class="card__post__content">

                                        <div class="card__post__author-info mb-2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        by david hall
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        descember 09, 2016
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card__post__title">
                                            <h6>
                                                <a href="#">
                                                    6 Best Tips for Building a Good Shipping Boat
                                                </a>
                                            </h6>


                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <!-- Post Article -->
                            <div class="card__post card__post-list">
                                <div class="image-sm">
                                    <a href="#">
                                        <img src="images/thumb/news7.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>


                                <div class="card__post__body ">
                                    <div class="card__post__content">

                                        <div class="card__post__author-info mb-2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        by david hall
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        descember 09, 2016
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card__post__title">
                                            <h6>
                                                <a href="#">
                                                    Pembalap mulai melaju kencang
                                                </a>
                                            </h6>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <!-- Post Article -->
                            <div class="card__post card__post-list">
                                <div class="image-sm">
                                    <a href="#">
                                        <img src="images/thumb/news8.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>


                                <div class="card__post__body ">
                                    <div class="card__post__content">

                                        <div class="card__post__author-info mb-2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        by david hall
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        descember 09, 2016
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card__post__title">
                                            <h6>
                                                <a href="#">
                                                    Cristian ronaldo mulai mengocek lawannya,
                                                </a>
                                            </h6>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                </aside>


                <aside class="wrapper__list__article">
                    <h4 class="border_section">newsletter</h4>
                    <!-- Form Subscribe -->
                    <div class="widget__form-subscribe bg__card-shadow">
                        <h6>
                            The most important world news and events of the day.
                        </h6>
                        <p><small>Get magzrenvi daily newsletter on your inbox.</small></p>
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Your email address">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">sign up</button>
                            </div>
                        </div>
                    </div>
                </aside>

                <aside class="wrapper__list__article">
                    <h4 class="border_section">Advertise</h4>
                    <a href="#">
                        <figure>
                            <img src="images/banner2.jpg" alt="" class="img-fluid">
                        </figure>
                    </a>
                </aside>

            </div>
        </div>
    </div>
@endsection
