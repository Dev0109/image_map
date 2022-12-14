@extends('layouts.app')

@section('content')
    @include('layouts.adminMenu')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

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

        .fp-img {
            
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
                        @if (count($allpages) > 0)
                            <h1 class="m-0">{{ $paperName }}({{ $date }})</h1>
                        @endif

                        @if (count($allpages) == 0)
                            <h1 class="m-0">No Data Available</h1>
                        @endif
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


        @if (count($allpages) > 0)
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title">Tools</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- the events -->
                                        <div id="external-events">

                                            <div class="external-event bg-info" style="cursor: default;">
                                                <input type="hidden" value={{ $paperId }} id="paperId" />
                                                <input type="hidden" value={{ $paperCode }} id="paperCode" />
                                                <input type="hidden" value={{ $pageNo }} id="pageNo" />


                                                <select class="form-control select2"
                                                    style="background:#17a2b8!important;border: none;color: white;"id="paperEdition"
                                                    name="paperEdition" style="width: 100%;">
                                                </select>

                                            </div>
                                            <div class="external-event bg-info" style="cursor: default;"><input
                                                    type="date" value={{ $date }}
                                                    style="background:#17a2b8!important;border: none;color: white;"
                                                    id="defaultDate" /></div>


                                            @if (count($allpages) > 0)
                                                @foreach ($allpages as $page)
                                                    <div class="external-event bg-grey" id="pages"
                                                        style="cursor: default;">
                                                        <a
                                                            href="/viewNewsPaper/{{ $paperCode }}/{{ $page->edition }}/{{ $page->date }}/{{ $page->pageNo }}">{{ $page->pageTitle }}</a>
                                                    </div>
                                                @endforeach
                                            @endif


                                            <br>
                                            <div class="external-event bg-success" style="cursor: default;" id="map_area">
                                                Add
                                                Area</div>

                                            {{-- <div class="external-event bg-red" style="cursor: default; display:none;"
                                                id="saveArea">
                                                Save
                                                Area</div> --}}

                                            <button class="external-event bg-info" type="button" id="save">Save
                                                Mapped Area</button>
                                            <button class="external-event bg-red" type="button"
                                                id="cancel">Cancel</button>




                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>
                        </div>
                        <div class="col-md-9">


                            <div class="card card-primary">
                                <div class="card-header">
                                    @if (count($allpages) > 0)
                                        <h3 class="card-title">{{ $paperName }} - {{ $page->pageTitle }}</h3>
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

                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </section>

        @endif

    </div>
    <!-- /.content-wrapper -->




    <div class="modal fade bd-example-modal-xl" id="view_modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body" style="overflow:scroll;" id='clipboard'>

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
                        <input type="hidden" name="form_id" value="">
                        <input type="hidden" name="form_x" value="">
                        <input type="hidden" name="form_y" value="">
                        <input type="hidden" name="form_width" value="">
                        <input type="hidden" name="form_height" value="">
                        <input type="hidden" name="form_paperId" value="">
                        <input type="hidden" name="form_date" value="">
                        <input type="hidden" name="form_edition" value="">
                        <input type="hidden" name="form_pageNo" value="">
                        <div class="form-group">
                            <label for="form_description" class="control-label text-primary">Description</label>
                            <textarea name="form_description" id="form_description" cols="30" rows="4"
                                class="form-control rounded-0"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-1">
                    <button type="submit" class="btn btn-sm rounded-0 btn-primary" form="mapped-form">Save</button>
                    <button type="button" class="btn btn-sm rounded-0 btn-secondary" id="closeModal"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of Mapped Area Add/Edit Details Form Modal -->


    {{-- <script src="{{ asset('adminAsset/misc/maparea.js') }}"></script> --}}


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

    <script>
        /* jQuery Part */
        $("#defaultDate").change(function() {

            var edition = $("#paperEdition").val();
            var paperCode = $("#paperCode").val();
            selectedDate = $('#defaultDate').datepicker({
                dateFormat: 'yy-mm-dd'
            }).val();
            // alert(selectedDate);
            window.location.href = '/viewNewsPaper/' +
                paperCode + '/' + edition + '/' + selectedDate + '/' + 1; //Will take you to Google.

        });
    </script>

    <script type="text/javascript">
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear() + "-" + (month) + "-" + (day);

        $('#defaultDate').val(today);
    </script>

    <script>
        // $('#addArea').click(function() {

        //     $('#addArea').hide();
        //     $('#saveArea').show();

        // })

        // $('#saveArea').click(function() {

        //     $('#addArea').show();
        //     $('#saveArea').hide();

        // })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var paperId = $('#paperId').val();
            $.ajax({
                type: 'POST',
                url: '/api/getEditions/',
                dataType: 'JSON',
                data: {
                    id: paperId,
                },

                success: function(data) {

                    var allData = data.allEditions;
                    var select = document.getElementById("paperEdition");

                    for (var i = 0; i < allData.length; i++) {
                        var opt = allData[i].name;
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = allData[i].id;
                        select.appendChild(el);
                    }
                },
                error: function(jqXHR, textStatus) {
                    alert(textStatus);

                }
            });

        })
    </script>

    <script>
        // console.log({!! $date !!})
        let isDraw;
        let posX;
        let posY;
        let px1_perc;
        let py1_perc;
        let px2_perc;
        let py2_perc;
        let mapAreaData = [];

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
            ctx.lineWidth = .1;
            ctx.strokeStyle = "red";
            ctx.rect(posX, posY, width, height);
            ctx.stroke();
            isDraw = false
        })




        // Action when Map Are button is clicked
        $('#map_area').click(function() {
            $(this).hide('slow')
            $('#save,#cancel').show('slow')
            $('#fp-canvas').removeClass('d-none')
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
            var pageNo = $("#pageNo").val();
            var currentDate = $('#defaultDate').val()


            // var day = currentDate.getDate()
            // var month = currentDate.getMonth() + 1
            // var year = currentDate.getFullYear()

            // var date = year + "-" + ("0" + (month)).slice(-2) + "-" + ("0" + (day)).slice(-2)


            var edition = String({{ $edition }});
            $('#form_modal').find('input[name="form_x"]').val(px1_perc)
            $('#form_modal').find('input[name="form_y"]').val(py1_perc)
            $('#form_modal').find('input[name="form_width"]').val(px2_perc)
            $('#form_modal').find('input[name="form_height"]').val(py2_perc)
            $('#form_modal').find('input[name="form_paperId"]').val(paperId)
            $('#form_modal').find('input[name="form_pageNo"]').val(pageNo)
            $('#form_modal').find('input[name="form_date"]').val(currentDate)
            $('#form_modal').find('input[name="form_edition"]').val(edition)
            $('#form_modal').modal('show')
        })

        $('#closeModal').click(function() {            
            $('#form_modal').modal('hide')
        })


        // Saving the Mapped Area Details on local Storage
        $('#mapped-form').submit(function(e) {
            e.preventDefault();
            var data;
            var id = $(this).find('[name="form_id"]').val()
            var x = $(this).find('[name="form_x"]').val()
            var y = $(this).find('[name="form_y"]').val()
            var width = $(this).find('[name="form_width"]').val()
            var height = $(this).find('[name="form_height"]').val()
            var description = $(this).find('[name="form_description"]').val()
            var date = $('#defaultDate').val()
            var paperId = $('#paperId').val()
            var pageNo = $("#pageNo").val();
            var edition = $(this).find('[name="form_edition"]').val()

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
                    
                    data = {
                        x: x,
                        y: y,
                        width: width,
                        height: height,
                        description: description,
                        date: date,
                        paperId: paperId,
                        pageNo: pageNo,
                        edition: edition,
                    };
                    mapAreaData[mapAreaData.length] = data
                    addArea(data)

                    console.log(mapAreaData);
                    Swal.fire(
                        'Area Mapped Successfully',
                        '',
                        'success'
                    ).then((result) => {  
                        $('#form_modal').modal('hide')
                    });
                },
                error: function(jqXHR, textStatus) {
                    console.log(jqXHR)
                }
            });



        })




        function mapped_area() {
            
            @if (count($mapAreaData) != 0)
                mapAreaData = {!! $mapAreaData !!};
            @endif
            
            Object.keys(mapAreaData).map(k => {
                var data = mapAreaData[k];
                addArea(data);
            });


        }

        function addArea(data) {
                var area = $("<area shape='rect'>");
                area.attr("href", "javascript:void(0)");
                var x = $("#fp-img").width() * data.x;
                var y = $("#fp-img").height() * data.y;
                var width = Math.abs($("#fp-img").width() * Math.abs(data.width) - x);
                var height = Math.abs($('#fp-img').height() * Math.abs(data.height) - y);
                if ($("#fp-img").width() * data.width - x < 0) x = x - width;
                if ($("#fp-img").height() * data.height - y < 0) y = y - height;
                console.log("X+1", x + ", " + y + ", " + width + ", " + height);

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
                    html2canvas(document.querySelector('#fp-img'), {x, y, width, height}).then(canvas => {
                        // document.body.appendChild(canvas);
                        
                        document.getElementById("clipboard").innerHTML = '';
                        document.getElementById("clipboard").appendChild(canvas);
                        
                        // var MyImage = new Image();
                        // MyImage.src = canvas.toDataURL();
                        // MyImage.id = "imageToshare";
                        // MyImage.alt = "Find these article on Amar Asom.";
                        // $('.modal-body').html(MyImage);
                        $('#view_modal').modal('show');
                    });

                    // var ctx = $("#fp-canvas")[0].getContext("2d");
                    // console.log("X+2", x + ", " + y + ", " + width + ", " + height);

                    // var ImageData = ctx.getImageData(x, y, width, height);
                    // // create image element
                    // var MyImage = new Image();
                    // var canvas = $('#fp-canvas')[0];
                    // // var ctx = $("#fp-canvas").getContext("2d");
                    // canvas.width = width;
                    // canvas.height = height;
                    // ctx.putImageData(ImageData, 0, 0);
                    // // = canvas.toDataURL();

                    // var image = document.getElementById("fp-img");

                    // ctx.drawImage(image,
                    //     x, y, //from where
                    //     width, height, //how big it would be of the snapshot
                    //     0, 0, //where we want to be placed
                    //     width, height //size of the placement
                    // );
                    // MyImage.src = canvas.toDataURL();
                    // MyImage.id = "imageToshare";
                    // MyImage.alt = "Find these article on Amar Asom.";
                    // $('.modal-body').html(MyImage);
                    // $('#view_modal').modal('show');
                })
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
