@extends('layout.v_template')
@section('title', 'Home')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div style="height: 400px;"><canvas id="chart"></canvas></div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
@endsection
@push('scripts')
    <script>
        var chart = new Chart("chart", {
            type: "line",
            data: {
                labels: [],
                datasets: [{
                    label: "Suhu",
                    data: [],
                    borderColor: "red",
                    fill: false
                }, {
                    label: "PH",
                    data: [],
                    borderColor: "green",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        function makeChart() {
            $.ajax({
                url: "{{ route('home') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    chart.data.labels = response.created_at;
                    chart.data.datasets[0].data = response.suhu;
                    chart.data.datasets[1].data = response.ph;
                    chart.update();
                },
                error: function() {
                    console.log('Error');
                }
            });
        }

        setInterval(() => {
            makeChart();
        }, 2500);
    </script>
@endpush
