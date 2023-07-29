<x-base-layout>
    <x-eventos.card-dados-evento :evento="$evento"/>
    <x-eventos.card-nav-tabs :atividades="$evento->atividades"/>
    <x-eventos.modal-cadastrar-atividade :evento="$evento"/>
    <x-eventos.modal-alterar-atividade :evento="$evento"/>
</x-base-layout>