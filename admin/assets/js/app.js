$(".toggle_sidebar").click(function (e) {
  e.preventDefault();
  $(".sidebar").toggleClass("toggle");
  $(".top_navbar").toggleClass("toggle");
  $(".main").toggleClass("toggle");
});

// login form handle
$("#loginForm").submit(function (e) {
  e.preventDefault();
  var form = $("#loginForm")[0];
  var formData = new FormData(form);
  var url = "form_handle/login.php";
  $.ajax({
    url: url,
    type: "POST",
    data: formData,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (data) {
      if (data.status == "success") {
        sweetAlert("success", data.message);
        setInterval(() => {
          window.location.href = "index.php";
        }, 1000);
      } else {
        toast("error", data.message);
      }
    },
  });
});

// student form handle
$("#studentForm").submit(function (e) {
  e.preventDefault();
  var form = $("#studentForm")[0];
  var formData = new FormData(form);
  var url = "form_handle/student-register.php";
  $.ajax({
    url: url,
    type: "POST",
    data: formData,
    beforesend: function () {
      $("#studentForm").find("button").attr("disabled", true);
    },

    dataType: "json",
    contentType: false,
    processData: false,
    success: function (data) {
      if (data.status == "success") {
        sweetAlert("success", data.message);
        setInterval(() => {
          window.location.href = "index.php";
        }, 1000);
      } else {
        toast("error", data.message);
      }
    },
  });
});

// config datatable
$(document).ready(function () {
  $("#myTable").DataTable();
  $('#myTable').addClass('table-striped table-bordered table-hover');
});

// utils functions start #################################################################

// taost function
function toast(status = "success", message = "test message") {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
  });
  Toast.fire({
    icon: status,
    title: message,
  });
}

// sweet alert
function sweetAlert(status = "success", message = "test message") {
  Swal.fire({
    title: status,
    text: message,
    icon: status,
  });
}
// utils functions start #################################################################
