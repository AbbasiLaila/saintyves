<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issues extends CI_Controller {

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
		$this->data['issues']=$this->main_model->get_all_data('main_issues');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/issues/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
			  $rules = $this->validation_model->page;
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
				'category_id'=>$this->input->post('category_id'),
                'url' => $this->safeUrl($this->input->post('en_title'))
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('issueAdded', '');

     			}

			}
			
			if($this->data['upload_response'] == ""){

    			$this->main_model->insertData("main_issues",$data); 
    			$this->session->set_flashdata('issueAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Issue has been added successfully.</div>'); 
				redirect('admin/issues');
    		}
    			
	

}
}
	$this->data['categories']=$this->main_model->get_all_data('main_issues_categories');
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/issues/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "main_issues")==false){

			show_404();

		}
		else{
		if($_POST){	 
			$rules = $this->validation_model->page;
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
				'category_id'=>$this->input->post('category_id'),
                'url' => $this->safeUrl($this->input->post('en_title'))
			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('issueEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"main_issues",$data); //submit to database
			$this->session->set_flashdata('issueEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Issue has been edited successfully</div>'); 
		}
	}
	

}


		$this->data['issue']=$this->main_model->getItem('main_issues',$id); 
		$this->data['categories']=$this->main_model->get_all_data('main_issues_categories');

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/issues/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "main_issues")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('main_issues',$id);
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