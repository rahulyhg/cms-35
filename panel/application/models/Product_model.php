<?php

class Product_model extends CI_Model{

    public $tableName = 'products';

    public function __construct(){
        parent::__construct();
    }

    public function get($where = []){
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /* Veritabanýnda bütün kayýtlarý getirecek metot. */
    public function getAll($where = []){
        return $this->db->where($where)->get($this->tableName)->result();
    }

    public function add($data = []){
        return $this->db->insert($this->tableName, $data);
    }

}