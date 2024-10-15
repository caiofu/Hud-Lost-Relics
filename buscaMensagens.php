<?php
include "classes/Autoload.php";

$Mensagens =  new Mensagens();
$Mensagens->select("*");
$retorno = array();

if($Mensagens->getIdMensagem() != null)
{
    while ($resultado = $Mensagens->getBusca()->fetch(PDO::FETCH_ASSOC))
    {
        $dataFormatada = date("Y/m/d - H:i", strtotime($resultado['dataMensagem']));

        array_push($retorno,
            [
                'idMensagem'      => $resultado['idMensagem'],
                'name'            => $resultado['name'],
                'nickname'        => $resultado['nickname'],
                'mensagem'        => $resultado['mensagem'],
                'dataMensagem'    => $dataFormatada,

            ]);

    }
}




echo json_encode($retorno, JSON_PRETTY_PRINT |  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);