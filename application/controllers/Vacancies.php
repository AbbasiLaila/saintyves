<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vacancies extends CI_Controller {

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
		$this->data['vacancies']=$this->main_model->get_all_data('vacancies');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/vacancies/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
			  $rules = $this->validation_model->vacancy;
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
				'deadline'=>$this->input->post('deadline'),
				'office'=>$this->input->post('office'),
				'date'=>date('Y-m-d'),
                'url' => $this->safeUrl($this->input->post('en_title'))
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('vacancyAdded', '');

     			}

			}	else{
			   $data['image']='styves-logo.jpg'; 
			}
			
			if($this->data['upload_response'] == ""){

    			$return=$this->main_model->insertData("vacancies",$data); 
    			$this->session->set_flashdata('vacancyAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Vacancy has been added successfully.</div>'); 
				redirect('admin/vacancies');
    		}
    			
	

}
}
	$this->data['offices']=$this->main_model->get_all_data('offices');
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/vacancies/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "vacancies")==false){

			show_404();

		}
		else{
		if($_POST){	 
			$rules = $this->validation_model->vacancy;
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
				'deadline'=>$this->input->post('deadline'),
				'office'=>$this->input->post('office'),
                'url' => $this->safeUrl($this->input->post('en_title'))

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('vacancyEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"vacancies",$data); //submit to database
			$this->session->set_flashdata('vacancyEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Vacancy has been edited successfully</div>'); 
		}
	}
	

}


		$this->data['vacancy']=$this->main_model->getItem('vacancies',$id); 
		$this->data['offices']=$this->main_model->get_all_data('offices');

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/vacancies/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "vacancies")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('vacancies',$id);
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