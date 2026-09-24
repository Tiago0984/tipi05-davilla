<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>API - Confeitaria DaVilla</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f3ef;
            color: #3b2a22;
        }

        header {
            background: #5c3a2e;
            color: #fff;
            padding: 32px 16px;
            text-align: center;
        }

        header h1 { margin: 0 0 8px; }

        main {
            max-width: 900px;
            margin: 0 auto;
            padding: 24px 16px;
        }

        .endpoint {
            background: #fff;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
        }

        .metodo {
            display: inline-block;
            background: #2e7d32;
            color: #fff;
            font-weight: bold;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 4px;
            margin-right: 8px;
        }

        code {
            font-family: Consolas, monospace;
            word-break: break-all;
        }

        pre {
            background: #2b2b2b;
            color: #f1f1f1;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <header>
        <h1>API - Confeitaria DaVilla</h1>

        <p>
            Documentação da API utilizada pelo aplicativo.
        </p>
    </header>

    <main>
        <p>
            URL base: <code>{{ url('/api/v1') }}</code>
        </p>

        <p>Todas as respostas seguem o formato:</p>

<pre>{
    "success": true,
    "data": ...
}</pre>

        <div class="endpoint">
            <span class="metodo">GET</span><code>/api/v1/status</code>
            <p>Verifica se a API está online.</p>
        </div>

        <div class="endpoint">
            <span class="metodo">GET</span><code>/api/v1/banners</code>
            <p>Lista os banners ativos, ordenados por <code>ordem_banner</code>.</p>
        </div>

        <div class="endpoint">
            <span class="metodo">GET</span><code>/api/v1/categorias</code>
            <p>Lista as categorias ativas, ordenadas por <code>ordem_categoria</code>.</p>
        </div>

        <div class="endpoint">
            <span class="metodo">GET</span><code>/api/v1/categorias/{id}/produtos</code>
            <p>Lista os produtos ativos de uma categoria. Retorna 404 se a categoria não existir.</p>
        </div>

        <div class="endpoint">
            <span class="metodo">GET</span><code>/api/v1/produtos</code>
            <p>Lista os produtos ativos com a categoria de cada um.</p>
        </div>

        <div class="endpoint">
            <span class="metodo">GET</span><code>/api/v1/produtos/{slug}</code>
            <p>Retorna um produto pelo slug. Retorna 404 se o produto não existir.</p>
        </div>
    </main>

</body>

</html>
