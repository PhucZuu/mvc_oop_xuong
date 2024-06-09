@extends('layouts.master')

@section('title')
    Danh sách tin tức
@endsection

@section('content')
    <!-- Blog category -->

    <div class="title-head">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 text-center">
                <h3>
                    TẤT CẢ TIN TỨC HÀNG NGÀY
                </h3>
                <p>Tổng hợp tin tức mới nhất từ các lĩnh vực quan trọng</p>

            </div>
        </div>

    </div>
    <div class="row">

        @foreach ($news as $item)
            <div class="col-lg-4">
                <!-- Post Article -->
                <div class="article__entry-new">
                    <div class="article__category">
                        {{$item['category']}}
                    </div>
                    <div class="article__image articel__image__transition">
                        <a href="{{url("{$item['id']}/news-details")}}">
                            <img style="width: 400px; height: 235px; overflow: content" src="{{ asset($item['image']) }}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="articel__content">

                        <div class="article__post__title">
                            <h5><a href="{{url("{$item['id']}/news-details")}}">
                                    {{$item['title']}}
                                </a>
                            </h5>
                            <ul class="list-inline article__post__author">
                                <li class="list-inline-item">
                                    <span> by {{$item['author']}}</span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
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
                    </div>

                </div>
            </div>
        @endforeach



    </div>


    <!-- End Blog category -->
@endsection
@if (isset($id_category))
    @section('pagination')
    <a href="{{url("allnews/{$id_category}/category?page=1")}}">
        «
    </a>

    @php
        $startPage = max(1, $page -1);
        $endPage = min($totalPage, $page + 1);
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo '<a class="' .(isset($_GET['page']) ? ($_GET['page'] == $i ? 'active' : '') : ($i == 1 && !isset($_GET['page']) ? 'active' : '')) .'" href='.url("allnews/{$id_category}/category?page=$i").'>' . $i . '</a>';
        }
    @endphp

    <a href="{{url("allnews/{$id_category}/category?page=$totalPage")}}">
        »
    </a>
    @endsection

@else
    
    @section('pagination')
        <a href="{{url("allnews/?page=1")}}">
            «
        </a>

        @php
            $startPage = max(1, $page -1);
            $endPage = min($totalPage, $page + 1);
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo '<a class="' .(isset($_GET['page']) ? ($_GET['page'] == $i ? 'active' : '') : ($i == 1 && !isset($_GET['page']) ? 'active' : '')) .'" href='.url("allnews/?page=$i").'>' . $i . '</a>';
            }
        @endphp

        <a href="{{url("allnews/?page=$totalPage")}}">
            »
        </a>
    @endsection

@endif
