<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class donors extends CI_Controller {

	public function __construct()
  	 {
		parent::__construct();
		$this->load->library('ion_auth');
    //if not admin redirect to login form.
	 if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        
		}
		$this->data['pages']=$this->main_model->get_all_data('pages');
		$this->data['aboutPages']=$this->main_model->getSubPages(1);
        $this->data['workPages'] = $this->main_model->getSubPages(2);

   }
	public function index()
	{
		$this->data['donors']=$this->main_model->get_all_data('donors');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/donors/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
    			$this->data['upload_response']="";
    			$this->data['req']="";
				$data = array(
				
				'link'=>$this->input->post('link'),

		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('donorAdded', '');

     			}

			}
			else{
			$this->data['req'] = "Donor Logo is requiered";

			}
			if($this->data['upload_response'] == "" && $this->data['req']==""){

    			$return=$this->main_model->insertData("donors",$data); 
    			$this->session->set_flashdata('donorAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Donor has been added successfully</div>'); 
				redirect('admin/donors');
    		}
    			
	

}


		
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/donors/add');
		$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "donors")==false){

			show_404();

		}
		else{
		if($_POST){	 
    			$this->data['upload_response']="";
				$data = array(
				
				'link'=>$this->input->post('link'),

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('donorEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"donors",$data); //submit to database
			$this->session->set_flashdata('donorEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Donor has been edited successfully</div>'); 
		}
	
	

}


		$this->data['donor']=$this->main_model->getItem('donors',$id); 
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/donors/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "donors")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('donors',$id);
		}
	}
/*Upload images function*/
function upload_image($form_field_name)
{
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['encrypt_name'] = TRUE;
	$config['overwrite'] = FALSE;
	$config['remove_spaces'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload($form_field_name))
    {
    return false;
    }
    else
    {
    $data = array('upload_data' => $this->upload->data());
	$upload_data = $this->upload->data();	
	$imgname=$upload_data['file_name'];
	return $imgname;
    }
}


}