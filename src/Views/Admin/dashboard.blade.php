@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
   
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {

        let analysisProduct = JSON.parse('{!! json_encode($analysisProduct) !!}');

    
    // Set Data
    const data = google.visualization.arrayToDataTable(analysisProduct);
    
    // Set Options
    const options = {
      title:'Thống kê danh mục bài viết',
      is3D:true
    };
    
    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);
    
    }
    </script>

@endsection