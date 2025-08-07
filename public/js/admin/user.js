$(document).ready(function(){
    $(document).on('submit', "#user-form", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "/admin/users/store",
            type: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                $("#user-form")[0].reset();
                window.location.href = "/admin/users";
            }
        });
    })

    $(document).on("click", "#user-edit", function(e) {
        e.preventDefault();

        const userId = $(this).data('id');
        window.location.href = "/admin/users/" + userId + "/edit";
    });

    $(document).on("submit", "#user-delete", function(e) {
        e.preventDefault();

        const form = $(this);
        const userId = form.data('id');

        console.log(userId);
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
                    url: "/admin/users/" + userId + "/delete",
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

    $(document).on("submit", "#user-update", function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        const userId = $(this).data('id');

        $.ajax({
            url: "/admin/users/" + userId + "/update",
            type: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                window.location.href = "/admin/users";
            }
        });
    });
});