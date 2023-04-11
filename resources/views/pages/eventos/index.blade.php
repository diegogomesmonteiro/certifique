<x-base-layout>
    <script>
        const btnAdd = document.getElementById('kt_toolbar_create_button');
        btnAdd.href = "{{route('eventos.create')}}";
        btnAdd.addEventListener('click', function(e){
            window.location.href = "{{route('eventos.create')}}";
        });
    </script>
    
    @php
        $evento = $eventos[0];
        
    @endphp
    
    <div class="row">
        @foreach($eventos as $evento)
        <div class="col-sm-4 mb-6">
          <div class="card">
            <div class="card-header">
                <a href="">
                    <i class="bi bi-file-earmark-text btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                </a>
                <a href="">
                    <i class="bi bi-display btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                </a>
                <a href="">
                    <i class="bi bi-person-workspace btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                </a>
                <a href="">
                    <i class="bi bi-octagon-fill btn btn-icon text-primary fs-1 btn-active-light btn-active-color-primary"></i>
                </a>
            </div>
            <a href="#">
                <div class="card-body">
                    <h5 class="card-title">{{$evento->nome}}</h5>
                    <p class="card-text">{{$evento->descricao}}</p>
                </div>
                <div class="card-footer text-muted">
                    {{$evento->data}}
                </div>
            </a>
          </div>
        </div>
        @endforeach
    </div>
</x-base-layout>
