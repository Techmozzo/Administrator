@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
@endsection
@section('custom_content')
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        @include('layouts.message')
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Welcome {{ $user->name }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-md">
                        <div class="row">
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Num. of Companies</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_companies }}</div>
                                            </div>
                                            <i class="material-icons">business</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Unverified Companies</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_unverified_companies }}</div>
                                            </div>
                                            <i class="material-icons text-warning">business</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Num. of Auditors</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_users }}
                                                </div>
                                            </div>
                                            <i class="material-icons">account_circle</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-md">
                        <div class="row">
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Num. of Banks</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_banks }}</div>
                                            </div>

                                            <i class="material-icons">account_balance</i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Unverified Banks</p>
                                                <div class="card-title m-0">
                                                    {{$number_of_unverified_banks}}
                                                </div>
                                            </div>
                                            <i class="material-icons text-warning">gpp_bad</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Num. of Bankers</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_bankers }}</div>
                                            </div>
                                            <i class="material-icons">people</i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-md">
                        <div class="row">
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Num. of Requests</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_requests }}</div>
                                            </div>
                                            <i class="material-icons">request_page</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Pending request</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_pending_request }}</div>
                                            </div>
                                            <i class="material-icons text-warning">pending_actions</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Completed Request</p>
                                                <div class="card-title m-0">
                                                    {{ $number_of_completed_request }}
                                                </div>
                                            </div>
                                            <i class="material-icons text-success">request_page</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-8">
            </div>

            <div class="col-lg-4 mb-md">
            </div> --}}
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->

    {{-- Secutity modal --}}

    <div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="loginModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="loginModal">Security Hint</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 mb-sm d-flex justify-content-center">
                                <i class="material-icons nav-icon text-64">lock</i>
                            </div>
                            <div class="col-md-10 offset-md-1 mb-sm mt-lg">
                                <strong>Please do not share the following with anyone : </strong>
                                <ul>
                                    <li class="pt-sm">Application login details, password, or token.</li>
                                    <li class="pt-sm">One time OTP or secured passcode.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/dashboard/dist/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/dist/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/dist/assets/js/pages/datatables/scrollDatatable.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            if (!sessionStorage.getItem('shown-modal')) {
                $('#securityModal').modal('show');
                sessionStorage.setItem('shown-modal', 'true');
            }
        });
    </script>
@endsection
