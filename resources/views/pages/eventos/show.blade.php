<x-base-layout>
    @section('titulo', $evento->nome)
    <x-eventos.card-dados-evento :evento="$evento" />
    <x-eventos.card-nav-tabs ativo="atividades" :atividades="$evento->atividades" />
    <x-eventos.modal-cadastrar-atividade :evento="$evento" />
    <x-eventos.modal-editar-atividade :evento="$evento" />
    <x-eventos.modal-cadastrar-participante :evento="$evento" />
    <x-eventos.modal-importar-participantes :evento="$evento" />
    <x-eventos.modal-editar-participante />
</x-base-layout>