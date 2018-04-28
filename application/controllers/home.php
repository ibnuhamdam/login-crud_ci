<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('web');
	}

	public function index()
	{
        if ($this->session->userdata('level')!="Admin") {
            redirect('Akun_C/index');
        }
        //4.ketika session tidak ada maka redirect ke Akun_C/index
		$data = array(
			'title' => 'Data Mahasiswa',
			'mahasiswa' => $this->web->get_data()
		);
		$this->load->view('home',$data);
	}

	public function add()
	{
		$data = $this->input->post(null,TRUE);
		$insert = $this->web->save_data($data);
        if($insert){
            $this->session->set_flashdata('alert', 'sukses_insert');
            redirect('home/index');
        }else{
            echo "<script>alert('Gagal Menambahkan Data');</script>";
        }

	}

    public function edit()
    {
        $data = $this->input->post(null,TRUE);
        $edit = $this->web->edit_data($data);
        if($edit){
            $this->session->set_flashdata('alert', 'sukses_edit');
            redirect('home/index');
        }else{
            echo "<script>alert('Gagal Edit Data');</script>";

        }
    }

    public function hapus()
    {
        $nim = $this->input->post('nim');
        $hapus = $this->web->delete_data($nim);
        if($hapus){
            $this->session->set_flashdata('alert', 'sukses_hapus');
            redirect('home/index');
        }else{
            echo "<script>alert('Gagal Hapus Data');</script>";

        }
    }
}
