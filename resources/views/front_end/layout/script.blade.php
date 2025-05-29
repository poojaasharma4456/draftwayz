<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"
            async defer></script>

<script>
    $(".profile").click(function(){
        $(this).find(".dropdown").slideToggle(); // This will toggle the dropdown menu
        // Toggle the visibility of the arrow images
        $(this).find(".profile-down-arrow").toggle();
        $(this).find(".profile-up-arrow").toggle();
    });


    $(document).ready(function() {
        // Hide elements with the class dt-length
        $('.dt-length').addClass('d-none-custom');
        // Hide elements with the class dt-column-order
        $('.dt-column-order').css('display', 'none');
    });

</script>

