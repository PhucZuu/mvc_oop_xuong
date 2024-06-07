@extends('layouts.master')

@section('title')
    Tin tức
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Chi tiết tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="150px">TRƯỜNG</th>
                                <th scope="col">GIÁ TRỊ</th>
                            </tr>
                        </thead>
                        <tbody>
                
                            @foreach ($news as $field => $value)
                                <tr>
                                    @if ($field == 'image' || $field == 'avatar')
                                        <td><?= $field ?></td>
                                        <td><img width="100px" src="{{ asset($value) }}" alt=""></td>
                                    @else
                                        <td><?= $field ?></td>
                                        <td><?= $field == 'active' ? $value == 1 ? "Yes" : "No" : $value ?></td>    
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