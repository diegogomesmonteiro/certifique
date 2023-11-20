<x-base-layout>
    @section('titulo', $evento->nome)
    <x-eventos.card-dados-evento :evento="$evento" />
    <x-eventos.card-nav-tabs :ativo="$abaAtiva" :evento="$evento" />
    <x-eventos.modal-cadastrar-atividade :evento="$evento" />
    @if ($evento->atividades->isNotEmpty())
        <x-eventos.modal-editar-atividade :evento="$evento" />
        <x-eventos.modal-cadastrar-participante :evento="$evento" />
        <x-eventos.modal-importar-participantes :evento="$evento" />
        <x-eventos.modal-editar-participante />
        <x-eventos.modal-publicar-certificados />
    @endif
</x-base-layout>
