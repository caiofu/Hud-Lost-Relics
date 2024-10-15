<?php
// Nome do arquivo ZIP que será gerado
$nome_zip = "arquivos.zip";

// Cria um novo arquivo ZIP
$zip = new ZipArchive();
if ($zip->open($nome_zip, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
    // Adiciona a página HTML gerada
    $conteudo_html = '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Gerada</title>
    </head>
    <body>
        <h1>Bem-vindo à sua página gerada!</h1>
        <p>Esta é uma página HTML gerada dinamicamente.</p>
    </body>
    </html>
    ';
    
    // Adiciona o arquivo HTML gerado
    $zip->addFromString('pagina_gerada.html', $conteudo_html);

    // Adiciona o arquivo HTML já pronto (substitua pelo caminho correto)
    if (!$zip->addFile(__DIR__ . '/req.php', 'req.php')) {
        echo "Erro ao adicionar o arquivo req.php ao ZIP.";
    }
    // Fecha o arquivo ZIP
    $zip->close();

    // Define os cabeçalhos para download do arquivo ZIP
    
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $nome_zip . '"');
    header('Content-Length: ' . filesize($nome_zip)); 
    // Lê o arquivo ZIP para download
    readfile($nome_zip);

    // Remove o arquivo ZIP após o download (opcional)
    unlink($nome_zip);
} else {
    echo 'Não foi possível criar o arquivo ZIP.';
}
?>
