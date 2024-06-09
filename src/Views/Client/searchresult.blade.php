@extends('layouts.master')

@section('content')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="wrap__search-result">
                    <div class="wrap__search-result-keyword">
                        <h3>
                            Kết quả tìm kiếm cho:
                            <span class="text-primary">
                                "{{ $keyword }}"
                            </span>
                            tìm thấy {{ count($news) }} bài viết.
                        </h3>
                    </div>
                </div>
                <!-- Post Article List -->
                @if (isset($news) && $news)
                    @foreach ($news as $item)
                        <div class="card__post card__post-list card__post__transition mt-30">
                            <div class="row ">
                                <div class="col-md-5">
                                    <div class="card__post__transition">
                                        <a href="{{ url("{$item['id']}/news-details") }}">
                                            <img src="{{asset($item['news_image'])}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 my-auto pl-0">
                                    <div class="card__post__body ">
                                        <div class="card__post__content  ">
                                            <div class="card__post__category ">
                                                {{$item['category_name']}}
                                            </div>
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{$item['author']}}
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
                                                <h5>
                                                    <a href="{{ url("{$item['id']}/news-details") }}">
                                                        {{$item['title']}}
                                                    </a>
                                                </h5>
                                                <p class="d-none d-lg-block d-xl-block mb-0">
                                                    {{$item['description']}}
                                                </p>
        
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>  
                    @endforeach
                @else
                    <a class="btn btn-primary form-control" href="{{url()}}"><i class="fa-solid fa-house"></i> Quay về trang chủ</a>
                @endif
                
            </div>
        </div>
</section>
@endsection

