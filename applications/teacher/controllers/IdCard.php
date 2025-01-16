<?php


class IdCard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('IdCardModel');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['data'] = $this->IdCardModel->get();
        $this->load->view('idcards/view', $data);
    }
}