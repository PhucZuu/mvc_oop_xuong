@extends('layouts.master')

@section('title')
    Danh sách Tin tức
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Danh sách Tin tức</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>

                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NEWS IMAGE</th>
                                    <th>TITLE</th>
                                    <th>AUTHOR</th>
                                    <th>CATEGORY</th>
                                    <th>VIEW</th>
                                    <th>STATUS</th>
                                    <th>CREATE AT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allNews as $news)
                                    <tr>
                                        <td><?= $news['id'] ?></td>
                                        <td>
                                            <img src="{{ asset($news['news_image']) }}" alt="" width="100px">
                                        </td>
                                        <td><?= $news['title'] ?></td>
                                        <td><?= $news['name'] ?></td>
                                        <td><?= $news['category_name'] ?></td>
                                        <td><?= $news['view'] ?></td>
                                        <td><?= $news['name_status'] ?></td>
                                        <td><?= $news['created_at'] ?></td>
                                        <td>

                                            <a class="btn btn-info"
                                                href="{{ url('admin/news/' . $news['id'] . '/show') }}">Xem</a>
                                            <a class="btn btn-warning"
                                                href="{{ url('admin/news/' . $news['id'] . '/edit') }}">Sửa</a>
                                            
                                            <form action="{{ url('admin/news/' . $news['id'] . '/delete') }}" method="post">
                                                <button class="btn btn-danger" onclick="return confirm('Chắc chắn xóa không?')" type="submit">Xóa</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection