@extends('layout.v_template')
@section('title', 'Laporan Data')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-hover text-nowrap" id="laporan-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Suhu</th>
                                <th>pH</th>
                                <th>Hasil Fuzzy</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            <tr>
                                @foreach ($laporan as $data)
                                    <td id="id">{{ $data->id }}</td>
                                    <td id="suhu">{{ $data->suhu }}</td>
                                    <td id="ph">{{ $data->ph }}</td>
                                    <td>{{ $data->hasil_fuzzy }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>{{ $data->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var table = $('#laporan-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            stateSave: false,
            ajax: {
                url: "{{ url()->current() }}",
            },
            columns: [{
                data: 'id',
                name: 'id',
            }, {
                data: 'suhu',
                name: 'suhu',
            },{
                data: 'ph',
                name: 'ph',
            },{
                data: 'hasil_fuzzy',
                name: 'hasil_fuzzy',
            }, {
                data: 'created_at',
                name: 'created_at',
            }
        ]
        });

        setInterval(function() {
            table.ajax.reload();
        }, 1000);
    </script>
@endpush
