@extends('admin.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Perfil</h1>
        <p class="mb-4"></p>
        <form action="{{route('admin.profile.update', ['user'=>$user])}}" class="needs-validation" novalidate
              method="post"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h6 class="m-0 font-weight-bold text-primary">Meu Perfil</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="name">Nome</labe>
                                        <input class="form-control form-text" value="{{$user->name}}" required
                                               id="name" name="name"
                                               placeholder="Insira o titulo do curso">
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor coloque seu nome
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="email">E-mail</labe>
                                        <input class="form-control form-text" value="{{$user->email}}" id="email"
                                               name="email"
                                               placeholder="Insira seu email">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="password">Nova Senha</labe>
                                        <input class="form-control form-text"
                                               id="new_password" name="new_password" type="password"
                                               placeholder="Insira sua nova senha">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="image">Escolha a foto de perfil</label>
                                        <input type="hidden" name="x" id="x">
                                        <input type="hidden" name="y" id="y">
                                        <input type="hidden" name="width" id="width">
                                        <input type="hidden" name="height" id="height">
                                        <input type="file" class="form-control-file" name="profile_path"
                                               id="profile_path">
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor selecione uma imagem
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group" id="photoDiv">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12" style="margin-bottom: 15px">
                                    @if(isset($user->profile_path))
                                        <img class="imageCrop img-fluid" width="200px"
                                             src="{{env('APP_URL')}}/storage/{{$user->profile_path}}" alt="">
                                    @endif
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-salvar">Salvar</button>
                                        <a href="{{route('admin.home')}}" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            $(function () {
                $('.btn-salvar').click(function () {
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
                $("#profile_path").change(function () {
                    const file = $(this)[0].files[0];
                    const fileReader = new FileReader();
                    fileReader.onloadend = function () {
                        $('#photoDiv').html("<img width='300px' src='" + fileReader.result + "' id='photo'>");
                        const image = $('#photo');

                        image.cropper({
                            aspectRatio: 1 / 1,
                            crop: function (event) {
                                $('#x').val(event.detail.x);
                                $('#y').val(event.detail.y);
                                $('#width').val(event.detail.width);
                                $('#height').val(event.detail.height);
                            }
                        });
                    }
                    fileReader.readAsDataURL(file);
                });
            });

            // Example starter JavaScript for disabling form submissions if there are invalid fields
        </script>
    @endpush
    @push('styles')
        <style>
            img {
                display: block;
                max-width: 100%; /* This rule is very important, please do not ignore this! */
            }
        </style>
    @endpush
@endsection
