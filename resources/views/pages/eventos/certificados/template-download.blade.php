<html>

<head>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }

        .content {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            left: 0;
            z-index: 9999;
        }

        p {
            padding-top: 10px;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }

        #container {
            width: 297mm;
            height: 210mm;
        }

        .verificador {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    <div id="container">
        <img src="{{ $imagem }}" height="100%" width="100%" />
        <div class="content">
            <?php
            $data = str_replace('&', '&amp;', $texto);
            echo html_entity_decode($data);
            ?>
        </div>
        <div class="verificador">
            <font size="2"><a style="text-decoration: none; color: #1b1e21"
                    href="https://eventos.ifnmg.edu.br/validar_certificado/{{ $autenticacao }}">https://eventos.ifnmg.edu.br/validar_certificado/{{ $autenticacao }}</a>
            </font>
        </div>
    </div>
</body>

</html>
