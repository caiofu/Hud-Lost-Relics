<?php

class Mensagens
{
    private $idMensagem;
    private $name;
    private $nickname;
    private $mensagem;
    private $dataMensagem;
    private $busca;
    private $qtdRegistros;
    private $campos;
    private $where;
    private $order;
    private $limite;

    #### METODO CONSTRUTOR ####
    public function __construct()
    {
        $this->config = new Config();
        $this->crud   = new Crud();
        $this->tabela = "mensagens";
    }


    public function getIdMensagem()
    {
        return $this->idMensagem;
    }


    public function setIdMensagem($idMensagem)
    {
        $this->idMensagem = $idMensagem;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getNickname()
    {
        return $this->nickname;
    }


    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }


    public function getMensagem()
    {
        return $this->mensagem;
    }


    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }


    public function getDataMensagem()
    {
        return $this->dataMensagem;
    }


    public function setDataMensagem($dataMensagem)
    {
        $this->dataMensagem = $dataMensagem;
    }


    public function getBusca()
    {
        return $this->busca;
    }


    public function setBusca($busca)
    {
        $this->busca = $busca;
    }

    public function getQtdRegistros()
    {
        return $this->qtdRegistros;
    }


    public function setQtdRegistros($qtdRegistros)
    {
        $this->qtdRegistros = $qtdRegistros;
    }


    public function insert()
    {

        $this->crud->insert($campos = array('idMensagem' => $this->idMensagem,
            'name'      => $this->name,
            'nickname'      => $this->nickname,
            'mensagem'  => $this->mensagem,
            'dataMensagem' => $this->dataMensagem), $this->tabela,'','','');

        $busca     = $this->crud->select($campos = array("*"),$this->tabela,"","idMensagem DESC",'1');
        $resultado = $busca->fetchObject();

        // RESULTADOS
        $this->idMensagem    = $resultado->idMensagem;
        $this->name        = $resultado->name;
        $this->mensagem         = $resultado->mensagem;
        $this->dataMensagem     = $resultado->dataMensagem;

    }

    #### SELECT ####

    public function select($campos,$where=null,$order=null,$limite=null,$group=null) {

        $this->campos = $campos;
        $this->where  = $where;
        $this->order  = $order;
        $this->limite = $limite;
        $this->group  = $group;

        $busca     = $this->crud->select($campos = array($this->campos),$this->tabela,$this->where,$this->order,$this->limite,$this->group);
        $resultado = $busca->fetchObject();

        $busca_todos = $this->crud->select($campos = array($this->campos),$this->tabela,$this->where,$this->order,$this->limite,$this->group);
        $this->busca = $busca_todos;


        // RESULTADOS
        @$this->idMensagem    = $resultado->idMensagem;
        @$this->name        = $resultado->name;
        @$this->mensagem         = $resultado->mensagem;
        @$this->dataMensagem     = $resultado->dataMensagem;
    }

    #### UPDATE ####

    public function update(array $campos,$where=null){
        $this->where  = $where;
        $this->campos = $campos;
        $this->crud->update($this->campos,$this->tabela,$this->where);
    }

    #### DELETE ####

    public function delete($where=null){
        $this->where = $where;
        $this->crud->deleta($this->tabela, $this->where);
    }

    #### QUANTIDADE DE REGISTROS ####

    public function contaRegistros($where=null) {
        $this->where        = $where;
        $busca              = $this->crud->select($campos = array("count(*) AS qtdRegistros"),$this->tabela,$this->where,"","");
        $resultado          = $busca->fetchObject();
        $this->qtdRegistros = $resultado->qtdRegistros;
    }


}