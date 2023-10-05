<x-base-layout>
    @section('titulo', 'Configuração de certificado: Geral')
    <x-eventos.card-dados-evento :evento="$evento" />
    <div class="row mt-4">
        <div class="card mb-4 w-100">
            <div class="card-body">
                <form action="{{ route('atividades.store', $evento) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="nome">Nome do certificado</label>
                            <input type="text" class="form-control form-control-solid" id="nome" name="nome"
                                placeholder="Nome do certificado" value="{{ old('nome') }}" required />
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="nome">Imagem de fundo</label>
                            <input type="file" class="form-control form-control-solid" id="imagem" name="imagem"
                                placeholder="" value="{{ old('imagem') }}" />
                            <span>*Caso não escolha a imagem de fundo, será utilizada a imagem padrão do
                                sistema.</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="text-center">
                            <p class="form-label" for="nome">Utilize essas TAGs para adicionar partes
                                textuais dinâmicas</p>
                            <div class="p-2 bg-gray-300 align-items-center">
                                <span class="badge badge-light-success">[participante.nome]</span>
                                <span class="badge badge-light-success">[evento.nome]</span>
                                <span class="badge badge-light-success">[evento.inicio]</span>
                                <span class="badge badge-light-success">[evento.fim]</span>
                                <span class="badge badge-light-success">[evento.carga_horaria]</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="nome">Nome do certificado</label>
                            <input type="text" class="form-control form-control-solid" id="nome" name="nome"
                                placeholder="Nome do certificado" value="{{ old('nome') }}" required />
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="nome">Imagem de fundo</label>
                            <input type="file" class="form-control form-control-solid" id="imagem" name="imagem"
                                placeholder="" value="{{ old('imagem') }}" />
                            <span>*Caso não escolha a imagem de fundo, será utilizada a imagem padrão do
                                sistema.</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}">Cancelar</a>
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
            </div>
        </div>


        {{-- <div class="mb-3">
                                <select class="form-select" name="atividade_tipo_id" id="atividade_tipo_id" required>
                                    <option selected disabled>Selecione o tipo</option>  
                                    @foreach ($atividadeTipos as $tipo)
                                    <option value={{ $tipo->id }}>{{ $tipo->nome }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
        {{-- <div class="mb-3">
                                <input type="number" step="1"  min="0" class="form-control"
                                    id="carga_horaria" name="carga_horaria" 
                                    placeholder="Carga horária em horas" required>
                            </div>
                            <div class="row justify-content-around text-center">
                                <div class="mb-3 col-4">
                                    <label class="form-label" for="data_inicio">Início</label>
                                    <input type="date" class="form-control"
                                        id="data_inicio" name="data_inicio" 
                                        min="{{$evento->data_inicio->format('Y-m-d')}}"
                                        max="{{$evento->data_fim->format('Y-m-d')}}" required/>
                                </div>
                                <div class="mb-3 col-4">
                                    <label class="form-label" for="data_fim">Término</label>
                                    <input type="date" class="form-control"
                                        id="data_fim" name="data_fim" 
                                        min="{{$evento->data_inicio->format('Y-m-d')}}"
                                        max="{{$evento->data_fim->format('Y-m-d')}}" required/>
                                </div>
                            </div> --}}
    </div>
</x-base-layout>
