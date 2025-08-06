$(document).ready(function(){
    $("#review-form").on("submit", function(e){
        e.preventDefault();

       let formData = new FormData(this);
        
       
       $.ajax({
        url: "/admin/reviews/create",
        type: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function(res) {
            console.log(res);
            $("#review-form")[0].reset();
            window.location.href = "/admin/reviews";
        }
       });
    });

    $(document).on('click', "#review-edit", function(e) {
        e.preventDefault();

        const reviewId = $(this).data('id');
        window.location.href = "/admin/reviews/" + reviewId + "/edit";
    });

    $(document).on('submit', "#review-delete", function(e) {
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
                    url: "/admin/reviews/" + locationId + "/delete",
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
    
    $(document).on("submit", "#review-update", function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        const reviewId = $(this).data('id');

        $.ajax({
            url: "/admin/reviews/" + reviewId + "/update",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                console.log(res);

                window.location.href = "/admin/reviews";
            }
        });
    });
});