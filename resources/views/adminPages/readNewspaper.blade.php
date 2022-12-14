@extends('layouts.guest')

@section('content')
    @include('layouts.readerMenu')
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
        @if (count($allpages) > 0)
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="sticky-top mb-2">
                                <aside class="bg-primary bg-gradient rounded-3  p-sm-5 mb-5">
                                    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start"
                                        style="height:1000px">
                                        Place for Google Adv.
                                    </div>
                                </aside>
                                <!-- /.card -->

                            </div>
                        </div>
                        <div class="col-md-8">


                            <div class="card card-primary">
                                <div class="card-header">
                                    @if (count($allpages) > 0)
                                        <h3 class="card-title">{{ $paperName }} - {{ $frontPage->pageTitle }}</h3>
                                    @endif


                                </div>
                                <div class="row">
                                    <div class="col-12" id="fp-canvas-container" style="width:100%; height:100%;">
                                        <map name="fp-map" id="fp-map">
                                        </map>
                                        <img src="{{ asset(urldecode($frontPage->pageImageUrl)) }}" id="fp-img"
                                            width="100%" usemap="#fp-map"></img>
                                        <canvas class="fp-canvas d-none" id="fp-canvas"></canvas>
                                    </div>
                                </div>



                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-2">
                            <div class="sticky-top mb-2">

                                <aside class="bg-primary bg-gradient rounded-3  p-sm-5 mb-5">
                                    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start"
                                        style="height:1000px">
                                        Place for Google Adv.
                                    </div>
                                </aside>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </section>
        @endif
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script src="{{ asset('adminAsset/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        // document.querySelector('body').classList.remove('sidebar-mini');
        // document.querySelector('body').classList.remove('layout-fixed');

        document.body.classList.add('sidebar-collapse');
        // document.body.classList.add('no-sidebar');
        // $("nav").hide()

        // $("nav").hide();

        // $("#pushButton").hide();
    </script>

    <script src="{{ asset('adminAsset/plugins/select2/js/select2.full.min.js') }}"></script>
    <scrpt>
        $(function () {
        $('.select2').select2();
        });
    </scrpt>
@endsection
