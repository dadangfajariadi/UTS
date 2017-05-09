<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karakter_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getKarakter()
		{
			$query = $this->db->get('dota');
			return $query->result();
		}

		public function insertKarakter()
		{
			$object = array(
				'jenishero' => $this->input->post('jenishero'),
				'hero' => $this->input->post('hero'),
				'int' => $this->input->post('int'),
				'str' => $this->input->post('str'),
				'agi' => $this->input->post('agi')
				);
			$this->db->insert('dota', $object);
		}


		public function getKarakterById($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('dota',1);
			return $query->result();

		}

		public function updateById($id)
		{
			$data = array(
				'jenishero' => $this->input->post('jenishero'),
				'hero' => $this->input->post('hero'),
				'int' => $this->input->post('int'),
				'str' => $this->input->post('str'),
				'agi' => $this->input->post('agi')
				);
			$this->db->where('id', $id);
			$this->db->update('dota', $data);
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('dota');
		}    

}

/* End of file kategori_model.php */
