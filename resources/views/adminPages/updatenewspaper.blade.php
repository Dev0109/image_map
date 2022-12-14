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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Newspaper</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="saveImages" onsubmit="return submitForm()"
                                action={{ route('updatenewspaper') }} method="post" enctype="multipart/form-data">



                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Newspaper Date<span style="color:red">*</span></label>
                                                <input type="date" name="date" id="defaultDate"
                                                    value="{{ $defaultDate }}" class="form-control col-md-12" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Publish On<span style="color:red">*</span></label>
                                                <input type="datetime-local" name="publishOn" id="publishOn"
                                                    class="form-control col-md-12" />
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="paperId">Select Newspaper<span
                                                        style="color:red">*</span></label>
                                                <select class="form-control select2" id="paperId" name="paperId"
                                                    style="width: 100%;" onchange="getEditions(this);">
                                                    <option value="-1" selected>----Select Newspaper---</option>
                                                    <option value="1">Amar Asom</option>
                                                    <option value="2">Purvanchal Prahari</option>
                                                    <option value="3">The Meghalaya Guardian</option>
                                                    <option value="4">The NorthEast Times</option>



                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="edition">Select Editions<span
                                                        style="color:red">*</span></label>
                                                <select class="form-control select2" id="edition" name="edition"
                                                    style="width: 100%;">
                                                    <option value="-1" selected>----Select Editions---</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pageTitle">Page Title<span style="color:red">*</span></label>
                                                <input type="text" name="pageTitle" id="pageTitle"
                                                    placeholder="Page Title" class="form-control col-md-12" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pageNo">Page Number<span style="color:red">*</span></label>
                                                <input type="number" name="pageNo" id="pageNo"
                                                    placeholder="Page Number" class="form-control col-md-12" />
                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="customFile">Image<span style="color:red">*</span></label>

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
                                    <h3 class="card-title">Todays Pages</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="table21" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Publish On</th>
                                                <th>Newspaper</th>
                                                <th>Page Title</th>
                                                <th>Page Number</th>
                                                <th>View Page</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allPages as $page)
                                                <tr>
                                                    <td>{{ $page->date }}</td>
                                                    <td>{{ $page->publishOn }}</td>
                                                    @if ($page->paperId == '1')
                                                        <td>Amar Asom</td>
                                                    @endif
                                                    @if ($page->paperId == '2')
                                                        <td>Purvanchal Prahari</td>
                                                    @endif
                                                    @if ($page->paperId == '3')
                                                        <td>The Meghalaya Guardian</td>
                                                    @endif
                                                    @if ($page->paperId == '4')
                                                        <td>The NorthEast Times</td>
                                                    @endif
                                                    <td>{{ $page->pageTitle }}</td>
                                                    <td>{{ $page->pageNo }}</td>
                                                    <td>
                                                        <form action="{{ route('viewImage') }}" method="get">
                                                            @csrf
                                                            <input type="hidden" name="pageId"
                                                                value="{{ $page->id }}">
                                                            <button type="submit"
                                                                style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                text-decoration: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                background-color: transparent;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "
                                                                name="ViewDetails"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('deleteNewPaperImage') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="imageId"
                                                                value="{{ $page->id }}">
                                                            <button type="submit"
                                                                style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    text-decoration: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    border: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    background-color: transparent;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "
                                                                name="ViewDetails"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></button>
                                                        </form>

                                                    </td>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Publish On</th>
                                                <th>Newspaper</th>
                                                <th>Page Title</th>
                                                <th>Page Number</th>
                                                <th>View Page</th>
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
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



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

    <script>
        $(function() {
            bsCustomFileInput.init();
        });


        // document.getElementById("defaultDate").valueAsDate = {{ $defaultDate }};
    </script>
    <script>
        $(document).ready(function() {
            $('#table21').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order: [4, 'DESC'],
                responsive: true
            });
        });
    </script>




    <script>
        /* jQuery Part */
        $("#defaultDate").change(function() {
            selectedDate = $('#defaultDate').datepicker({
                dateFormat: 'yy-mm-dd'
            }).val();
            // alert(selectedDate);
            window.location.href = '/updateByDate/' + selectedDate; //Will take you to Google.

        });
    </script>

    <script>
        var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
        var day = currentDate.getDate()
        var month = currentDate.getMonth() + 1
        var year = currentDate.getFullYear()
        console.log(day + "/" + month + "/" + year);
        document.getElementById("publishOn").value = year + "-" + ("0" + (month)).slice(-2) + "-" + ("0" + (day)).slice(-
            2) + "T05:00:00";
    </script>

    <script>
        function getEditions(ele) {
            // alert(ele.value);
            $.ajax({
                type: 'POST',
                url: '/api/getEditions',
                dataType: 'JSON',
                data: {
                    _token: <?php echo "'" . csrf_token() . "'"; ?>,
                    id: ele.value,
                },

                success: function(data) {
                    // var getAll = data.allMapedArea;
                    // for (var i = 0; i < getAll.length; i++) {
                    //     var singleConnection = getAll[i];
                    //     console.log(singleConnection);
                    //     console.log(singleConnection.imageUrl);
                    // }
                    console.log(data);
                    var select = document.getElementById("edition");
                    var editions = data.allEditions;

                    // Optional: Clear all existing options first:
                    select.innerHTML = "";
                    // Populate list with options:
                    for (var i = 0; i < editions.length; i++) {
                        var ed = editions[i];
                        select.innerHTML += "<option value=\"" + ed.id + "\">" + ed.name +
                            "</option>";
                    }


                    // alert(data);
                },
                error: function(jqXHR, textStatus) {
                    alert(jqXHR.statusText);

                }
            });
        }
    </script>
@endsection
