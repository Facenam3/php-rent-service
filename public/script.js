$(document).ready(function () {
    $('#navbar-toggle').on('click', function () {
        $('#navbar-user').toggleClass('hidden');
    });
});

$(document).ready(function() {
  const currentPath = window.location.pathname;
  $(".nav-link").each(function() {
    const linkPath = $(this).attr("href");
    if (linkPath === currentPath) {
      $(this).addClass("active-link");
    }
  });
});

// $(document).ready(function(){
//   $('#login').on('submit', function(e){
//     e.preventDefault();

//     let formData = new FormData(this);
//     $.ajax({
//       url: '/login',
//       type: "POST",
//       data: formData,
//       contentType: false,
//       processData: false,
//       sucess: function(res) {
//         console.log("Response:" ,res);
//       },
//        error: function(xhr) {
//         console.error("Error:", xhr.responseText);
//       }
//     });
//   });
// });