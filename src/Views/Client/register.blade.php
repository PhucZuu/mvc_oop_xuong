@extends('layouts.master')

@section('content')
    <div class="card mx-auto" style="max-width:520px;">
        <article class="card-body">
            <header class="mb-4">
                <h4 class="card-title">Sign up</h4>
            </header>
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
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>

                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif
            <form action="{{ url('handle-register') }}" method="POST">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" placeholder="" name="name">
                </div> <!-- form-group end.// -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="" name="email">
                    <small class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div> <!-- form-group end.// -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" name="password">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control" type="password" name="confirm_password">
                    </div> <!-- form-group end.// -->
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input"
                            checked="">
                        <span class="custom-control-label"> I am agree with <a href="#">terms and
                                contitions</a> </span>
                    </label>
                </div> <!-- form-group end.// -->
            </form>
        </article><!-- card-body.// -->
    </div>
@endsection
