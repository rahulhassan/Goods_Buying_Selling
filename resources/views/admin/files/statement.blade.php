@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    <title>STATEMENT</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Weekly', 'Monthly', 'Yearly'],
          ['Weekly',     2],
          ['Monthly',     5],
          ['Yearly',      11]
        ]);

        var options = {
          title: 'INCOME'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <style>
        #piechart{
            margin-top:10%;
        }
    </style>
</head>

<body>
<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>
@endsection
