<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        #noticias-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 20px auto;
        }

        .noticia {
            width: 300px;
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .noticia:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 10px;
        }

        .categoria {
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Últimas Notícias</h1>

    <div id="noticias-container"></div>

    <script>
        // Use JavaScript para fazer uma solicitação AJAX para obter as notícias
        const noticiasContainer = document.getElementById('noticias-container');

        // Função para obter e exibir notícias
        function carregarNoticias() {
            // Limpar o conteúdo anterior
            noticiasContainer.innerHTML = '';

            // Fazer solicitação AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const noticias = JSON.parse(xhr.responseText);
                        exibirNoticias(noticias);
                    } else {
                        console.error('Erro ao carregar notícias:', xhr.status);
                    }
                }
            };
            xhr.open('GET', './PHP/noticias.php');
            xhr.send();
        }

        // Função para exibir notícias na página
        function exibirNoticias(noticias) {
            noticias.forEach(noticia => {
                const noticiaDiv = document.createElement('div');
                noticiaDiv.innerHTML = `
                    <h2>${noticia.titulo}</h2>
                    <p>Autor: ${noticia.autor}</p>
                    <p>Categoria: ${noticia.categoria}</p>
                    <p>Descrição: ${noticia.descricao}</p>
                    <p>Texto: ${noticia.texto}</p>
                `;
                noticiasContainer.appendChild(noticiaDiv);
            });
        }

        // Carregar notícias ao carregar a página
        carregarNoticias();
    </script>
</body>
</html>
