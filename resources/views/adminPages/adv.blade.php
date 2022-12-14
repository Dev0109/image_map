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

        <section class="content">
            @if ($errors->count())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Advterisement</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" onsubmit="return submitForm()" action={{ route('advertisement') }}
                            method="post" enctype="multipart/form-data">



                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="advTitle">Advterisement Title <span
                                                    style="color:red">*</span></label>
                                            <input type="text" name="advTitle" id="advTitle"
                                                placeholder="Advterisement Title" class="form-control col-md-12" />
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="displayFrom">Display from <span style="color:red">*</span></label>
                                            <input type="datetime-local" name="displayFrom" id="displayFrom"
                                                class="form-control col-md-12" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="displayTo">Display To<span style="color:red">*</span></label>
                                            <input type="datetime-local" name="displayTo" id="displayTo"
                                                class="form-control col-md-12" />
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="position">Select Position<span style="color:red">*</span></label>
                                            <select class="form-control select2" id="position" name="position"
                                                style="width: 100%;">
                                                <option value="-1" selected>----Select Position---</option>
                                                <option value="1">Top Main</option>
                                                <option value="2">Top Left</option>
                                                <option value="3">Top Right</option>
                                                <option value="4">Bottom Right</option>
                                                <option value="5">Bottom Left</option>
                                                <option value="6">Random</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Select Status<span style="color:red">*</span></label>
                                            <select class="form-control select2" id="status" name="status"
                                                style="width: 100%;">
                                                <option value="1">Active</option>
                                                <option value="2">Suspend</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customFile">Advertisement Image</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="customFile" required>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Photo</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Master Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table21" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Display From</th>
                                            <th>Display To</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allAdv as $adv)
                                            <tr>
                                                <td>{{ $adv->advTitle }}</td>
                                                <td>{{ $adv->displayFrom }}</td>
                                                <td>{{ $adv->displayTo }}</td>
                                                @if ($adv->position == 1)
                                                    <td>Top Main</td>
                                                @endif
                                                @if ($adv->position == 2)
                                                    <td>Top Left</td>
                                                @endif
                                                @if ($adv->position == 3)
                                                    <td>Top Right</td>
                                                @endif
                                                @if ($adv->position == 4)
                                                    <td>Bottom Right</td>
                                                @endif
                                                @if ($adv->position == 5)
                                                    <td>Bottom Left</td>
                                                @endif
                                                @if ($adv->position == 6)
                                                    <td>Random</td>
                                                @endif

                                                @if ($adv->status == 1)
                                                    <td><a href="/suspendAdv/{{ $adv->id }}"><i
                                                                class="fa fa-hand-paper" aria-hidden="true"> </i> Suspend
                                                        </a></td>
                                                @endif

                                                @if ($adv->status == 2)
                                                    <td><a href="/activateAdv/{{ $adv->id }}"><i
                                                                class="fa fa-retweet" aria-hidden="true"></i>

                                                            Activate</a></td>
                                                @endif

                                                <td>
                                                    <image src="{{ asset($adv->image) }}" width="60px" height="60px">
                                                    </image>
                                                </td>
                                                <td><a href="/deleteAdv/{{ $adv->id }}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Display From</th>
                                            <th>Display To</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAsset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <script src="{{ asset('adminAsset/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js"></script>

    <script src="adminAsset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var currentDate = new Date(new Date().getTime());
        var day = currentDate.getDate()
        var month = currentDate.getMonth() + 1
        var year = currentDate.getFullYear()
        console.log(day + "/" + month + "/" + year);
        document.getElementById("displayFrom").value = year + "-" + ("0" + (month)).slice(-2) + "-" + ("0" + (day)).slice(-
            2) + "T05:00:00";

        var currentDate = new Date(new Date().getTime() + 45 * 24 * 60 * 60 * 1000);
        var day = currentDate.getDate()
        var month = currentDate.getMonth() + 1
        var year = currentDate.getFullYear()
        console.log(day + "/" + month + "/" + year);
        document.getElementById("displayTo").value = year + "-" + ("0" + (month)).slice(-2) + "-" + ("0" + (day)).slice(-
            2) + "T00:00:00";
    </script>

    <script>
        $(document).ready(function() {
            $('#table21').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order: [2, 'DESC'],
                responsive: true
            });
        });
    </script>



    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
