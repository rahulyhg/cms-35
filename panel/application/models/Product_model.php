<?php

class Product_model extends CI_Model{

    public $tableName = 'products';

    public function __construct(){
        parent::__construct();
    }

    /* Veritaban�nda b�t�n kay�tlar� getirecek metot. */
    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function add($data = []){
        return $this->db->insert($this->tableName, $data);
    }
}