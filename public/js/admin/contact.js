$(document).ready(function() {
    $("#contact-us-form").on('submit', function(e){
        e.preventDefault();

        let formData = new FormData(this);
        console.log(formData);

        $.ajax({
            url: "/admin/contacts/store",
            type: "POST",
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                console.log(res);
                $("#contact-us-form")[0].reset();
                window.location.href = "/admin/contacts";
            }
        });
    });

    $(document).on('click', "#contact-show", function(e) {
        e.preventDefault();

        const contactId = $(this).data('id');

        console.log(contactId);
        window.location.href = "/admin/contacts/" + contactId + "/show";
    });

    $(document).on('click', "#contact-edit",function(e){
        e.preventDefault();

         const contactId = $(this).data('id');
         console.log(contactId);
        window.location.href = "/admin/contacts/" + contactId + "/edit";
    });

    $(document).on('submit', "#contact-delete", function(e){
        e.preventDefault();

        const form = $(this);
        const contactId = form.data('id');

        console.log(contactId);
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
                    url: "/admin/contacts/" + contactId + "/delete",
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

    $(document).on('submit', "#contact-edit-form", function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        const contactId = $(this).data('id');

        $.ajax({
            url: "/admin/contacts/" +  contactId + "/update",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                console.log(res);

                window.location.href = "/admin/contacts";
            }
        });
    });
});