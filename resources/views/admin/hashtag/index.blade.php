@extends('layouts.admin')

@section('title', 'Hashtag')

@push('css-plugin')
    <link href="https://cdn.datatables.net/2.1.0/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" />
    <link href="{{ asset('admin/assets/css/loading.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/validation.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('breadcrumb')
    <h4>Hashtag</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.hashtag.index') }}">Hashtag</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix mb-3">
                        <h4 class="mt-0 header-title float-start ">Hashtag History</h4>
                        <button class="btn addbtn btn-primary float-end" id="add-btn">Add Total Hashtag<i class="fa fa-plus ms-2"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <form>
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
                                            <button type="button" id='reset' class="btn btn-secondary">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped" id="hashtagTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Total</th>
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


    <div class="modal fade" id="addeditmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="addeditform" action="" class="modal-content" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="form-group col-md-12 mb-3">
                            <label>Total</label>
                            <input type="number" name="total" id="total" class="form-control" placeholder="Total">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal" type="button" class="btn btn-secondary waves-effect waves-light">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save <i class="far fa-dot-circle"></i>
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
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
            let table = $('#hashtagTable').DataTable({
                searchDelay: 500,
                bFilter: false,
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: false,
                ordering: false,
                ajax: {
                    url: "{{ route('admin.hashtag.index') }}",
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
                        name: "total",
                        data: 'total',
                        defaultContent: '-',
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

            $(document).on('click', '#add-btn', function(event) {
                $('#addeditmodal').modal('show');
                $('#addeditmodal').find('.modal-title').html('Add Total Hashtag');
                let form = $('#addeditform');
                clearForm(form)
                clearValidation(form)
                form.attr('action', '{{ route('admin.hashtag.store') }}');
            });

            $('#addeditform').submit(function(event) {
                event.preventDefault();
                let form = $(this);
                submitForm({
                    form: form,
                    modal: '#addeditmodal',
                    datatable: table,
                    customArray: []
                });
            });
        });
    </script>
@endpush
