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