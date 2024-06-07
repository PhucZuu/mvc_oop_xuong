@extends('layouts.master')

@section('title')
    Retnews - Tin tức mới trong ngày
@endsection

@section('banner')
    <div class="popular__news-header">
        <div class="container">
            <div class="row no-gutters">

                <!-- News slideshow -->
                <div class="col-md-8 ">
                    <div class="card__post-carousel">
                        <div class="item">
                            <!-- Post Article -->
                            <div class="card__post">
                                <div class="card__post__body">
                                    <a href='article-detail-v1.html'>
                                        <img src="{{ asset('assets/client/images/corona.png') }}" class="img-fluid"
                                            alt="">
                                    </a>
                                    <div class="card__post__content bg__post-cover">
                                        <div class="card__post__category">
                                            covid-19
                                        </div>
                                        <div class="card__post__title">
                                            <h2>
                                                <a href="#">
                                                    Global solidarity to fight COVID-19, and indonesia stay safe and
                                                    health
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="card__post__author-info">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        by david hall
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>
                                                        Descember 09, 2020
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="item">
                            <!-- Post Article -->
                            <div class="card__post">
                                <div class="card__post__body">
                                    <a href='article-detail-v1.html'>
                                        <img src="{{ asset('assets/client/images/medium/newsimage1.png') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="card__post__content bg__post-cover">
                                        <div class="card__post__category">
                                            covid-19
                                        </div>
                                        <div class="card__post__title">
                                            <h2>
                                                <a href="#">
                                                    meeting room is empty because of the covid-19 virus
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="card__post__author-info">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        by david hall
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>
                                                        Descember 09, 2020
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                <!-- Subnews-->
                <div class="col-md-4">
                    <div class="popular__news-right">
                        <!-- Post Article -->
                        <div class="card__post ">
                            <div class="card__post__body card__post__transition">
                                <a href="#">
                                    <img src="{{ asset('assets/client/images/newsimage8.png') }}" class="img-fluid"
                                        alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        politics
                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="#">
                                                Barack Obama and Family Visit borobudur temple enjoy holiday
                                                indonesia.</a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    by david hall
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    Descember 09, 2020
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- Post Article -->
                        <div class="card__post ">
                            <div class="card__post__body card__post__transition">
                                <a href="#">
                                    <img src="{{ asset('assets/client/images/medium/newsimage2.png') }}" class="img-fluid"
                                        alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        politics
                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="#">
                                                A classic and sturdy building with history.</a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    by david hall
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    Descember 09, 2020
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <aside class="wrapper__list__article">
                <h4 class="border_section">Tin tức trong ngày</h4>

                <div class="wrapp__list__article-responsive">

                    <!-- Post Article List -->
                    @foreach ($news as $item)
                        <div class="card__post card__post-list card__post__transition mt-30">
                            <div class="row ">
                                <div class="col-md-5">
                                    <div class="card__post__transition">

                                        <!-- image news -->
                                        <a href="{{ url("{$item['id']}/news-details") }}">
                                            <img src="{{ asset($item['image']) }}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 my-auto pl-0">
                                    <div class="card__post__body ">
                                        <div class="card__post__content  ">

                                            <!-- danh mục -->
                                            <div class="card__post__category ">
                                                {{ $item['category'] }}
                                            </div>

                                            <!-- người đăng/ ngày đăng -->
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $item['author'] }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            @php
                                                                $formatted_date = date(
                                                                    'd F Y',
                                                                    strtotime($item['created_at']),
                                                                );
                                                                echo $formatted_date;
                                                            @endphp
                                                        </span>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card__post__title">
                                                <!-- tiêu đề -->
                                                <h5>
                                                    <a href="{{ url("{$item['id']}/news-details") }}">
                                                        {{ $item['title'] }}
                                                    </a>
                                                </h5>
                                                <!-- nội dung ngắn -->
                                                <p class="d-none d-lg-block d-xl-block mb-0">
                                                    {{ $item['description'] }}
                                                </p>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>
        </div>


        <div class="col-md-12 col-lg-4">
            <aside class="wrapper__list__article">
                <h4 class="border_section">Tin tức nổi bật</h4>
                <div class="wrapper__list-number">

                    <!-- List Article -->
                    @foreach ($topNews as $key => $news)
                        <div class="card__post__list">
                            <!-- STT -->
                            <div class="list-number">
                                <span>
                                    {{++$key}}
                                </span>
                            </div>

                            <!-- Danh mục -->
                            <a href="#" class="category">
                                {{$news['category_name']}}
                            </a>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <!-- Tiêu đề -->
                                    <h5>
                                        <a href="{{ url("{$news['id']}/news-details") }}">
                                            {{$news['title']}}
                                        </a>
                                    </h5>
                                </li>
                            </ul>

                        </div>         
                    @endforeach
                    

                </div>
            </aside>
        </div>
    </div>
@endsection


@section('pagination')
    <a href="?page=1">
        «
    </a>

    @php
        $startPage = max(1, $page -1);
        $endPage = min($totalPage, $page + 1);
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo '<a class="' .(isset($_GET['page']) ? ($_GET['page'] == $i ? 'active' : '') : ($i == 1 && !isset($_GET['page']) ? 'active' : '')) .'" href='.url("?page=$i").'>' . $i . '</a>';
        }
    @endphp

    <a href="?page=<?= $totalPage?>">
        »
    </a>
@endsection
