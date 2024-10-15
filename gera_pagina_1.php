<?php

$conteudo_pagina = '';
$conteudo_js = '';
$conteudo_css = '';
$skillsAtivasHtml = '';
$skilAtivasJS = '';
$levelAtivo = '';
$bodyBackground = '';
if(isset($_POST))
{
    if($_POST['swtLevel'] == 'on')
    {
       
        $skillsAtivasHtml .= ' <label for="">LEVEL PROGRESS </label>
                <br>
                <span id="player" class="player"></span>
                <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-info" id="level" style="width: 25%"></div>
                </div>
                <hr style=" border: 2px solid #0dcaf0;">';

        $levelAtivo .= "  document.getElementById('level').style.width = CalculaPorcentagem(resposta.PlayerLevelProgress, resposta.PlayerLevelMax) + '%';
      document.getElementById('player').innerHTML = ''+ resposta.PlayerName+' '+  (resposta.PlayerLevelMax - resposta.PlayerLevelProgress)+ ' xp To level '+ (resposta.PlayerLevel+1);";
    }

    if($_POST['swtFishing'] == 'on')
    {
        $skillsAtivasHtml .= '<label for="">FISHING <span id="xpFishing"></span></label>
                <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-warning" id="fishing" style="width: 25%"></div>
                </div>';
        $skilAtivasJS .= "case 'Fishing':
            document.getElementById('fishing').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpFishing').innerHTML = ' - ' +  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;";        
    }

    if($_POST['swtMining'] == 'on')
    {
       $skillsAtivasHtml .= ' <label for="">MINING <span id="xpMining"></span></label>
                <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-warning" id="mining" style="width: 25%"></div>
                </div>';

        $skilAtivasJS .= "case 'Mining':
            document.getElementById('mining').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpMining').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;";
    }

    if($_POST['swtScavenging'] == 'on')
    {
        $skillsAtivasHtml .= ' <label for="">SCAVENGING <span id="xpScavenging"></span></label>
                <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-warning" id="scavenging" style="width: 25%"></div>
                </div>';
        $skilAtivasJS .= " case 'Scavenging':
            document.getElementById('scavenging').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpScavenging').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress )+'xp to Level '+(skil.Level +1)
            break;";        
    }


    if($_POST['swtWoodCutting'] == 'on')
    {
       $skillsAtivasHtml .= '<label for="">WOODCUTTING <span id="xpWoodcutting"></span></label>
                <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-warning" id="woodcutting" style="width: 25%"></div>
                </div>';
        $skilAtivasJS .= " case 'Woodcutting':
            document.getElementById('woodcutting').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpWoodcutting').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;";        
    }

    if($_POST['swtAlchemy'] == 'on')
    {
        $skillsAtivasHtml .= '<label for="">ALCHEMY <span id="xpAlchemy"></span></label>
                <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-warning" id="alchemy" style="width: 25%"></div>
                </div>';
        $skilAtivasJS .= " case 'Alchemy':
            document.getElementById('alchemy').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpAlchemy').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;"; 
    }

    if($_POST['swtCooking'] == 'on')
    {
        $skillsAtivasHtml .= '<label for="">COOKING <span id="xpCooking"></span></label>
        <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" id="cooking" style="width: 25%"></div>
        </div>';

        $skilAtivasJS .= " case 'Cooking':
            document.getElementById('cooking').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpCooking').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;"; 
    }

    if($_POST['swtEngineering'] == 'on')
    {
        $skillsAtivasHtml .= '<label for="">ENGINEERING <span id="xpEngineering"></span></label>
        <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" id="engineering" style="width: 25%"></div>
        </div>';
        
        $skilAtivasJS .= " case 'Engineering':
            document.getElementById('engineering').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpEngineering').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;"; 
    }

    if($_POST['swtForging'] == 'on')
    {
        $skillsAtivasHtml .= '<label for="">FORGING <span id="xpForging"></span></label>
        <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" id="forging" style="width: 25%"></div>
        </div>';
        
        $skilAtivasJS .= " case 'Forging':
            document.getElementById('forging').style.width = CalculaPorcentagem(skil.LevelProgress, skil.LevelProgressMax) + '%';
            document.getElementById('xpForging').innerHTML = ' - '+  (skil.LevelProgressMax - skil.LevelProgress) +'xp to Level '+(skil.Level +1)
            break;"; 
    }

    if($_POST['radioTipo'] == 'twitch')
    {
       $bodyBackground = 'style= "background-color: rgba(0, 0, 0, 0)"';
    }
    else if($_POST['radioTipo'] == 'navegador')
    {
        $bodyBackground = 'style= "background-color: #424242"';
    }

}

$conteudo_pagina ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progresso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <body '.$bodyBackground.'>


    <div class="container">
        <div class="row">
            <div class="col-6 div-conteudo">
           '.$skillsAtivasHtml.'

               
            </div>
        </div>
    </div>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>';

$conteudo_js =  "
setInterval(DadosLost, 2000);
function DadosLost() {
 
  let resposta = '';
  var xhr = new XMLHttpRequest();
  xhr.withCredentials = true;

  xhr.addEventListener('readystatechange', function () {
    if (this.readyState === 4) {

      resposta = JSON.parse(this.responseText);
      ".$levelAtivo."
      //SKILLS
      resposta.Skills.forEach(skil => {
        switch (skil.Type) {
        ".$skilAtivasJS."

          default:
            break;
        }
      });
    }
  });

  xhr.open('GET', 'req.php');

  xhr.send();


}

function CalculaPorcentagem(numeroAtual, numeroTotal) {
  var porcentagem = (numeroAtual / numeroTotal) * 100
  return porcentagem.toFixed(1);
}"; 

$conteudo_css = '.div-conteudo label
{
    color: white;
    font-weight: bold;
    font-style: italic;
    font-size: 18px;
}

.div-conteudo span
{
    color:#ffc107;
    font-weight: bold;
    font-style: italic;
    font-size: 18px;

}

.player
{
    color:#0dcaf0 !important; 
    font-weight: bold;
    font-style: italic;
    font-size: 18px;
}';


//GERANDO O ZIP
// Nome do arquivo ZIP que será gerado
$nome_zip = "arquivos.zip";

// Cria um novo arquivo ZIP
$zip = new ZipArchive();
if ($zip->open($nome_zip, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

    // Adiciona o arquivo HTML gerado
    $zip->addFromString('lostRelics/index.html', $conteudo_pagina);

    //Adicionar o JS
    $zip->addFromString('lostRelics/index.js', $conteudo_js);

    //Adicionar o CSS
    $zip->addFromString('lostRelics/index.css', $conteudo_css);
    // Adiciona o arquivo HTML já pronto (substitua pelo caminho correto)
    if (!$zip->addFile(__DIR__ . '/req.php', 'lostRelics/req.php')) {
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