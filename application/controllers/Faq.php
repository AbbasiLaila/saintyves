<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

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
		$this->data['questions']=$this->main_model->get_all_data('faq');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/faq/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
			  $rules = $this->validation_model->faq;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
				$data = array(
				'en_question'=>$this->input->post('en_question'),
				'ar_question'=>$this->input->post('ar_question'),
				'en_answer'=>$this->input->post('en_answer'),
				'ar_answer'=>$this->input->post('ar_answer'),

		 		); 

    			$return=$this->main_model->insertData("faq",$data); 
    			$this->session->set_flashdata('faqAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Question has been added successfully.</div>'); 
				redirect('admin/faq');
    		}
    			
	


}
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/faq/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "faq")==false){

			show_404();

		}
		else{
		if($_POST){	 
			$rules = $this->validation_model->faq;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
				$data = array(
				'en_question'=>$this->input->post('en_question'),
				'ar_question'=>$this->input->post('ar_question'),
				'en_answer'=>$this->input->post('en_answer'),
				'ar_answer'=>$this->input->post('ar_answer'),

			); 
			$return=$this->main_model->updateData($id,"faq",$data); //submit to database
			$this->session->set_flashdata('faqEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Question has been edited successfully</div>'); 
		}
	
}


		$this->data['question']=$this->main_model->getItem('faq',$id); 

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/faq/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "faq")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('faq',$id);
		}
	}


}