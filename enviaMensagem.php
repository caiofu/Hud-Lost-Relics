<?php
   include "classes/Autoload.php";

    $dataHoraAtual = date('Y-m-d H:i:s');

    if(isset($_POST))
    {
        $retorno = array();
        $Mensagem = new Mensagens();

        $Mensagem->setName($_POST['name']);
        $Mensagem->setNickname($_POST['nickname']);
        $Mensagem->setMensagem($_POST['name']);
        $Mensagem->setDataMensagem($dataHoraAtual);
        $Mensagem->insert();

        if($Mensagem->getIdMensagem() != null)
        {
            array_push($retorno, ["codigo" => 1, "mensagem" => "Mensagem salva com sucesso "]);
        }
        else
        {
            array_push($retorno, ["codigo" => 2, "mensagem" => "Erro ao salvar a mensagem"]);
        }

    }
    else
    {
        array_push($retorno, ["codigo" => 3, "mensagem" => "Campos vazios"]);
    }

    echo json_encode($retorno, JSON_PRETTY_PRINT |  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
