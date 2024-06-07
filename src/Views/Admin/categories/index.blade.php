@extends('layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Danh sách danh mục</h2>
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
                                    <th>NAME</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['category_name'] ?></td>

                                        <td>
                                            @if ($category['active'] === 1)
                                                <a class="btn btn-info"
                                                    href="{{ url('admin/categories/' . $category['id'] . '/show') }}">Xem</a>
                                                <a class="btn btn-warning"
                                                    href="{{ url('admin/categories/' . $category['id'] . '/edit') }}">Sửa</a>

                                                <form action="{{ url("admin/categories/{$category['id']}/soft-delete") }}"
                                                    method="post">
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Chắc chắn xóa không?')"
                                                        type="submit">Xóa</button>
                                                </form>
                                            @else
                                                <form action="{{ url("admin/categories/{$category['id']}/restore") }}"
                                                method="post">
                                                    <button class="btn btn-success"
                                                    onclick="return confirm('Khôi phục lại danh mục ?')"
                                                    type="submit">Khôi phục</button>
                                                </form>
                                                
                                                <form action="{{ url("admin/categories/{$category['id']}/hard-delete") }}"
                                                method="post">
                                                    <button class="btn btn-danger"
                                                    onclick="return confirm('Chắc chắn xóa không?')"
                                                    type="submit">Xóa</button>
                                                </form>
                                            @endif


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
