@extends('layouts.guest')

@section('content')
    {{-- @include('layouts.readerMenu') --}}
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

    <div class="content-wrapper ">


        <!-- Main content -->
        <section class="py-2" style="background-color: #f9f9f9;">
            <div class="container px-5 my-5">
                <aside class="bg-primary bg-gradient rounded-3  p-sm-5 mb-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        Place for Google Adv.
                    </div>
                </aside>

                <div class="row gx-5 mt-10">
                    <div class="col-lg-3 mb-5">
                        <div class="card h-76 shadow border-0">
                            <a href="newsPaper/AmarAsom">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="350px;" />

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
                            <a href="newsPaper/PurvanchalPrahari">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="350px;" />

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
                            <a href="newsPaper/TheMeghalayaGuardian">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="350px;" />

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
                            <a href="newsPaper/TheNorthEastTimes">
                                <img class="card-img-top" src="{{ asset('assets/img/q.jpg') }}" alt="..."
                                    height="350px;" />

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

    <script>
        document.querySelector('body').classList.remove('sidebar-mini');
        document.querySelector('body').classList.remove('layout-fixed');

        document.body.classList.add('sidebar-collapse');
        document.body.classList.add('no-sidebar');
        // $("nav").hide()

        // $("nav").hide();

        $("#pushButton").hide();
    </script>
@endsection
