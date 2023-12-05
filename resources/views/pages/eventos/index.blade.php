<x-base-layout>
    <div class="row">
        @foreach ($eventos as $evento)
            <div class="col-sm-4 mb-6">
                <div class="card">
                    <div class="card-header align-items-center">
                        <a href="{{ route('eventos.show', ['evento' => $evento, 'abaAtiva' => 'atividades']) }}">
                            <i class="bi bi-list-task btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                        </a>
                        <a href="{{ route('eventos.show', ['evento' => $evento, 'abaAtiva' => 'participantes']) }}">
                            <i class="bi bi-people-fill btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                        </a>
                        <a href="{{ route('eventos.edit', [$evento]) }}">
                            <i
                                class="bi bi bi-pencil-square btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                        </a>
                        <form action="{{ route('eventos.destroy', [$evento]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon">
                                <i
                                    class="bi bi-trash3 btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                            </button>
                        </form>
                    </div>
                    <a href="{{ route('eventos.show', $evento) }}">
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
