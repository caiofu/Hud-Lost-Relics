<?php
    class Contador
    {
        private $idContador;
        private $quantidadeGerado;
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
            $this->tabela = "contador";
        }


        public function getIdContador()
        {
            return $this->idContador;
        }


        public function setIdContador($idContador)
        {
            $this->idContador = $idContador;
        }


        public function getQuantidadeGerado()
        {
            return $this->quantidadeGerado;
        }


        public function setQuantidadeGerado($quantidadeGerado)
        {
            $this->quantidadeGerado = $quantidadeGerado;
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

            $this->crud->insert($campos = array('idContador' => $this->idContador,
                                    'quantidadeGerado'      => $this->name), $this->tabela,'','','');

            $busca     = $this->crud->select($campos = array("*"),$this->tabela,"","idContador DESC",'1');
            $resultado = $busca->fetchObject();

            // RESULTADOS
            $this->idContador  = $resultado->idContador;
            $this->quantidadeGerado       = $resultado->quantidadeGerado;


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

            @$this->idContador  = $resultado->idContador;
            @$this->quantidadeGerado       = $resultado->quantidadeGerado;
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