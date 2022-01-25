<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    public function getCustomer()
    {
        return $this->db->get('customer')->result_array();
    }

    public function getType()
    {
        return $this->db->get('m_customer_type')->result_array();
    }

    public function getCustomerById($id){
        return $this->db->get_where('customer',array('id'=>$id))->row_array();
      }

    public function add()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'id_m_customer' => $this->input->post('jenis'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'longitude' => $this->input->post('longitude'),
            'latitude' => $this->input->post('latitude'),
            'status' => $this->input->post('status'),
        ];

        $this->db->insert('customer', $data);
    }

    public function edit($id){

        $data = [
            'nama' => $this->input->post('nama'),
            'id_m_customer' => $this->input->post('jenis'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'longitude' => $this->input->post('longitude'),
            'latitude' => $this->input->post('latitude'),
            'status' => $this->input->post('status'),
        ];

        $this->db->where('id', $id);
        $this->db->update('customer', $data);
    }
}
