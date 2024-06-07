@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-lg-8 card_height_100">
            <div class="white_card mb_20">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Thống kê số lượng tin tức theo danh mục</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body" id="myChart" style="height: 330px;">
                    
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 card_height_100 mb_20">
            <div class="white_card">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Total Sales Unit</h3>
                        </div>
                        <div class="header_more_tool">
                            <div class="dropdown">
                                <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"> <i class="ti-eye"></i>
                                        Action</a>
                                    <a class="dropdown-item" href="#"> <i class="ti-trash"></i>
                                        Delete</a>
                                    <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#"> <i class="ti-printer"></i>
                                        Print</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body p-0">
                    <div class="card_container">
                        <div id="platform_type_dates_donut" style="height:280px"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    let analytics = JSON.parse('{!! json_encode($analyticsNews) !!}');
    function drawChart() {
    const data = google.visualization.arrayToDataTable(analytics);
    
    const options = {
      is3D:true
    };
    
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
    </script>
@endsection
