<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karakter extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('karakter_model');
        
    }
    
    public function index()
    {
        $data['karakter'] = $this->karakter_model->getKarakter();
        $this->load->view('view_karakter',$data);
        
    }

   public function create(){
		$this->validation();
		if($this->form_validation->run()==FALSE){
			
			$this->load->view('tambah_karakter');
			
		}else{
			
			$this->karakter_model->insertKarakter();
			$this->session->set_flashdata('pesan', 'Tambah Data karakter Berhasil  ');
			redirect('karakter/index/');
			
		}

		
	}
	public function update($id)
	{
		$this->validation();
		$data['karakter']=$this->karakter_model->getKarakterById($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_karakter',$data);

		}else{
			$this->karakter_model->updateById($id);
			$this->session->set_flashdata('pesan', 'Ubah Data karakter '.$id. ' Berhasil ');
			redirect('karakter/index/');
		}
	}
	public function delete($id){
		$this->karakter_model->delete($id);
		redirect('karakter/index/');
		
	}
    public function validation(){
		//load library	
		$this->form_validation->set_rules('jenishero', 'Jenis Hero', 'alpha|trim|required');
		$this->form_validation->set_rules('hero', 'Hero', 'alpha|trim|required');
		$this->form_validation->set_rules('int', 'Int', 'numeric|trim|required');
		$this->form_validation->set_rules('str', 'Str', 'numeric|trim|required');
		$this->form_validation->set_rules('agi', 'Agi', 'numeric|trim|required');
	}

}

/* End of file Controllername.php */
