$(document).ready(function(){
    $(document).on('click', "#payment-show", function(e){
        e.preventDefault();

        const payment_id = $(this).data('id');

        window.location.href = "/admin/payments/" + payment_id + "/show";
    });
});