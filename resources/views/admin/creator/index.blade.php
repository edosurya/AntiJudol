@extends('layouts.admin')

@section('title', 'Creator')

@push('css-plugin')
    <link href="https://cdn.datatables.net/2.1.0/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" />
    <link href="{{ asset('admin/assets/css/loading.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/validation.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('breadcrumb')
    <h4>Creator List</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.creator.index') }}">Creator</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Creator list</h4>
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <form action="{{ route('admin.creator.export') }}" method="post">
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Category</label><br>
                                            <select name="category" id="filterCategory" class="form-control filter">
                                                <option value="" selected>-- Choose Category -- </option>
                                                <option value="1">Portrait Photography</option>
                                                <option value="2">Street Photography</option>
                                                <option value="3">Series Photography</option>
                                                <option value="4">Still Life Photography</option>
                                                <option value="5">Night Photography</option>
                                                <option value="6">Nature Photography</option>
                                            </select>
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
                            <table class="table table-striped" id="creatorTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Code</th>
                                        <th>Source</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Category</th>
                                        <th>Preview</th>
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
            let table = $('#creatorTable').DataTable({
                searchDelay: 500,
                bFilter: true,
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: false,
                ordering: false,
                ajax: {
                    url: "{{ route('admin.creator.index') }}",
                    data: function(d) {
                        return $.extend({}, d, {
                            'filter_start_date': $('#filterStartDate').val(),
                            'filter_end_date': $('#filterEndDate').val(),
                            'filter_category': $('#filterCategory').val(),
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
                        name: "code",
                        data: 'code',
                        defaultContent: '-',
                    },
                    {
                        name: "source",
                        data: 'source',
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
                        name: "phone",
                        data: 'phone',
                        defaultContent: '-'
                    },
                    {
                        name: "category",
                        data: 'category',
                        defaultContent: '-',
                    },
                    {
                        name: "preview",
                        data: 'preview',
                        defaultContent: '-',
                        render: function(data, type, row, meta) {
                            let detailUrl = `{{ URL('creator/:customerCode') }}`.replace(':customerCode', data);
                            let action = `<a href="${detailUrl}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i></a`;

                            return action;
                        },
                    },
                ],
                order: [[1, 'desc']],
            });

            $('#filterEndDate, #filterStartDate, #filterCategory').on('change', function(event) {
                table.draw()
            });


            $('#reset').on('click', function() {
                $('.filter').val('');
                table.draw()
                
            });

        });
    </script>
@endpush
