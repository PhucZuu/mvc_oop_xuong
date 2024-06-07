@extends('layouts.master')

@section('title')
    Chi tiết người dùng
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Chi tiết người dùng: {{ $user['name'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>TRƯỜNG</th>
                                <th>GIÁ TRỊ</th>
                            </tr>
                        </thead>
                        <tbody>
                
                            @foreach ($user as $field => $value)
                                <tr>
                                    @if ($field == 'avatar')
                                        <td><?= $field ?></td>
                                        <td><img width="100px" src="{{ asset($value) }}" alt=""></td>
                                    @else
                                        <td><?= $field ?></td>
                                        <td>@php
                                            if($field == 'role'){
                                                echo $value == 1 ? 'Quản trị' : 'Người dùng';
                                            }else if($field == 'active'){
                                                echo $value == 1 ? 'Yes' : 'No';
                                            }else{
                                                echo $value;
                                            }
                                        @endphp</td>
                                    @endif
                                    
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