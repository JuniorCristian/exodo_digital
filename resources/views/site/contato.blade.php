<div id="contato" class="contact wow banner color2">
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 m-auto">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h2>Entre em contato conosco</h2>
                    </div>
                    <div class="contact-form ">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <p>Seu nome</p>
                                <input type="text" class="form-control" id="name" required="required" data-validation-required-message="Por favor, coloque seu nome" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <p>E-mail</p>
                                <input type="email" class="form-control" id="email"  required="required" data-validation-required-message="Precisa do e-mail" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <p>Assunto</p>
                                <input type="text" class="form-control" id="subject"  required="required" data-validation-required-message="Coloque algum assunto" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <p>Sua mensagem</p>
                                <textarea class="form-control" id="message"  required="required" data-validation-required-message="Insira uma mensagem"></textarea>
                                <p class="help-block"></p>
                            </div>
                            <div>
                                <button class="btn" type="button" id="sendMessageButton">Enviar mensagem</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#sendMessageButton').click(function (e){
            e.preventDefault();
            $.ajax({
                url:'{{route('contatoMail')}}',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    nome: $('#name').val(),
                    email: $('#email').val(),
                    assunto: $('#subject').val(),
                    mensagem: $('#message').val(),
                },
                success: function (){
                    Swal.fire({
                        title: 'Sucesso',
                        text: "E-mail enviado com sucesso, aguarde que entraremos em contatos com você assim que possivel!",
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#8A142D'
                    });
                }
            });
        });
    </script>
@endpush
