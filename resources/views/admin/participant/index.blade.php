@extends('layouts.admin')

@section('title', 'Participant')

@push('css-plugin')
    <link href="https://cdn.datatables.net/2.1.0/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" />
    <link href="{{ asset('admin/assets/css/loading.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/validation.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('breadcrumb')
    <h4>Participant List</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.participant.index') }}">Participant</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Participant list</h4>
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <form action="{{ route('admin.participant.export') }}" method="post">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Filter Start Date</label><br>
                                            <input type="date" name="start_date" id="filterStartDate" class="form-control filter">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Filter End Date</label><br>
                                            <input type="date" name="end_date" id="filterEndDate" class="form-control filter">
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <div>
                                            <button type="submit" id='export' class="btn btn-success">Export</button>
                                            <button type="button" id='reset' class="btn btn-secondary">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped" id="participantTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js-plugin')
    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('admin/assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/helpers/submitForm.js') }}"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            let table = $('#participantTable').DataTable({
                searchDelay: 500,
                bFilter: true,
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: false,
                ordering: false,
                ajax: {
                    url: "{{ route('admin.participant.index') }}",
                    data: function(d) {
                        return $.extend({}, d, {
                            'filter_start_date': $('#filterStartDate').val(),
                            'filter_end_date': $('#filterEndDate').val(),
                        });
                    }
                },
                language: {
                    "emptyTable": "There is no data",
                },
                bDestroy: true,
                columns: [
                    {
                        name: "id",
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        width: "20px",
                        orderable: true,
                    },
                    {
                        name: "created_at",
                        data: 'created_at',
                        defaultContent: '-',
                    },
                    {
                        name: "fullname",
                        data: 'fullname',
                        defaultContent: '-',
                    },
                    {
                        name: "email",
                        data: 'email',
                        defaultContent: '-'
                    },
                    {
                        name: "link",
                        data: 'link',
                        defaultContent: '-'
                    },

                ],
                order: [[1, 'desc']],
            });

            $('#filterEndDate, #filterStartDate').on('change', function(event) {
                table.draw()
            });


            $('#reset').on('click', function() {
                $('.filter').val('');
                table.draw()
                
            });

        });
    </script>
@endpush
