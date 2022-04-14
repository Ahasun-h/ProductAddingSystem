<script type="text/javascript" src="{{ asset('fontend/js/jquery-2.1.1.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('fontend/js/bootstrap/js/bootstrap.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('fontend/js/jquery.easing-1.3.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('fontend/js/jquery.dcjqaccordion.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('fontend/js/owl.carousel.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('fontend/js/custom.js') }} "></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  


<script type="text/javascript">
        
    // csrf token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // 

</script>

<!-- Extar Page Base script -->
@stack('custom_script')
<!-- End Extar Page Base script -->