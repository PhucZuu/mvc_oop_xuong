@extends('layouts.master')

@section('title')
    Phân quyền người dùng
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Phân quyền người dùng</h2>
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
            
                        @php
                            unset($_SESSION['errors']);
                        @endphp
                    </div>
                @endif

                <div class="table-responsive">
                    <form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Quyền:</label>
                            <select name="role" id="">
                                <option value="0" <?= $user['role'] == 0 ? "selected" : "" ?>>Người dùng</option>
                                <option value="1" <?= $user['role'] == 1 ? "selected" : "" ?>>Quản trị</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection