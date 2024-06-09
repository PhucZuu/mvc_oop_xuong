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
                                    <a href='{{url("{$news[0]['id']}/news-details")}}'>
                                        <img src="{{ asset($news[0]['image']) }}" class="img-fluid"
                                            alt="">
                                    </a>
                                    <div class="card__post__content bg__post-cover">
                                        <div class="card__post__category">
                                            {{$news[0]['category']}}
                                        </div>
                                        <div class="card__post__title">
                                            <h2>
                                                <a href='{{url("{$news[0]['id']}/news-details")}}'>
                                                    {{$news[0]['title']}}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="card__post__author-info">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        by {{$news[0]['author']}}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>
                                                        @php
                                                            $formatted_date = date(
                                                                'd F Y',
                                                                strtotime($news[0]['created_at']),
                                                            );
                                                            echo $formatted_date;
                                                        @endphp
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
                                    <a href='{{url("{$news[1]['id']}/news-details")}}'>
                                        <img src="{{ asset($news[1]['image']) }}" class="img-fluid"
                                            alt="">
                                    </a>
                                    <div class="card__post__content bg__post-cover">
                                        <div class="card__post__category">
                                            {{$news[1]['category']}}
                                        </div>
                                        <div class="card__post__title">
                                            <h2>
                                                <a href='{{url("{$news[1]['id']}/news-details")}}'>
                                                    {{$news[1]['title']}}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="card__post__author-info">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        by {{$news[1]['author']}}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>
                                                        @php
                                                            $formatted_date = date(
                                                                'd F Y',
                                                                strtotime($news[1]['created_at']),
                                                            );
                                                            echo $formatted_date;
                                                        @endphp
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
                                <a href="{{url("{$news[2]['id']}/news-details")}}">
                                    <img src="{{ asset($news[2]['image']) }}" class="img-fluid"
                                        alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        {{$news[2]['category']}}
                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="{{url("{$news[2]['id']}/news-details")}}">
                                                {{$news[2]['title']}}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    by {{$news[2]['author']}}
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    @php
                                                        $formatted_date = date(
                                                            'd F Y',
                                                            strtotime($news[2]['created_at']),
                                                        );
                                                        echo $formatted_date;
                                                    @endphp
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
                                <a href="{{url("{$news[3]['id']}/news-details")}}">
                                    <img src="{{ asset($news[3]['image']) }}" class="img-fluid"
                                        alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        {{$news[3]['category']}}
                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="{{url("{$news[3]['id']}/news-details")}}">
                                                {{$news[3]['title']}}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    by {{$news[3]['author']}}
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    @php
                                                        $formatted_date = date(
                                                            'd F Y',
                                                            strtotime($news[3]['created_at']),
                                                        );
                                                        echo $formatted_date;
                                                    @endphp
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
    <a href="{{url("page/?page=1")}}">
        «
    </a>

    @php
        $startPage = max(1, $page -1);
        $endPage = min($totalPage, $page + 1);
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo '<a class="' .(isset($_GET['page']) ? ($_GET['page'] == $i ? 'active' : '') : ($i == 1 && !isset($_GET['page']) ? 'active' : '')) .'" href='.url("page/?page=$i").'>' . $i . '</a>';
        }
    @endphp

    <a href="{{url("page/?page=$totalPage")}}">
        »
    </a>
@endsection
