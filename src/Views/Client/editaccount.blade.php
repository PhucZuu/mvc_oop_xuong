@extends('layouts.master')

@section('title')
    Tài khoản của tôi
@endsection

@section('content')
<div class="card mx-auto" style="max-width:620px;">
    @if (!empty($_SESSION['errors']))
        @foreach ($_SESSION['errors'] as $error)
            <div class="alert alert-warning mt-3 mb-3">
                {{ $error }}
            </div>
        @endforeach
        @php
            unset($_SESSION['errors']);
        @endphp
    @endif

    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success mt-3 mb-3">
            {{ $_SESSION['msg'] }}
        </div>
        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif
    <article class="card-body">
        <header class="mb-4">
            <h4 class="card-title">Tài khoản của tôi</h4>
        </header>
        <form action="{{ url("{$_SESSION['user']['id']}/save") }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Họ và Tên</label>
                <input type="text" class="form-control" name="name" placeholder="" value="{{$_SESSION['user']['name']}}">
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" class="form-control" name="avatar" placeholder="">
                <img width="120px" src="{{ isset($_SESSION['user']['avatar']) ? asset($_SESSION['user']['avatar']) : asset("assets/admin/img/avatardefault.jpg") }}" alt="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="" value="{{$_SESSION['user']['email']}}">
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Thay đổi </button>
            </div>
        </form>
    </article>
</div>
@endsection