<x-base-layout>
    <div class="row">
        @foreach ($eventos as $evento)
            <div class="col-sm-4 mb-6">
                <div class="card">
                    <a href="{{ route('meus-certificados.show', $evento) }}">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $evento->nome }}</h5>
                            <p class="card-text">{{ $evento->descricao }}</p>
                        </div>
                        <div class="card-footer text-muted text-center">
                            {{ $evento->data_inicio->format('d/m/Y') }} a {{ $evento->data_fim->format('d/m/Y') }}
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-base-layout>
