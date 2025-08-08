$(document).ready(function() {
    $(document).on("submit", "#car-form", function(e){
        e.preventDefault();

        let formData = new FormData(this);

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: "/admin/cars/store",
            type: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);

                window.location.href = "/admin/cars";
            }
        });
    });
    
    $(document).on("click", "#car-edit", function(e) {
        e.preventDefault();

        const carId = $(this).data('id');
        console.log(carId);
        window.location.href = "/admin/cars/" + carId + "/edit";
    });

    $(document).on("submit", "#car-delete", function(e){
        e.preventDefault();

        const form = $(this);
        const carId = form.data('id');

        console.log(carId);
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
                    url: "/admin/cars/" + carId + "/delete",
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

    $(document).on("submit", "#car-edit-form", function(e){
        e.preventDefault();

        let formData = new FormData(this);
        const carId = $(this).data('id');

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: "/admin/cars/" + carId + "/update",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                console.log(res);

                window.location.href = "/admin/cars";
            }
        });
    });
});