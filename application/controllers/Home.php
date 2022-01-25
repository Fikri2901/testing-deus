<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('CustomerModel');
    }

	public function index()
	{
        $data['customer'] = $this->CustomerModel->getCustomer();

        $this->load->view('template/header');
		$this->load->view('home',$data);
        $this->load->view('template/footer');
	}

    public function add()
    {
        $data['type'] = $this->CustomerModel->getType();
        $this->load->view('template/header');
		$this->load->view('view_add', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['customer'] = $this->CustomerModel->getCustomerById($id);

        $this->load->view('template/header');
		$this->load->view('view_edit', $data);
        $this->load->view('template/footer');
    }

    public function addCustomer()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', array('required'));
        $this->form_validation->set_rules('jenis', 'Jenis', array('required'));
        $this->form_validation->set_rules('alamat', 'Alamat', array('required'));
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', array('required'));
        $this->form_validation->set_rules('longitude', 'Longitude', array('required'));
        $this->form_validation->set_rules('latitude', 'latitude', array('required'));
        $this->form_validation->set_rules('status', 'Status', array('required'));

      if ($this->form_validation->run() == FALSE) {
        $data['type'] = $this->CustomerModel->getType();

        $this->load->view('template/header');
		$this->load->view('view_add', $data);
        $this->load->view('template/footer');
      } else {
        # code...
        $this->CustomerModel->add();
        redirect('/','refresh');
      }
    }
}
