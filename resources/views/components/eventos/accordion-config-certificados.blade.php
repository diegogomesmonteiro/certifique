@foreach ($configCertificados as $configCertificado)
    <div class="row">
        <!--begin::Accordion-->
        <div class="accordion" id="kt_accordion_1">
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_{{ $configCertificado->id }}">
                    <button class="accordion-button fs-6 fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_{{ $configCertificado->id }}" aria-expanded="false"
                        aria-controls="kt_accordion_1_body_{{ $configCertificado->id }}">
                        {{ $configCertificado->nome }}
                    </button>
                </h2>
                <div id="kt_accordion_1_body_{{ $configCertificado->id }}" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_{{ $configCertificado->id }}"
                    data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        @if ($configCertificado->certificados->isEmpty())
                            <p>Nenhum certificado gerado para esta configuração.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead>
                                        <tr class="fw-bold">
                                            <th>Nome</th>
                                            <th>Gerado em</th>
                                            <th>Gerado por</th>
                                            <th>Publicado</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($configCertificado->certificados as $certificado)
                                            <tr>
                                                <td>{{ $certificado->participante->nome }}</td>
                                                <td>{{ $certificado->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $certificado->geradoPor->first_name }}</td>
                                                <td>
                                                    <label
                                                        class="justify-content-center form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-30px h-20px" type="checkbox"
                                                            value="{{ $certificado->id }}"
                                                            {{ $certificado->publicado ? 'checked' : '' }}
                                                            name="certificado_id" />
                                                    </label>
                                                </td>
                                                <td class="d-flex gap-2 justify-content-center">
                                                    <a id="download"
                                                        target="_blank"
                                                        href="{{ route('certificados.download', ['certificado' => $certificado]) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('certificados.destroy', ['certificado' => $certificado]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash3-fill danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Accordion-->
        </div>
    </div>
@endforeach
<script>
    $(document).ready(function() {
        $('input[name="certificado_id"]').change(function() {
            const id = $(this).val();
            $.ajax({
                url: "{{ route('certificados.alterar-publicacao') }}",
                method: "PATCH",
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function(data) {
                    if (data.success) {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        });
    });
</script>
