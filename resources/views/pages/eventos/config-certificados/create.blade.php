<x-base-layout>
    @section('styles')
        <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
        <link rel="stylesheet" type="text/css" href="{{ @asset('assets\vendor\ckeditor5\sample\styles.css') }}">
        <style>
            .ck-content {
                background-color: transparent !important;
            }

            .ck.ck-editor {
                width: 100% !important;
            }

            .ck.ck-editor__editable_inline {
                height: calc(155mm) !important;
                width: 100%;

            }

            #divPreviewCertificado {
                width: 100%;
                height: calc(155mm);
                background-repeat: no-repeat;
                background-size: contain;
                position: relative;
                background-position: center 40px;
                background-image: url("{{ @asset('img/certificado.jpg') }}");
                background-origin: content-box;
            }
        </style>
    @endsection
    @section('titulo', 'Configuração de certificado: ' . $tipoConfigCertificado->value)
    <x-eventos.card-dados-evento :evento="$evento" />
    <div class="row mt-4">
        <div class="card mb-4 w-100">
            <div class="card-body">
                <form action="{{ route('config-certificados.store', $evento) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                    <input type="hidden" name="tipo" value="{{ $tipoConfigCertificado->value }}">
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="nome">Nome do certificado</label>
                            <input type="text" class="form-control form-control-solid" id="nome" name="nome"
                                placeholder="Nome do certificado" value="{{ old('nome') }}" required />
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="layout">Layout do certificado (tamanho: 1754x1240
                                pixels)</label>
                            <input type="file" class="form-control form-control-solid" id="arquivo_layout" name="arquivo_layout"
                                value="{{ old('arquivo_layout') }}" />
                            <span>*Caso não escolha o layout, será utilizado o layout padrão.</span>
                        </div>
                    </div>
                    @if ($tipoConfigCertificado === TipoConfigCertificadoEnum::ATIVIDADE)
                        <div class="row mb-4">
                            <div class="text-center">
                                <label class="form-label" for="atividade_id">Selecione a atividade</label>  
                                <select class="form-select form-select-solid" name="atividade_id" id="atividade_id">
                                    @foreach ($evento->atividades as $atividade)
                                    <option disabled>Escolha a opção</option>
                                        <option value="{{ $atividade->id }}">{{ $atividade->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="row mb-4">
                        <div class="text-center">
                            <p class="form-label" for="nome">Utilize essas TAGs para adicionar partes
                                textuais dinâmicas</p>
                            <div class="p-2 bg-gray-300 align-items-center">
                                @foreach ($tipoConfigCertificado->getTags() as $tag)
                                    <span class="badge badge-light-success">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="centered">
                        <div class="row row-editor">
                            <div id="divPreviewCertificado">
                                <textarea name="texto" id="previewCertificado" hidden></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}">Cancelar</a>
                        <button type="submit" class="btn btn-sm btn-primary ms-2">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{ @asset('assets\vendor\ckeditor5\build\ckeditor.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                arquivo_layout.addEventListener("change", handleFiles, false);

                function handleFiles() {
                    const background = this.files[0];
                    var img = new Image;
                    img.src = URL.createObjectURL(background);
                    img.onload = function() {
                        image = img
                        atualizarPreviewCertificado()
                    }
                }
            });

            var image = null;

            function atualizarPreviewCertificado() {
                divPreviewCertificado.style.backgroundImage = 'url(' + image.src + ')'
            }

            let editor = null

            ClassicEditor
                .create(document.querySelector('#previewCertificado'), {
                    fontSize: {
                        options: [
                            9,
                            11,
                            13,
                            'default',
                            17,
                            19,
                            21,
                            22,
                            25,
                            28,
                            32,
                            35
                        ],
                        supportAllValues: true
                    },
                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },
                    alignment: {
                        options: ['left', 'right', 'center', 'justify']
                    },
                    toolbar: [
                        'bold',
                        'italic',
                        'underline',
                        'fontSize',
                        'fontFamily',
                        '|',
                        'bulletedList',
                        'numberedList',
                        'alignment',
                        '|',
                        'link', 'sourceEditing'
                    ],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    },
                    mention: {
                        feeds: [{
                            marker: '[',
                            feed: [
                                @foreach ($tipoConfigCertificado->getTags() as $tag)
                                    '{{ $tag }}',
                                @endforeach
                            ],
                            minimumCharacters: 0
                        }]
                    }
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(handleSampleError);

            function handleSampleError(error) {
                const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

                const message = [
                    'Oops, something went wrong!',
                    `Please, report the following error on ${ issueUrl } with the build id "s7081xocibzi-jtyswfifdf36" and the error stack trace:`
                ].join('\n');

                console.error(message);
                console.error(error);
            }
        </script>
    @endsection
</x-base-layout>
