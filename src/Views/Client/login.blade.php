@extends('layouts.master')

@section('content')
    <div class="card mx-auto" style="max-width:520px;">
        @if (!empty($_SESSION['error']))
            <div class="alert alert-warning mt-3 mb-3">
                {{ $_SESSION['error'] }}
            </div>

            @php
                unset($_SESSION['error']);
            @endphp
        @endif
        <article class="card-body">
            <header class="mb-4">
                <h4 class="card-title">Sign in</h4>
            </header>
            <form action="{{ url('handle-login') }}" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                </div>
            </form>
        </article>
    </div>
@endsection

