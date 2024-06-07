@extends('layouts.master')

@section('title')
    Danh sách User
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Danh sách người dùng</h2>
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
                                    <th>IMAGE</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>CREATED AT</th>
                                    <th>UPDATED AT</th>
                                    <th>ROLE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td>
                                            <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                        </td>
                                        <td><?= $user['name'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['created_at'] ?></td>
                                        <td><?= $user['updated_at'] ?></td>
                                        <td><?= $user['role'] == 1 ? "Quản trị" : "Người dùng" ?></td>
                                        <td>

                                            <a class="btn btn-info"
                                                href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                            <a class="btn btn-warning"
                                                href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                            
                                            <form class="mt-1" action="{{ url('admin/users/' . $user['id'] . '/delete') }}" method="post">
                                                <button class="btn btn-danger" onclick="return confirm('Chắc chắn xóa không?')" type="submit">Khóa tài khoản</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="d-flex justify-content-center align-items-center">
                                @php
                                    for ($i=1; $i <= $totalPage ; $i++) 
                                    { 
                                        $class = 'btn-outline-secondary';
                                        if(isset($_GET['page']) && $_GET['page'] == $i){
                                            $class = 'btn-secondary';
                                        }
                                        echo '<a class="mx-1 my-2 btn '.(isset($_GET['page']) ? $class : 'btn-outline-secondary').'" href="'.url('admin/users?page=' . $i).'">'.$i.'</a>';
                                    }
                                    
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection