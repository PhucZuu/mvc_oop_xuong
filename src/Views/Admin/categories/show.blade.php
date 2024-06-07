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
                        <h2 class="m-0">Chi tiết danh mục: {{ $category['category_name'] }}</h2>
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
                
                            @foreach ($category as $field => $value)
                                <tr>
                                    <td><?= $field ?></td>
                                    @if ($field == 'active')
                                        <td><?= $value == 1 ? "Yes" : "No"?></td>

                                    @else
                                        <td><?= $value ?></td>
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