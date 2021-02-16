@extends('admin.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1>
        <p class="mb-4"></p>
        <form action="{{route($route, ['cursos'=>@$cursos->id_curso])}}" class="needs-validation" novalidate method="post"
              enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h6 class="m-0 font-weight-bold text-primary">{{$page}}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="title">Título</labe>
                                        <input class="form-control form-text" value="{{@$cursos->title}}" required
                                               id="title" name="title"
                                               placeholder="Insira o titulo do curso">
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor preencha o título
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="link">Link externo</labe>
                                        <input class="form-control form-text" value="{{@$cursos->link}}" id="link"
                                               name="link"
                                               placeholder="Insira o link do curso">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <labe for="description">Descrição</labe>
                                        <textarea name="description" class="form-control form-text" id="description" rows="10" placeholder="Insira a descrição do curso" required>{{@$cursos->description}}</textarea>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor preencha a descrição
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <labe for="status">Status</labe>
                                        <select class="form-control form-text" id="status" required name="status">
                                            <option {{!isset($cursos->status)?"selected":(@($cursos->status)?'selected ':'')}} value="1">Ativo
                                            </option>
                                            <option {{isset($cursos->status)?(@(!$cursos->status)?'selected ':''):''}} value="0">Inativo
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="image">Escolha a foto do curso</label>
                                        <input type="hidden" name="x" id="x">
                                        <input type="hidden" name="y" id="y">
                                        <input type="hidden" name="width" id="width">
                                        <input type="hidden" name="height" id="height">
                                        <input type="file" class="form-control-file" {{isset($cursos->image)?'':'required '}}name="imagem" id="image">
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor selecione uma imagem
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group" id="photoDiv">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12" style="margin-bottom: 15px">
                                    @if(isset($cursos->image))
                                        <img class="imageCrop img-fluid" width="146px" src="{{env('APP_URL')}}/storage/{{@$cursos->image}}" alt="">
                                    @endif
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-salvar">Salvar</button>
                                        <a href="{{route('admin.cursos.index')}}" class="btn btn-danger">Cancelar</a>
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
                $("#image").change(function () {
                    const file = $(this)[0].files[0];
                    const fileReader = new FileReader();
                    fileReader.onloadend = function () {
                        $('#photoDiv').html("<img width='100%' src='" + fileReader.result + "' id='photo'>");
                        const image = $('#photo');

                        image.cropper({
                            crop: function (event) {
                                $('#x').val(event.detail.x);
                                $('#y').val(event.detail.y);
                                $('#width').val(event.detail.width);
                                $('#height').val(event.detail.height);
                            },
                            zoomable:false
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
            .ql-toolbar {
                border-top-right-radius: 0.35rem;
                border-top-left-radius: 0.35rem;
            }

            .ql-container {
                border-bottom-right-radius: 0.35rem;
                border-bottom-left-radius: 0.35rem;
                min-height: 150px !important;
                font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #6e707e;
                text-align: left;
            }

            img {
                display: block;
                max-width: 100%; /* This rule is very important, please do not ignore this! */
            }
        </style>
    @endpush
@endsection
