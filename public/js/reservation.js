function reservationWizard() {
  return {
    step: 1,
    selectedCar: null,
    pickupDate: '',
    returnDate: '',
    paymentMethod: '',

    get totalDays() {
      if (!this.pickupDate || !this.returnDate) return 0;
      const start = new Date(this.pickupDate);
      const end = new Date(this.returnDate);

      if (isNaN(start.getTime()) || isNaN(end.getTime())) return 0;

      const diff = (end - start) / (1000 * 60 * 60 * 24);
      return diff > 0 ? Math.ceil(diff) : 0;
    },

    get totalPrice() {
      if (!this.selectedCar || !this.totalDays) return 0;
      return this.totalDays * this.selectedCar.price;
    },
  }
}

document.addEventListener('alpine:init', () => {
  Alpine.data('reservationWizard', reservationWizard);
});

document.addEventListener('DOMContentLoaded', () => {
    function formatDateTime(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    function applyDateLimits(inputId) {
        const el = document.getElementById(inputId);
        if (!el) return;

        const now = new Date();
        el.min = formatDateTime(now);

        const maxDate = new Date();
        maxDate.setMonth(maxDate.getMonth() + 6);
        el.max = formatDateTime(maxDate);

        el.addEventListener('change', function () {
            const selected = new Date(this.value);
            const now = new Date();
            if (selected < now) {
                alert('Please select a time in the future.');
                this.value = '';
            }
        });
    }

    applyDateLimits('start_date');
    applyDateLimits('end_date');
});

$(document).ready(function() {
    $(document).on("submit", "#reservation-form", function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

      $.ajax({
        url: "/admin/reservations/store",
        type: "POST",
        data: formData,
        processData:false,
        contentType: false,
        success: function(res) {
          console.log(res);
          window.location.href = "/admin/reservations";
        }
      });
    });

    $(document).on("click", "#reservation-show", function(e) {
        e.preventDefault();

        const reservation_id = $(this).data('id');
        window.location.href = "/admin/reservations/" + reservation_id + "/show";
    });

    $(document).on("click", "#reservation-edit", function(e){
        e.preventDefault();

        const reservationId = $(this).data('id');
        window.location.href = "/admin/reservations/" + reservationId + "/edit";
    });

    $(document).on("submit", "#reservation-delete", function(e){
       e.preventDefault();

        const form = $(this);
        const reservation_id = form.data('id');

        console.log(reservation_id);
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
                    url: "/admin/reservations/" + reservation_id + "/delete",
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

    $(document).on("submit", "#reservation-update", function(e) {
      e.preventDefault();

      const reservation_id = $(this).data('id');
      let formData = new FormData(this);
      formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

      $.ajax({
        url: "/admin/reservations/" + reservation_id + "/update",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
          console.log(res);

          window.location.href = "/admin/reservations";
        }
      });
    });

   
});
