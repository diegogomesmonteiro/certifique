<div class="row">
    <div class="card">
        <div class="card-body">
            <h6>{{$evento->nome}}</h6>
            <p>{{$evento->descricao}}</p>
            <p>{{$evento->data_inicio->format('d/m/Y')}} a {{$evento->data_fim->format('d/m/Y')}}</p>
        </div>
    </div>
</div>