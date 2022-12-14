@extends('layouts.app')

@section('content')
    @include('layouts.adminMenu')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        @if (isset($alertTitle))
            Swal.fire(
                '{{ $alertTitle }}',
                '{{ $alertDescription }}',
                '{{ $alertIcon }}'
            )
        @endif
    </script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="py-2" style="background-color: #f9f9f9;">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder mb-5">Select Your Newspaper</h2>
                        </div>
                    </div>
                </div>

                <div class="row gx-5">
                    <div class="col-lg-3 mb-5">
                        <div class="card h-76 shadow border-0">
                            <a href="viewNewsPaper/AmarAsom/1/{{ date('Y-m-d') }}/1">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="400px;" />

                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="card-img-top" src="{{ asset('assets/img/r.png') }}"
                                                alt="..." />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <div class="card h-76 shadow border-0">
                            <a href="viewNewsPaper/PurvanchalPrahari/2/{{ date('Y-m-d') }}/1">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="400px;" />

                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="card-img-top" src="{{ asset('assets/img/s.png') }}"
                                                alt="..." />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <div class="card h-76 shadow border-0">
                            <a href="viewNewsPaper/TheMeghalayaGuardian/3/{{ date('Y-m-d') }}/1">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="400px;" />

                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="card-img-top" src="{{ asset('assets/img/t.png') }}"
                                                alt="..." />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <div class="card h-76 shadow border-0">
                            <a href="viewNewsPaper/TheNorthEastTimes/4/{{ date('Y-m-d') }}/1">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="400px;" />

                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="card-img-top" src="{{ asset('assets/img/u.png') }}"
                                                alt="..." />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Call to action-->
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        Place for Google Adv.
                    </div>
                </aside>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script src="{{ asset('adminAsset/plugins/jquery/jquery.min.js') }}"></script>
@endsection
