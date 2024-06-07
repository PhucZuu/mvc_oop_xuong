@extends('layouts.master')

@section('title')
    Thêm mới danh mục
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Thêm mới danh mục</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    @if (!empty($_SESSION['errors']))
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($_SESSION['errors'] as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @php
                            unset($_SESSION['errors']);
                        @endphp
                    @endif

                    <div class="table-responsive">
                        <form action="{{ url('admin/categories/store') }}" enctype="multipart/form-data" method="POST">
                            <div class="mb-3 mt-3">
                                <label for="id" class="form-label">ID:</label>
                                <input type="text" class="form-control" id="name" placeholder="ID" name="id" value="--AUTO INCREMENT--" readonly>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Tên danh mục:</label>
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục" name="category_name">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection