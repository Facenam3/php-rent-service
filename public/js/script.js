$(document).ready(function () {
    $('#navbar-toggle').on('click', function () {
        $('#navbar-user').toggleClass('hidden');
        $("#admin-sidebar").addClass("hidden");
    });

    $(function () {
      $("#sidebar-toggle").on("click", function () {
          $("#admin-sidebar").removeClass("hidden");
      });

      $("#sidebar-close").on("click", function () {
          $("#admin-sidebar").addClass("hidden");
      });
    });


  const currentPath = window.location.pathname;
  $(".nav-link").each(function() {
    const linkPath = $(this).attr("href");
    if (linkPath === currentPath) {
      $(this).addClass("active-link");
    }
  });

  $('#contact-form').on('submit', function(e){
    e.preventDefault();

    let formData = new FormData(this);
    console.log(formData);

    $.ajax({
      url: '/contact/store',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(res) {
        console.log(res);
        $('#contact-form')[0].reset();
      }
    });
  });
});