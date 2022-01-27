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
        $data['type'] = $this->CustomerModel->getType();
        $this->load->view('template/header');
		$this->load->view('home',$data);
        $this->load->view('template/footer');
	}

    public function show($id)
    {
        $data['customer'] = $this->CustomerModel->getCustomerById($id);
        $data['namatype'] = $this->CustomerModel->getJenisById($data['customer']['id_m_customer']);
        $this->load->view('template/header');
		$this->load->view('view_show', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['customer'] = $this->CustomerModel->getCustomerById($id);
        $data['namatype'] = $this->CustomerModel->getJenisById($data['customer']['id_m_customer']);
        $data['type'] = $this->CustomerModel->getType();

        $this->load->view('template/header');
		$this->load->view('view_edit', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data['customer'] = $this->CustomerModel->getCustomerById($id);
        $data['namatype'] = $this->CustomerModel->getJenisById($data['customer']['id_m_customer']);

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
		$this->load->view('view_edit',$data);
        $this->load->view('template/footer');
    } else {
        $this->session->set_flashdata('sukses', $data['customer']['nama'].' berhasil diupdate !!');
        $this->CustomerModel->edit($id);
        redirect('/','refresh');
      }

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
        $data['customer'] = $this->CustomerModel->getCustomer();
        $data['type'] = $this->CustomerModel->getType();
        $this->load->view('template/header');
		$this->load->view('home', $data);
        $this->load->view('template/footer');
    } else {
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan !!');
        $this->CustomerModel->add();
        redirect('/','refresh');
      }
    }

    public function delete($id)
    {
        $this->CustomerModel->delete($id);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus !!');
        redirect('/','refresh');
    }
}
