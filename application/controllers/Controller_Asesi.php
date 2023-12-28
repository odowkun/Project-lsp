<?php
   class Controller_Asesi extends CI_Controller {      
      public function __construct() {
         parent::__construct();
         $this->load->model('Model_Validasi');
         $this->Model_Validasi->validasi();
         $this->load->model("Model_Asesi");
         $this->load->model("Model_Skema");
      }


      function home() {
         $nim = $this->session->userdata('Username');
         $data['dataDiri'] = $this->Model_Asesi->getData($nim);
         $data['home']=$this->load->view('template/dashboard/asesi/home', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function editData() {
         $nim = $this->session->userdata('Username');
         $data['dataDiri'] = $this->Model_Asesi->getData($nim);
         $data['editData']=$this->load->view('template/dashboard/asesi/editData', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function submitData() {
         $nim = $this->session->userdata('Username');
         $this->Model_Asesi->submitData($nim);
      }

      function informasi(){
         $data['tbskema'] = $this->Model_Asesi->skema();
         $data['informasi']=$this->load->view('template/dashboard/asesi/informasi', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

		function detailSkema(){
			$dataIdJurusan = $this->input->get('datajurusan');
			$dataKodeSkema = $this->input->get('dataskema');
			$data['hasil'] = $this->Model_Skema->informasiSkema($dataIdJurusan, $dataKodeSkema);
			$data['tbskema'] = $this->Model_Skema->skema($dataIdJurusan);
         $data['informasi']=$this->load->view('template/dashboard/asesi/detailSkema', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
		}

      function daftar(){
         $nim = $this->session->userdata('Username');
         $data['dataSkema'] = $this->Model_Asesi->pilihSkema();
         $data['hasil'] = $this->Model_Asesi->cekPendaftaran($nim);
         $data['daftar']=$this->load->view('template/dashboard/asesi/daftarSkema', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function submitdaftar(){
         $nim = $this->session->userdata('Username');
         $this->Model_Asesi->submitDaftar($nim);
      }

      function detailDaftar(){
			$idujian = $this->input->get('data');
         $data['detailDaftar'] = $this->Model_Asesi->detailDaftar($idujian);
         $data['daftar']=$this->load->view('template/dashboard/asesi/detailDaftar', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function batal(){
			$idujian = $this->input->get('data');
         $this->Model_Asesi->batal($idujian);
      }

      function uploadFile()
		{
         $nim = $this->session->userdata('Username');
			$NamaDokumen=$nim;
			$NamaFileKelengkapan=$this->uploadKelengkapan($_FILES['fileKelengkapan'],'fileKelengkapan',$NamaDokumen."_FileKelengkapan");
			$NamaFileBayar=$this->uploadPembayaran($_FILES['fileBayar'],'fileBayar',$NamaDokumen."_FilePembayaran");
			
			$data=array(
            'fileKelengkapan' => $NamaFileKelengkapan,
            'fileBayar' => $NamaFileBayar,
			);	
			
			
			$this->db->update('tbujian',$data);
			$this->session->set_flashdata('pesan','Data sudah simpan');
			redirect('Controller_asesi/daftar','refresh');
			
		}
		
		function uploadKelengkapan($uploadFile,$field,$nama)
		{
			$NamaFile=str_replace(' ', '', $nama);
			$extractFile = pathinfo($uploadFile['name']);	
			$ekst = $extractFile['extension'];
			$newName = $NamaFile.".".$ekst; 
			$config['upload_path']				= FCPATH.'Asset/file/dokumenKelengkapan';
			$config['allowed_types']			= 'pdf|jpg|png|jpeg';
			$config['max_size']         		= 5000;
			$config['overwrite'] 				= true;
			$config['file_name'] 				= $newName;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload($field)){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				
				return "";
				
			}else{
				
				return $newName;
			}
		 }
       function uploadPembayaran($uploadFile,$field,$nama)
       {
          $NamaFile=str_replace(' ', '', $nama);
          $extractFile = pathinfo($uploadFile['name']);	
          $ekst = $extractFile['extension'];
          $newName = $NamaFile.".".$ekst; 
          $config['upload_path']				= FCPATH.'Asset/file/dokumenPembayaran';
          $config['allowed_types']			= 'pdf|jpg|png|jpeg';
          $config['max_size']         		= 5000;
          $config['overwrite'] 				= true;
          $config['file_name'] 				= $newName;
          $this->upload->initialize($config);
          if (!$this->upload->do_upload($field)){
             $error = array('error' => $this->upload->display_errors());
             print_r($error);
             
             return "";
             
          }else{
             
             return $newName;
          }
        }
      }
?>