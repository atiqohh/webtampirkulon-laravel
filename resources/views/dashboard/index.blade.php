@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center">Reservasi Tahun <?= date('Y'); ?></h5>
            </div>
            <div class="card-body ibox-body">
                <canvas id="reservasi" height="120"></canvas>
                <script>
                    var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var ctx = document.getElementById('reservasi').getContext('2d');
                    var reservasi = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: month,
                            datasets: [{
                                label: 'Jumlah Reservasi',
                                data: [$januari, $februari, $maret, $april, $mei, $juni , $juli, $agustus, $september, $november, $oktober, $desember],
                                backgroundColor: 'rgb(144, 238, 144)',
                                borderColor: 'rgb(144, 238, 144)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="reservasiperbulan" height="120"></canvas>
                
            </div>
        </div>
    </div>
</div>

@endsection