@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.css" />
@endsection
@section('custom_content')
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        @include('layouts.message')
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header d-flex jusitify-space-between">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Companies - Audit Firms </h2>
                    <div class="flex-grow-1"></div>
                    <div>
                        <a type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="#"
                            title="Create Company">Create Company</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mt-l mb-lg"></div>
                        {{-- <div class="d-flex justify-content-center"> --}}
                        @if ($companies->count() > 0)
                            <table class="table nowrap" id="datatableScrollXY" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Join Date</th>
                                        <th>Administrator</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->created_at->format('m-d-Y') }}</td>
                                            <td>{{ $company->administrator->name() }}</td>
                                            <td>
                                                @if ($company->is_verified == 0)
                                                    <span class="badge badge-warning">Unverified</span>
                                                @elseif ($company->is_verified == 1)
                                                    <span class="badge badge-success">Verified</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/companies/' . encrypt_helper($company->id) . '/edit') }}"
                                                    title="Edit Company"><span class="material-icons">edit_note</span></a>
                                                &nbsp;
                                                @if ($company->is_verified)
                                                    <a class="unverify-item text-warning"
                                                        data-id="{{ encrypt_helper($company->id) }}"
                                                        data-message="Yes, unverify it!" href="#"
                                                        title="Unverify Company"><span
                                                            class="material-icons">unpublished</span></a>
                                                @else
                                                    <a class="verify-item text-success"
                                                        data-id="{{ encrypt_helper($company->id) }}"
                                                        data-message="Yes, verify it!" href="#"
                                                        title="Verify Company"><span
                                                            class="material-icons">task_alt</span></a>
                                                @endif
                                                &nbsp;
                                                <a class="delete-item text-danger"
                                                    data-id="{{ encrypt_helper($company->id) }}" href="#"
                                                    title="Delete Company"><span class="material-icons">delete</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-danger"> There is no Company.</div>
                        @endif
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->
@endsection
@section('script')
    <script src="/dashboard/dist/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/dist/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/dist/assets/js/pages/datatables/scrollDatatable.min.js"></script>
    <script src="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.js"></script>
    <script src="/dashboard/dist/assets/js/custom.js"></script>
    <script>
        $('document').ready(function() {
            $('table').on('click', '.verify-item', function(e) {
                e.preventDefault();
                var itemId = $(this).attr('data-id');
                var message = $(this).attr('data-message');
                var url = '/companies/' + itemId + '/verification'
                confirmAction(url, '.verify-item', message);
            });

            $('table').on('click', '.unverify-item', function(e) {
                e.preventDefault();
                var itemId = $(this).attr('data-id');
                var message = $(this).attr('data-message');
                var url = '/companies/' + itemId + '/verification'
                confirmAction(url, '.unverify-item', message);
            });

            $('table').on('click', '.delete-item', function(e) {
                e.preventDefault();
                var itemId = $(this).attr('data-id');
                var url = '/companies/' + itemId + '/delete'
                confirmAction(url, '.delete-item');
            });
        })
    </script>
@endsection
