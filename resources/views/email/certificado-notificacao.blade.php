@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'http://127.0.0.1:8000/meus-certificados'])
<img src="http://127.0.0.1:8000/demo1/media/logos/almenara_horizontal.jpg" class="logo" alt="IFNMG Almenara Logo">
@endcomponent
@endslot

{{-- Body --}}
<h1>Olá, {{$nome}}!</h1>
<p>O seu certificado foi disponibilizado.</p>
<p>Para acessar o certificado, clique no botão abaixo.</p>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/certificados/'.$identificador.'/download', 'color' => 'green'])
Acessar Certificado
@endcomponent
<p>Cadastre-se na plataforma <a href='http://127.0.0.1:8000/meus-certificados'>CertIFique</a> e acesse todos os seus certificados.</p>
<p>Atenciosamente,</p>
<p>Coordenação do IFNMG - Campus Almenara</p>

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent