// Canvas Position Variables
var cposX = 0,
    cposY = 0;
// Mouse Down Position Variables
var posX = 0,
    posY = 0;
// Mouse Moving Position Variables
var nposX = 0,
    nposY = 0;
// Coordinate Position in Percentage Variables
var px1_perc = 0,
    py1_perc = 0,
    px2_perc = 0,
    py2_perc = 0;
// Canvas Variable
var ctx;
// Variable for checking if the mouse has started to draw or not
var isDraw = false;
//Get Data For Mapped Area Details
// function getDataForMappedNews(paperId, pageNo, date) {
//     alert(
//         "Getting data for " + paperId + " Page No " + pageNo + " Date " + date
//     );
// }

// // Auto Increment sequence for the Store Data Identification [id]
// var AI_seq = $.parseJSON(localStorage.getItem("seq")) || 0;
// // Stored Data [Mapped Area Details]
// var stored = $.parseJSON(localStorage.getItem("mapped")) || {};

// // Function that creates the Area tag and appends to the Map Tag
// function mapped_area() {
//     if (Object.keys(stored).length > 0) {
//         // Empty Map Tag First
//         $("#fp-map").html("");

//         // Looping Data
//         Object.keys(stored).map((k) => {
//             // Loop Current Data
//             var data = stored[k];
//             // Creating New Area Tag
//             var area = $("<area shape='rect'>");
//             area.attr("href", "javascript:void(0)");
//             // Coordinate Percentage
//             var perc = data.coord_perc;
//             perc = perc.replace(" ", "");
//             perc = perc.split(",");

//             // Configuring Area Position, Height, and Width
//             var x = $("#fp-img").width() * perc[0];
//             var y = $("#fp-img").height() * perc[1];
//             var width = Math.abs($("#fp-img").width() * Math.abs(perc[2]) - x);
//             var height = Math.abs(
//                 $("#fp-img").height() * Math.abs(perc[3]) - y
//             );
//             if ($("#fp-img").width() * perc[2] - x < 0) x = x - width;
//             if ($("#fp-img").height() * perc[3] - y < 0) y = y - height;
//             area.attr("coords", x + ", " + y + ", " + width + ", " + height);
//             area.addClass("fw-bolder text-muted");
//             area.css({
//                 height: height + "px",
//                 width: width + "px",
//                 top: y + "px",
//                 left: x + "px",
//             });

//             $("#fp-map").append(area);

//             // Action to make if the Area Tag has been clicked
//             area.click(function () {
//                 $("#view_modal")
//                     .find("#edit-area,#delete-area")
//                     .attr("data-id", data.id);
//                 data.description = data.description.replace(/\n/gi, "<br>");
//                 $("#view_modal").find(".modal-body").html(data.description);
//                 $("#view_modal").modal("show");
//             });
//         });
//     }
// }

// $(function () {
//     cposX = $("#fp-canvas")[0].getBoundingClientRect().x;
//     cposY = $("#fp-canvas")[0].getBoundingClientRect().y;
//     ctx = $("#fp-canvas")[0].getContext("2d");

//     // Creates the Map Area on the Image
//     mapped_area();

//     // Re-initialize Map Area Creation when the window has been resized
//     $(window).on("resize", function () {
//         mapped_area();
//     });

//     // Event Listener when the mouse is clicked on the canvas area
//     $(".fp-canvas").on("mousedown", function (e) {
//         px1_perc = (e.clientX - cposX) / $("#fp-canvas").width();
//         py1_perc = (e.clientY - cposY) / $("#fp-canvas").height();
//         posX =
//             $("#fp-canvas")[0].width *
//             ((e.clientX - cposX) / $("#fp-canvas").width());
//         posY =
//             $("#fp-canvas")[0].height *
//             ((e.clientY - cposY) / $("#fp-canvas").height());
//         isDraw = true;
//     });

