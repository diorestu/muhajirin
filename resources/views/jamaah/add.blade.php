@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        table th:first-child {
            border-radius: 8px 0 0 0;
        }

        table th:last-child {
            border-radius: 0 8px 0 0;
        }

        .thead-green {
            background-color: #344e41 !important;
            color: #fefae0 !important;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        var options = {
            lengthMenu: [5, 10, 15, 25, 50],
            "dom": '<"my-0"t><"d-flex justify-content-between align-items-center mx-3 mb-2"<"d-flex justify-content-start" li>p>',
            "language": {
                "sSearch": "Cari:",
                "emptyTable": "Data Tidak Tersedia",
                "paginate": {
                    "previous": '<i class="fa fa-sm fa-chevron-left"></i>',
                    "next": '<i class="fa fa-sm fa-chevron-right"></i>'
                },
                "decimal": ",",
                "emptyTable": "Tidak Ada Data Tersedia",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                "infoFiltered": "(difiliter dari _MAX_ data)",
                "infoPostFix": "",
                "thousands": ".",
                "lengthMenu": "Tampilkan _MENU_ data",
                "loadingRecords": "Memuat...",
                "processing": "<i class='fa fa-spinner fa-spin fa-fw'></i>",
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang sesuai",
            },
        };
    </script>
    <script>
        $(document).ready(function() {
            // options.columnDefs = [{
            //     orderable: false,
            //     targets: [2, 3, 4, 5, 6, 7, 8]
            // }];
            options.lengthMenu = [30, 60, 150, 300];
            options.order = [
                [0, 'asc']
            ];
            var table = $('#myTable').DataTable(options);
            $('#search').keyup(function() {
                table.search($(this).val()).draw();
            });
            $("#myTable").on("click", ".remove", function() {
                var row_index = table.row($(this).closest("tr"));
                var id = $(this).attr("id");
                var kata = "hari kerja";
                var url = "https://hris.smartwork.id/konfigurasi/day_shift/:id";
                var cfrColor = "#e34b4b";
                url = url.replace(":id", id);
                deleteData(row_index, kata, url, cfrColor);
            });
        });
    </script>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Jamaah') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card" style="border-radius: 8px">
                <div class="card-body">
                    <form class="row" action="" method="">
                        @csrf
                        @method('POST')
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputBorder">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control form-control-border" id="exampleInputBorder">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
