<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
		$this->data['categories']=$this->main_model->get_all_data('main_issues_categories');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/categories/index',$this->data);
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
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'ar_title'=>$this->input->post('ar_title'),
                'url' => $this->safeUrl($this->input->post('en_title'))
		 		); //form data array
		 	
			
		
    			$this->main_model->insertData("main_issues_categories",$data); 
    			$this->session->set_flashdata('categoryAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Category has been added successfully.</div>'); 
				redirect('admin/categories');
    		
    			
	

}
}
		
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/categories/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "main_issues_categories")==false){

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
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'ar_title'=>$this->input->post('ar_title'),
                'url' => $this->safeUrl($this->input->post('en_title'))
			); //form data array

		
					 	
			$return=$this->main_model->updateData($id,"main_issues_categories",$data); //submit to database
			$this->session->set_flashdata('categoryEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Category has been edited successfully</div>'); 
		
	}
	

}


		$this->data['category']=$this->main_model->getItem('main_issues_categories',$id); 
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/categories/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "main_issues_categories")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('main_issues_categories',$id);
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