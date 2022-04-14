<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/favicon.png') }}" />
<!-- Custom CSS -->
<link href="{{ asset('backend/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
<!-- Custom CSS -->
<link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/select2/dist/css/select2.min.css') }} " />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/jquery-minicolors/jquery.minicolors.css') }} " />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }} " />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/quill/dist/quill.snow.css') }} " />

<!-- BEGIN:bootstrap-sweetalert -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/bootstrap-sweetalert/sweetalert.min.css') }}" />


 {{-- Icon --}}
 <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


<!-- Extar Page Base CSS -->
@stack('custom_css')
<!-- End Extar Page Base CSS -->