<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class programs extends CI_Controller {

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
		$this->data['programs']=$this->main_model->get_all_data('programs');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/programs/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
			  $rules = $this->validation_model->news;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'ar_title'=>$this->input->post('ar_title'),
				'en_description'=>$this->input->post('en_description'),
				'ar_description'=>$this->input->post('ar_description'),
				'date'=>$this->input->post('date'),
                'url' => $this->safeUrl($this->input->post('en_title'))
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('programsAdded', '');

     			}

			}
			else{
			   $data['image']='styves-logo.jpg'; 
			}
			
			if($this->data['upload_response'] == ""){

    			$return=$this->main_model->insertData("programs",$data); 
    			$this->session->set_flashdata('programsAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                programs post has been added successfully.</div>'); 
				redirect('admin/programs');
    		}
    			
	

}
}
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/programs/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "programs")==false){

			show_404();

		}
		else{
		if($_POST){	 
			$rules = $this->validation_model->news;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'ar_title'=>$this->input->post('ar_title'),
				'en_description'=>$this->input->post('en_description'),
				'ar_description'=>$this->input->post('ar_description'),
				'date'=>$this->input->post('date'),
                'url' => $this->safeUrl($this->input->post('en_title'))

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('programsEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"programs",$data); //submit to database
			$this->session->set_flashdata('programsEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                programs Post has been edited successfully</div>'); 
		}
	}
	

}


		$this->data['post']=$this->main_model->getItem('programs',$id); 

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/programs/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "programs")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('programs',$id);
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
  function SafeUrl($url)
    {
        
        
        $str         = $url;
        $friendlyURL = htmlentities($str, ENT_COMPAT, "UTF-8", false);
        
        $friendlyURL = trim(strtolower($str));
        
        $friendlyURL = preg_replace("/[^أ-يa-zA-Z0-9_.-]/u", "-", $friendlyURL);
        
        $friendlyURL = html_entity_decode($friendlyURL, ENT_COMPAT, "UTF-8");
        
        $friendlyURL = trim(preg_replace('/-+/', '-', $friendlyURL), '-');
        
        $friendlyURL = trim($friendlyURL, '-');
        
        $url = $friendlyURL . '.html';
        
        return $url;
        
    }

}