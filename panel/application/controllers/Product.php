<?php

class Product extends CI_Controller
{

    public $viewFolder = '';

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = 'product_v';

        $this->load->model('product_model');
    }

    public function index()
    {
        $viewData = new stdClass();

        /** Tablodan verilerin getirilmesi.. */
        $items = $this->product_model->getAll();

        /** View'e gönderilecek değişkenlerin Set edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => '<b>{field}</b> alanı doldurulmalıdır'
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $insert = $this->product_model->add(
                array(
                    "title" => $this->input->post('title'),
                    "description" => $this->input->post('description'),
                    "url" => createSlug($this->input->post('title')),
                    "rank" => 0,
                    "isActive" => 1,
                    "createdAt" => date('Y-m-d H:i:s')

                )
            );
            // TODO Alert Sistemi eklenecek
            if ($insert) {
                redirect(base_url('product'));
            } else {
                redirect(base_url('product'));
            }

        } else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->formError = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update($id)
    {

        $viewData = new stdClass();

        /** Tablodan verilerin getirilmesi */

        $item = $this->product_model->get(
            array(
                "id" => $id
            )
        );


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


}