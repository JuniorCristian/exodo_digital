@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$page}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Staus</th>
                            <th width="100px">Ações</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                deleta();
            });

            function deleta() {
                $('.deleta').click(function () {
                    Swal.fire({
                        title: 'Tem certeza',
                        text: "que deseja excluir o produto " + $(this).data('title') + " !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar!',
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#e74a3b',
                        reverseButtons: true
                    }).then((result) => {
                        if(result.isConfirmed) {
                            $.ajax({
                                method: "POST",
                                url: $(this).data('rota'),
                                data: {
                                    _token: "{{csrf_token()}}",
                                    _method: 'delete'
                                },
                                success: function () {
                                    Swal.fire({
                                        title: 'O produto foi deletado com sucesso',
                                        icon: 'success',
                                        confirmButtonText: 'OK',
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    })
                });
            }
            var dataTables = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "initComplete": function () {
                    deleta();
                },
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
                },

                "pageLength": 100,
                fixedHeader: {
                    header: true,
                    footer: true
                },

                "ajax": {
                    url: '{{route('admin.cursos.datatable')}}',
                    dataType: 'JSON',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization');
                    },
                    data: function (d) {
                        d._token = "{{csrf_token()}}"
                    },
                },
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'status', name: 'status'},
                    {data: 'acoes', name: 'acoes'},
                ],
            });
        </script>
    @endpush
    @push('styles')
        <style>
            .preview{
                height: 50px;
            }
            .acoes {
                display: flex;
            }
            .acoes a {
                padding: 10px 15px 10px 15px;
                margin-right: 5px;
            }
            .acoes a i {
                color: white;
            }
        </style>
    @endpush
@endsection
