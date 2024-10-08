@extends('layouts.admin')

@section('title', 'User')

@push('css-plugin')
    <link href="https://cdn.datatables.net/2.1.0/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('admin/assets/libs/toastr/toastr.min.css') }}" />
    <link href="{{ asset('admin/assets/css/loading.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/validation.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('breadcrumb')
    <h4>User</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active">index</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix mb-3">
                        <h4 class="mt-0 header-title float-start ">User List</h4>
                        @if (auth()->user()->type == $user::SUPERADMIN)
                        @endif
                        <button class="btn addbtn btn-primary float-end" id="add-btn">Add User<i class="fa fa-plus"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Filter Role</label><br>
                                <select id="filterRole" class="form-control filter">
                                    <option value="" selected>-- Choose Role -- </option>
                                    @foreach ($user::ROLE as $key => $role)
                                        <option value="{{ $key }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div>
                                <button type="button" id='reset' class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped" id="usersTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Role</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">-- Choose Role --</option>
                                @foreach ($user::ROLE as $key => $role)
                                    <option value="{{ $key }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
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

    <div id="deletemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteform" action="" class="modal-content">
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Delete This User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Are you sure for deleting this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
                </div>
            </form><!-- /.modal-content -->
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
            let table = $('#usersTable').DataTable({
                searchDelay: 500,
                bFilter: true,
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: false,
                ajax: {
                    url: "{{ route('admin.user.index') }}",
                    data: function(d) {
                        return $.extend({}, d, {
                            'filter_role': $('#filterRole').val(),
                        });
                    }
                },
                language: {
                    "emptyTable": "There is no data",
                },
                bDestroy: true,
                columns: [{
                        name: "id",
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        width: "20px",
                        orderable: true,
                    },
                    {
                        name: "id",
                        data: "id",
                        width: "80px",
                        orderable: true,
                        render: function(data, type, row, meta) {
                            let urlEdit = `{{ route('admin.user.update', ':id') }}`.replace(':id', data);
                            let urlDelete = `{{ route('admin.user.destroy', ':id') }}`.replace(':id', data);

                            return `<div class="d-flex gap-2">
                                    <a class="btn btn-warning btn-edit btn-sm" data-url="${urlEdit}"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="delete-btn btn btn-danger btn-sm" data-url="${urlDelete}" ><i class="fas fa-trash"></i></a>
                                </div>`;
                        },
                    },
                    {
                        name: "name",
                        data: 'name',
                        defaultContent: '-'
                    },
                    {
                        name: "email",
                        data: 'email',
                        defaultContent: '-'
                    },
                    {
                        name: "type",
                        data: 'type',
                        defaultContent: '-',
                        render: function(data, type, row) {
                            return `<span class="badge ${row.role.color}">${row.role.text}</span>`;
                        }
                    },
                ],
                order: [0, 'desc'],
                fnCreatedRow: function(nRow, aData, iDataIndex) {
                    let data_arr = {
                        'id': aData.id,
                        'name': aData.name,
                        'email': aData.email,
                        'role': aData.type,
                    };

                    $(nRow).attr('data', JSON.stringify(data_arr));
                }
            });

            $('#filterRole').on('change', function(event) {
                table.draw()
            });

            $('#reset').on('click', function() {
                $('#filterRole').val('');
                table.draw()
            });

            $(document).on('click', '#add-btn', function(event) {
                $('#addeditmodal').modal('show');
                $('#addeditmodal').find('.modal-title').html('Create New User');
                let form = $('#addeditform');
                clearForm(form)
                clearValidation(form)
                form.attr('action', '{{ route('admin.user.store') }}');
            });

            $(document).on('click', '.btn-edit', function() {
                $('#addeditmodal').modal('show');
                $('#addeditmodal').find('.modal-title').html('Edit Data User');
                let form = $('#addeditform');
                clearForm(form)
                clearValidation(form)
                let data = JSON.parse($(this).parent().parent().parent().attr('data'));

                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#type').val(data.role).prop('selected');

                form.prepend('@method('PUT')');
                form.attr('action', $(this).attr('data-url'));
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

            $(document).on('click', '.delete-btn', function(event) {
                $('#deletemodal').modal('show');
                let form = $('#deleteform');
                form.attr('action', $(this).data('url'));
            });

            $('#deleteform').submit(function(event) {
                event.preventDefault();
                let form = $(this);
                submitForm({
                    form: form,
                    modal: '#deletemodal',
                    datatable: table,
                    customArray: []
                });
            });
        });
    </script>
@endpush
