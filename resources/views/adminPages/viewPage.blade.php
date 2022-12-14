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


    <style>
        #fp-canvas-container {
            height: 65vh;
            width: calc(100%);
            position: relative;
        }

        .fp-img,
        .fp-canvas,
        .fp-canvas-2 {
            position: absolute;
            width: calc(100%);
            height: calc(100%);
            top: 0;
            left: 0;
            z-index: 1;
        }

        #fp-map {
            position: absolute;
            width: calc(100%);
            height: calc(100%);
            top: 0;
            left: 0;
            z-index: 1;
        }

        .fp-canvas {
            z-index: 2;
            background: #6f00000f;
            cursor: crosshair;
        }

        #fp-map {
            z-index: 2;
        }

        area {
            position: absolute;
        }

        area:hover {
            background: #6501010f;
            color: turquoise;
        }

        #save,
        #cancel {
            display: none;
        }

        .fw-bolder:hover {
            border: 2px solid #f90000;

        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard ({{ $date }})</h1>
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


        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-9">


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $paperName }} -{{ $singlePage->pageTitle }}</h3>
                                <input style="display:none;" type="date" value={{ $date }}
                                    id="newspaperDate"></input>
                            </div>
                            <div class="row">
                                <div class="col-12" id="fp-canvas-container" style="width:100%; height:100%;">
                                    <map name="fp-map" id="fp-map">
                                    </map>
                                    <img src="{{ urldecode($singlePage->pageImageUrl) }}" id="fp-img" width="100%"
                                        usemap="#fp-map"></img>
                                    <canvas class="fp-canvas d-none" id="fp-canvas"></canvas>
                                </div>
                            </div>



                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Tools</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the events -->
                                    <div id="external-events">


                                        <div class="external-event bg-success" id="map_area" style="cursor: default;">Add
                                        </div>

                                        <div class="external-event bg-success" id="save" style="cursor: default;">Save
                                        </div>

                                        <div class="external-event bg-danger" id="cancel" style="cursor: default;">
                                            Cancel
                                        </div>
                                        <br>
                                        <div class="external-event bg-info" style="cursor: default;">Next Page</div>
                                        <div class="external-event bg-info" style="cursor: default;">Previous Page</div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                    </div>

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->



    <!--Mapped Area View Details Modal -->



    <!-- Extra large modal -->


    <div class="modal fade bd-example-modal-xl" id="view_modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body" style="overflow:scroll;">

                </div>
                <div class="modal-footer py-1">
                    <p>Share On: </p>
                    <button type="button" style="background: none;stroke: none;border: none;" onclick="shareFacebook()">
                        <ion-icon name="logo-facebook" style="height:40px;width:40px"></ion-icon>
                    </button>

                    <button type="button" style="background: none;stroke: none;border: none;" onclick="shareFacebook()">
                        <ion-icon name="logo-whatsapp" style="height:40px;width:40px"></ion-icon>
                    </button>


                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Mapped Area Add/Edit Details Form Modal -->
    <div class="modal fade" id="form_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mapped Area Details</h5>
                </div>
                <div class="modal-body">
                    <form action="" id="mapped-form">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="x" value="">
                        <input type="hidden" name="y" value="">
                        <input type="hidden" name="width" value="">
                        <input type="hidden" name="height" value="">
                        <input type="hidden" name="paperId" value="">
                        <input type="hidden" name="date" value="">
                        <input type="hidden" name="edition" value="">
                        <input type="hidden" name="pageNo" value="">
                        <div class="form-group">
                            <label for="description" class="control-label text-primary">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4" class="form-control rounded-0"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-1">
                    <button type="submit" class="btn btn-sm rounded-0 btn-primary" form="mapped-form">Save</button>
                    <button type="button" class="btn btn-sm rounded-0 btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of Mapped Area Add/Edit Details Form Modal -->


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



    <script>
        $(document).ready(function() {
            $('#table21').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order: [4, 'DESC'],
            });
        });
    </script>


    <script src="{{ asset('adminAsset/misc/maparea.js') }}"></script>
    <script>
        console.log({!! $date !!})
        $(function() {
            cposX = $('#fp-canvas')[0].getBoundingClientRect().x
            cposY = $('#fp-canvas')[0].getBoundingClientRect().y
            ctx = $('#fp-canvas')[0].getContext('2d');

            // Creates the Map Area on the Image
            mapped_area()

            // Re-initialize Map Area Creation when the window has been resized
            $(window).on('resize', function() {
                mapped_area()
            })
        });




        // Event Listener when the mouse is clicked on the canvas area
        $('.fp-canvas').on('mousedown', function(e) {
            px1_perc = (e.clientX - cposX) / $('#fp-canvas').width()
            py1_perc = (e.clientY - cposY) / $('#fp-canvas').height()
            posX = $('#fp-canvas')[0].width * ((e.clientX - cposX) / $('#fp-canvas').width());
            posY = $('#fp-canvas')[0].height * ((e.clientY - cposY) / $('#fp-canvas').height());
            isDraw = true
        })

        // Event Listener when the mouse is moving on the canvas area. For drawing the rectangular Area
        $('.fp-canvas').on('mousemove', function(e) {
            if (isDraw == false)
                return false;
            nposX = $('#fp-canvas')[0].width * ((e.clientX - cposX) / $('#fp-canvas').width());
            nposY = $('#fp-canvas')[0].height * ((e.clientY - cposY) / $('#fp-canvas').height());
            var height = nposY - posY;
            var width = nposX - posX;
            ctx.clearRect(0, 0, $('.fp-canvas')[0].width, $('.fp-canvas')[0].height);
            ctx.beginPath();
            ctx.lineWidth = .2;
            ctx.strokeStyle = "red";
            ctx.rect(posX, posY, width, height);
            ctx.stroke();
        })
        // Event Listener when the mouse is up on the canvas area. End of Drawing
        $('.fp-canvas').on('mouseup', function(e) {
            px2_perc = (e.clientX - cposX) / $('#fp-canvas').width()
            py2_perc = (e.clientY - cposY) / $('#fp-canvas').height()
            nposX = $('#fp-canvas')[0].width * ((e.clientX - cposX) / $('#fp-canvas').width());
            nposY = $('#fp-canvas')[0].height * ((e.clientY - cposY) / $('#fp-canvas').height());
            var height = nposY - posY;
            var width = nposX - posX;

            ctx.clearRect(0, 0, $('.fp-canvas')[0].width, $('.fp-canvas')[0].height);
            ctx.beginPath();




            ctx.lineWidth = .2;
            ctx.strokeStyle = "red";
            ctx.rect(posX, posY, width, height);
            ctx.stroke();
            isDraw = false
        })




        // Action when Map Are button is clicked
        $('#map_area').click(function() {
            $(this).hide('slow')
            // $('#save,#cancel').show('slow')
            // $('#fp-canvas').removeClass('d-none')
            cposX = $('#fp-canvas')[0].getBoundingClientRect().x
            cposY = $('#fp-canvas')[0].getBoundingClientRect().y
        })
        // Action when Map Are cancel is clicked
        $('#cancel').click(function() {
            $('#save,#cancel').hide('slow')
            $('#map_area').show('slow')
            $('#fp-canvas').addClass('d-none')
        })
        // Action when Map Are save is clicked
        $('#save').click(function() {
            var cP = px1_perc + ", " + py1_perc + ", " + px2_perc + ", " + py2_perc;
            var paperId = String({{ $paperId }});
            var pageNo = String({{ $pageNo }});
            var currentDate = $('#newspaperDate').val()


            // var day = currentDate.getDate()
            // var month = currentDate.getMonth() + 1
            // var year = currentDate.getFullYear()

            // var date = year + "-" + ("0" + (month)).slice(-2) + "-" + ("0" + (day)).slice(-2)


            var edition = String({{ $edition }});
            $('#form_modal').find('input[name="x"]').val(px1_perc)
            $('#form_modal').find('input[name="y"]').val(py1_perc)
            $('#form_modal').find('input[name="width"]').val(px2_perc)
            $('#form_modal').find('input[name="height"]').val(py2_perc)
            $('#form_modal').find('input[name="paperId"]').val(paperId)
            $('#form_modal').find('input[name="pageNo"]').val(pageNo)
            $('#form_modal').find('input[name="date"]').val(currentDate)
            $('#form_modal').find('input[name="edition"]').val(edition)
            $('#form_modal').modal('show')
        })


        // Saving the Mapped Area Details on local Storage
        $('#mapped-form').submit(function(e) {
            e.preventDefault();
            var data;
            var id = $(this).find('[name="id"]').val()
            var x = $(this).find('[name="x"]').val()
            var y = $(this).find('[name="y"]').val()
            var width = $(this).find('[name="width"]').val()
            var height = $(this).find('[name="height"]').val()
            var description = $(this).find('[name="description"]').val()
            var date = $('#newspaperDate').val()
            var paperId = $(this).find('[name="paperId"]').val()
            var pageNo = $(this).find('[name="pageNo"]').val()
            var edition = $(this).find('[name="edition"]').val()




            $.ajax({
                type: 'POST',
                url: '/api/saveMappedArea',
                dataType: 'JSON',
                data: {
                    _token: <?php echo "'" . csrf_token() . "'"; ?>,
                    id: id,
                    x: x,
                    y: y,
                    width: width,
                    height: height,
                    description: description,
                    date: date,
                    paperId: paperId,
                    pageNo: pageNo,
                    edition: edition,
                },

                success: function(data) {
                    Swal.fire(
                        'Area Mapped Successfully',
                        '',
                        'success'
                    )

                    swal({
                            title: "Area Mapped Successfully",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "success",
                            buttons: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.reload()
                            }
                        });

                },
                error: function(jqXHR, textStatus) {
                    alert(textStatus);

                }
            });



        })




        function mapped_area() {
            @if (count($mapAreaData) != 0)
                mapAreaData = {!! $mapAreaData !!};
            @endif

            // console.log(mapAreaData);
            Object.keys(mapAreaData).map(k => {
                var data = mapAreaData[k];
                var area = $("<area shape='rect'>");
                area.attr("href", "javascript:void(0)");
                var x = $("#fp-img").width() * data.x;
                var y = $("#fp-img").height() * data.y;
                var width = Math.abs($("#fp-img").width() * Math.abs(data.width) - x);
                var height = Math.abs($('#fp-img').height() * Math.abs(data.height) - y);
                if ($("#fp-img").width() * data.width - x < 0) x = x - width;
                if ($("#fp-img").height() * data.height - y < 0) y = y - height;

                area.attr("coords", x + ", " + y + ", " + width + ", " + height);
                area.addClass(
                    "fw-bolder ");
                area.css({
                    height: height + "px",
                    width: width + "px",
                    top: y + "px",
                    left: x + "px",
                });

                $("#fp-map").append(area);


                area.click(function() {
                    var ctx = $("#fp-canvas")[0].getContext("2d");
                    var ImageData = ctx.getImageData(x, y, width, height);
                    // create image element
                    var MyImage = new Image();
                    var canvas = $('#fp-canvas')[0];
                    // var ctx = $("#fp-canvas").getContext("2d");
                    canvas.width = width * 2;
                    canvas.height = height * 2;
                    ctx.putImageData(ImageData, 0, 0);
                    // = canvas.toDataURL();

                    var image = document.getElementById("fp-img");

                    ctx.drawImage(image,
                        x, y, //from where
                        width, height, //how big it would be of the snapshot
                        0, 0, //where we want to be placed
                        width * 2, height * 2 //size of the placement
                    );
                    MyImage.src = canvas.toDataURL();
                    MyImage.id = "imageToshare";
                    MyImage.alt = "Find these article on Amar Asom.";
                    $('.modal-body').html(MyImage);
                    $('#view_modal').modal('show');
                })
            });


        }
    </script>

    <script>
        function shareFacebook() {
            alert('Facebook')

            // u = TheImg.src;
            u = $("#imageToshare").src;

            // t=document.title;
            t = $("#imageToshare").alt;
            window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t),
                'sharer', 'toolbar=0,status=0');
            return false;

        }
    </script>
@endsection
