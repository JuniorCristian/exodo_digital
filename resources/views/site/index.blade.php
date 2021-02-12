@extends('site.layouts.app')

@section('content')
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="{{route('home')}}" class="navbar-brand">{{env('APP_NAME')}}</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="#sobre" class="nav-item nav-link">Sobre a Êxodo</a>
                    <a href="#como-fazemos" class="nav-item nav-link">Como fazemos</a>
                    <a href="#cursos" class="nav-item nav-link">Nossos Cursos</a>
                    <a href="#loja" class="nav-item nav-link">Veja nossa loja</a>
                    <a href="#contato" class="nav-item nav-link">Contato</a>
                </div>
            </div>
        </div>
    </div>


    <div class="hero" id="home">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-8">
                    <div class="hero-content">
                        <div class="hero-text">
                            <p>ÊXODO DIGTAL</p>
                            <h1>Somos uma agência especializada em</h1>
                            <h3 class="text-white">Gestão de tráfego e desenvolvimento organizacional.</h3>
                        </div>
                        <div class="hero-btn">
                            <a href="#loja" class="btn">Conheça nossa loja</a>
                            <a href="#contato" class="btn nav-item">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.quem-somos')

    @include('site.missao')

    @include('site.como-fazemos')

    @include('site.cursos')

    @include('site.loja')

    @include('site.contato')

    <div class="footer wow fadeIn" data-wow-delay="0.3s">
        <div class="container-fluid">
            <div class="container">
                <div class="footer-info">
                    <h2>{{$info_pages->city}}</h2>
                    <h3>{{$info_pages->street}}</h3>
                    <div class="footer-menu">
                        <p>+55 {{$info_pages->phone}}</p>
                        <p>{{$info_pages->email}}</p>
                    </div>
                    <div class="footer-social">
                        @if($info_pages->twitter != null || $info_pages->twitter != "")
                            <a href="{{$info_pages->twitter}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($info_pages->facebook != null || $info_pages->facebook != "")
                            <a href="{{$info_pages->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($info_pages->youtube != null || $info_pages->youtube != "")
                            <a href="{{$info_pages->youtube}}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if($info_pages->instagran != null || $info_pages->instagran != "")
                            <a href="{{$info_pages->instagran}}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($info_pages->linkedin != null || $info_pages->linkedin != "")
                            <a href="{{$info_pages->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <p>&copy; <a href="#">Êxodo Digital</a>, todos os direitos reservados | 2021</p>
            </div>
        </div>
    </div>

    <a href="#" class="btn back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
