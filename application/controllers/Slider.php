<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class slider extends CI_Controller {

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
		$this->data['slides']=$this->main_model->get_all_data('slider');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/slider/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
    			$this->data['upload_response']="";
    			$this->data['req']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'en_description'=>$this->input->post('en_description'),
				'ar_title'=>$this->input->post('ar_title'),
				'ar_description'=>$this->input->post('ar_description'),
				'link'=>$this->input->post('link'),

		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('slideAdded', '');

     			}

			}
			else{
			$this->data['req'] = "Slide Image is requiered";

			}
			if($this->data['upload_response'] == "" && $this->data['req']==""){

    			$return=$this->main_model->insertData("slider",$data); 
    			$this->session->set_flashdata('slideAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Slide has been added successfully</div>'); 
				redirect('admin/slider');
    		}
    			
	

}


		
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/slider/add');
		$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "slider")==false){

			show_404();

		}
		else{
		if($_POST){	 
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'en_description'=>$this->input->post('en_description'),
				'ar_title'=>$this->input->post('ar_title'),
				'ar_description'=>$this->input->post('ar_description'),
				'link'=>$this->input->post('link'),

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('slideEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"slider",$data); //submit to database
			$this->session->set_flashdata('slideEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Slide has been edited successfully</div>'); 
		}
	
	

}


		$this->data['slide']=$this->main_model->getItem('slider',$id); //getting slide's stored data to show it in the form in the view page.

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/slider/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "slider")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('slider',$id);
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