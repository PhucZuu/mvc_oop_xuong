@extends('layouts.master')

@section('title')
   Cập nhật tin tức
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Cập nhật</h2>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="table-responsive">

                    @if (!empty($_SESSION['errors']))
                    @foreach ($_SESSION['errors'] as $error)
                        <div class="alert alert-warning">
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

                    <form action="{{ url("admin/news/{$news['id']}/update") }}" method="post" enctype="multipart/form-data">

                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Danh mục:</label>
                            <select class="form-select" name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option <?= $category['id'] == $news['category_id'] ? "selected" : "" ?> value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Trạng thái:</label>
                            <select class="form-select" name="status_id" id="">
                                @foreach ($states as $status)
                                    <option <?= $status['id'] == $news['status_id'] ? "selected" : "" ?> value="{{ $status['id'] }}">{{ $status['name_status'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Tiêu đề:</label>
                            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề tin tức" name="title" value="{{ $news['title'] }}">
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="new_image" class="form-label">Hình ảnh:</label>
                            <input type="file" class="form-control" id="formFile" name="news_image">
                            <img width="100px" src="{{ asset($news['news_image']) }}" alt="">
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="description" class="form-label">Mô tả:</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Nhập nội dung ngắn tin tức" cols="30" rows="4">{{ $news['description'] }}</textarea>
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Nội dung:</label>
                            <textarea name="content" class="" id="content" placeholder="Nhập nội dung tin tức" cols="50" rows="10"> {{$news['content']}} </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endsection