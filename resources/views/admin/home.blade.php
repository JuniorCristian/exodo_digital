@extends('admin.layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Produtos Ativos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$produtos_ativos}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Produtos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$produtos}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cursos Ativos
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div
                                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$cursos_ativos}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Cursos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cursos}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-md-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Informações gerais da página</h6>
                    </div>

                    <form action="{{route('admin.info.update', ['info_Page'=>1])}}" method="post">
                    @csrf
                    @method('put')
                    <!-- Card Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Telefone</labe>
                                        <input class="form-control form-text phone" value="{{$info_pages->phone}}"
                                               required
                                               id="phone" name="phone"
                                               placeholder="Insira o Telefone">
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor preencha o Telefone
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">E-mail</labe>
                                        <input class="form-control form-text email" value="{{$info_pages->email}}"
                                               required
                                               id="email" name="email"
                                               placeholder="Insira o e-mail">
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor preencha o email
                                    </div>
                                    <div class="invalid-email">
                                        Insira um email valido
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Endereço</labe>
                                        <input class="form-control form-text" value="{{$info_pages->street}}" required
                                               id="street" name="street"
                                               placeholder="Insira o endereco">
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor preencha o Endereço
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Cidade</labe>
                                        <input class="form-control form-text" value="{{$info_pages->city}}" required
                                               id="city" name="city"
                                               placeholder="Insira a Cidade">
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor preencha a Cidade
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Twitter</labe>
                                        <input class="form-control form-text" value="{{$info_pages->twitter}}"
                                               id="twitter" name="twitter"
                                               placeholder="Insira o link do twitter">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Facebook</labe>
                                        <input class="form-control form-text" value="{{$info_pages->facebook}}"
                                               id="facebook" name="facebook"
                                               placeholder="Insira o link do facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Youtube</labe>
                                        <input class="form-control form-text" value="{{$info_pages->youtube}}"
                                               id="youtube" name="youtube"
                                               placeholder="Insira o link do youtube">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Instagram</labe>
                                        <input class="form-control form-text" value="{{$info_pages->instagran}}"
                                               id="instagran" name="instagran"
                                               placeholder="Insira o link do instagram">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Linkedin</labe>
                                        <input class="form-control form-text" value="{{$info_pages->linkedin}}"
                                               id="linkedin" name="linkedin"
                                               placeholder="Insira o link do linkedin">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <button class="btn btn-primary btn-salvar">Atualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @push('scripts')
        <script>
            $(function () {
                $('.email').blur(function () {
                    if (!validaEmail($(this).val())) {
                        $(this).css('border-color', 'red');
                        $('.invalid-email').show();
                    } else {
                        $('.invalid-email').hidden;
                    }
                });
                var maskBehavior = function (val) {
                        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                    },
                    options = {
                        onKeyPress: function (val, e, field, options) {
                            field.mask(maskBehavior.apply({}, arguments), options);
                        }
                    };

                $('.phone').mask(maskBehavior, options);
                $('.btn-salvar').click(function () {
                    var descrption = editor.root.innerHTML;
                    $('#description').val(descrption);
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.slice.call(forms)
                        .forEach(function (form) {
                            form.addEventListener('submit', function (event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                }

                                form.classList.add('was-validated')
                            }, false)
                        });
                });

                function validaEmail(email) {
                    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    return regex.test(email);
                }
            });
        </script>
    @endpush
    @push('styles')
        <style>
            .invalid-email {
                display: none;
                width: 100%;
                margin-top: 0.25rem;
                font-size: 80%;
                color: #e74a3b;
            }
        </style>
    @endpush
@endsection
