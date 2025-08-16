$(document).ready(function() {
    $("#location-form").on('submit', function(e){
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: '/admin/locations/create',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                console.log(res);
                $("#location-form")[0].reset();

                    window.location.href = "/admin/locations";
            }
        });
    });

    $(document).on("click", "#location-edit", function(e){
        e.preventDefault();

        const locationId = $(this).data('id');
        window.location.href = "/admin/locations/" + locationId + "/edit";
    })

    $(document).on("submit", "#location-delete", function(e){
        e.preventDefault();

        const form = $(this);
        const locationId = form.data('id');

        console.log(locationId);
        const csrfToken = form.find('input[name="_token"]').val();

        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    url: "/admin/locations/" + locationId + "/delete",
                    method: "POST",
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        Swal.fire("Deleted", "Location has been deleted.", "success").then(() => {
                            // Optional: reload the page or remove the row
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire("Error", "Something went wrong!", "error");
                    }
                });
            }
        });
    });

    $(document).on("submit","#location-update", function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        const locationId = $(this).data('id');

        console.log(locationId);

        $.ajax({
            url: "/admin/locations/"+ locationId +"/update",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                console.log(res);

                window.location.href = "/admin/locations";
            }
        });
    });

   
});