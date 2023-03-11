@extends('layouts.admin')
@section('title', 'Dökümanlar')
@section('panel.index', '')
@section('css')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ana Sayfa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('panel.index')}}">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{date('Y')}} Sipariş / Ödeme İstatistikleri</h5>

                        <!-- Column Chart -->
                        <div id="columnChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#columnChart"), {
                                    series: [{
                                            name: 'Sipariş',
                                            data: <?= $total; ?>
                                        },
                                        {
                                            name: 'Ödeme',
                                            data: <?= $payments; ?>
                                        }
                                    ],
                                    chart: {
                                        type: 'bar',
                                        height: 350
                                    },
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: '55%',
                                            endingShape: 'rounded'
                                        },
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        show: true,
                                        width: 2,
                                        colors: ['transparent']
                                    },
                                    xaxis: {
                                        categories: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                                    },
                                    yaxis: {
                                        title: {
                                            text: 'sayısı'
                                        }
                                    },
                                    fill: {
                                        opacity: 1
                                    },
                                    tooltip: {
                                        y: {
                                            formatter: function(val) {
                                                return val
                                            }
                                        }
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Column Chart -->

                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{date('Y')}} Üyelik İstatistikleri</h5>

                        <!-- Line Chart -->
                        <div id="lineChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#lineChart"), {
                                    series: [{
                                        name: "Üye",
                                        data: <?= $members; ?>
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'line',
                                        zoom: {
                                            enabled: false
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'straight',
                                        show: true,
                                    },
                                    grid: {
                                        row: {
                                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                            opacity: 0.5
                                        },
                                    },
                                    xaxis: {
                                        categories: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Line Chart -->

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Son 5 İşlem</h5>
                        <table data-order='[[ 0, "desc" ]]' id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Döküman Adı</th>
                                    <th>Üye Adı</th>
                                    <th>Ödeme</th>
                                    <th>Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($last5 as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{@$value->document->name}}</td>
                                    <td>{{@$value->user->name}}</td>
                                    <td>@if($value->pay!=0) <span class="badge rounded-pill bg-success">Ödendi</span>
                                        @else <span class="badge rounded-pill bg-danger">Ödenmedi</span> @endif</td>
                                    <td>{{$value->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">En Çok İşlem Görenler</h5>
                        <table data-order='[[ 0, "desc" ]]' id="table_id2" class="display">
                            <thead>
                                <tr>
                                    <th>Döküman Adı</th>
                                    <th>Sayı</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($most as $key => $value)
                                <tr>
                                    <td>{{@$value->document->name}}</td>
                                    <td>{{$value->total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{date('Y')}} Yılı Ücret</h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                                        datasets: [{
                                            label: '₺',
                                            data: <?= $price; ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End Bar CHart -->

                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Example Card</h5>
                        <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
@section('js')
<script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $('#table_id').dataTable({});
    $('#table_id2').dataTable({});
</script>
@endsection