//     // Event Listener when the mouse is moving on the canvas area. For drawing the rectangular Area
//     $(".fp-canvas").on("mousemove", function (e) {
//         if (isDraw == false) return false;
//         nposX =
//             $("#fp-canvas")[0].width *
//             ((e.clientX - cposX) / $("#fp-canvas").width());
//         nposY =
//             $("#fp-canvas")[0].height *
//             ((e.clientY - cposY) / $("#fp-canvas").height());
//         var height = nposY - posY;
//         var width = nposX - posX;
//         ctx.clearRect(
//             0,
//             0,
//             $(".fp-canvas")[0].width,
//             $(".fp-canvas")[0].height
//         );
//         ctx.beginPath();
//         ctx.lineWidth = ".3";
//         ctx.strokeStyle = "pink";
//         ctx.rect(posX, posY, width, height);
//         ctx.stroke();
//     });
//     // Event Listener when the mouse is up on the canvas area. End of Drawing
//     $(".fp-canvas").on("mouseup", function (e) {
//         px2_perc = (e.clientX - cposX) / $("#fp-canvas").width();
//         py2_perc = (e.clientY - cposY) / $("#fp-canvas").height();
//         nposX =
//             $("#fp-canvas")[0].width *
//             ((e.clientX - cposX) / $("#fp-canvas").width());
//         nposY =
//             $("#fp-canvas")[0].height *
//             ((e.clientY - cposY) / $("#fp-canvas").height());
//         var height = nposY - posY;
//         var width = nposX - posX;

//         ctx.clearRect(
//             0,
//             0,
//             $(".fp-canvas")[0].width,
//             $(".fp-canvas")[0].height
//         );
//         ctx.beginPath();
//         ctx.lineWidth = ".3";
//         ctx.strokeStyle = "pink";
//         ctx.rect(posX, posY, width, height);
//         ctx.stroke();
//         isDraw = false;
//     });

//     // Action when Map Are button is clicked
//     $("#map_area").click(function () {
//         $(this).hide("slow");
//         $("#save,#cancel").show("slow");
//         $("#fp-canvas").removeClass("d-none");
//         cposX = $("#fp-canvas")[0].getBoundingClientRect().x;
//         cposY = $("#fp-canvas")[0].getBoundingClientRect().y;
//     });
//     // Action when Map Are cancel is clicked
//     $("#cancel").click(function () {
//         $("#save,#cancel").hide("slow");
//         $("#map_area").show("slow");
//         $("#fp-canvas").addClass("d-none");
//     });
//     // Action when Map Are save is clicked
//     $("#save").click(function () {
//         var cP = px1_perc + ", " + py1_perc + ", " + px2_perc + ", " + py2_perc;
//         $("#form_modal").find('input[name="coord_perc"]').val(cP);
//         $("#form_modal").modal("show");
//     });

//     // Saving the Mapped Area Details on local Storage
//     $("#mapped-form").submit(function (e) {
//         e.preventDefault();
//         var data;
//         var id = $(this).find('[name="id"]').val();
//         var coord_perc = $(this).find('[name="coord_perc"]').val();
//         var description = $(this).find('[name="description"]').val();

//         if (id == "") {
//             id = AI_seq + 1;
//             localStorage.setItem("seq", id);
//         }
//         data = { id: id, description: description, coord_perc: coord_perc };
//         stored[id] = data;
//         localStorage.setItem("mapped", JSON.stringify(stored));
//         alert("Mapped Area Successfully saved.");
//         location.reload();
//     });
//     // Edit Mapped Area Details
//     $("#edit-area").click(function () {
//         $(".modal").modal("hide");
//         id = $(this).attr("data-id");
//         data = stored[id] || {};
//         $("#mapped-form").find('[name="id"]').val(data.id);
//         $("#mapped-form").find('[name="coord_perc"]').val(data.coord_perc);
//         $("#mapped-form").find('[name="description"]').val(data.description);
//         $("#form_modal").modal("show");
//     });
//     // Delete Mapped Area
//     $("#delete-area").click(function () {
//         $(".modal").modal("hide");
//         id = $(this).attr("data-id");
//         data = stored[id] || {};
//         var _conf = confirm("Are you sure to delete the selected mapped area?");
//         if (_conf === true) {
//             if (!!stored[id]) delete stored[id];
//         }
//         localStorage.setItem("mapped", JSON.stringify(stored));
//         alert("Selected Mapped Area Successfully Deleted.");
//         location.reload();
//     });
// });
