@extends('layouts.master')

@section('title')
    RETNEWS - Tin tức mới trong ngày
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