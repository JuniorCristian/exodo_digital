<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
    <link href="favicon.ico" rel="icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/plugins/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{url(mix('css/style.min.css'))}}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">

@yield('content')

<script src="{{asset('js/plugins/jquery.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.mask.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/plugins/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/plugins/easing.min.js')}}"></script>
<script src="{{asset('js/plugins/typed.min.js')}}"></script>
<script src="{{asset('js/plugins/wow.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert2.min.js')}}"></script>
<script src="{{url(mix('js/script.min.js'))}}"></script>
@stack('scripts')
</body>
</html>
