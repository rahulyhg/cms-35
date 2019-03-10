<?php

class Product_model extends CI_Model{

    public $tableName = 'products';

    public function __construct(){
        parent::__construct();
    }

    /* Veritabanýnda bütün kayýtlarý getirecek metot. */
    public function getAll(){
        return $this->db->get($this->tableName)->result();
    }

    public function add($data = []){
        return $this->db->insert($this->tableName, $data);
    }
}