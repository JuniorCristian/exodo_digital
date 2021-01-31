@component('mail::message')
    <p><b style="color:#8A142D">Nome:</b> {{$contato->nome}}</p>
    <p><b style="color:#8A142D">Email:</b> {{$contato->email}}</p>
    <p><b style="color:#8A142D">Assunto:</b> {{$contato->assunto}}</p>
    <p><b style="color:#8A142D">Mensagem:</b> </p>
    <p>{{$contato->mensagem}}</p>
@endcomponent
