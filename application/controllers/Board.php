<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class board extends CI_Controller {

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
		$this->data['board_members']=$this->main_model->get_all_data('board');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/board/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
			  $rules = $this->validation_model->name;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
    			$this->data['upload_response']="";
				$data = array(
				'en_name'=>$this->input->post('en_name'),
				'ar_name'=>$this->input->post('ar_name'),
				'en_position'=>$this->input->post('en_position'),
				'ar_position'=>$this->input->post('ar_position'),
				'en_description'=>$this->input->post('en_description'),
				'ar_description'=>$this->input->post('ar_description'),
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('boardAdded', '');

     			}

			}
			else{
			   $data['image']='styves-logo.jpg'; 
			}
			
			if($this->data['upload_response'] == ""){

    			$return=$this->main_model->insertData("board",$data); 
    			$this->session->set_flashdata('boardAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Board member has been added successfully.</div>'); 
				redirect('admin/board');
    		}
    			
	

}
}
		
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/board/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "board")==false){

			show_404();

		}
		else{
		if($_POST){	 
			$rules = $this->validation_model->name;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
    			$this->data['upload_response']="";
				$data = array(
				'en_name'=>$this->input->post('en_name'),
				'ar_name'=>$this->input->post('ar_name'),
				'en_position'=>$this->input->post('en_position'),
				'ar_position'=>$this->input->post('ar_position'),
				'en_description'=>$this->input->post('en_description'),
				'ar_description'=>$this->input->post('ar_description'),

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('boardEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"board",$data); //submit to database
			$this->session->set_flashdata('boardEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Board member has been edited successfully</div>'); 
		}
	}
	

}


		$this->data['member']=$this->main_model->getItem('board',$id); //getting slide's stored data to show it in the form in the view page.

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/board/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "board")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('board',$id);
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