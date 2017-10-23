<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {

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
		$this->data['departments']=$this->main_model->get_all_data('departments');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/departments/index',$this->data);
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
				$data = array(
				'en_name'=>$this->input->post('en_name'),
				'ar_name'=>$this->input->post('ar_name'),
				
		 		); //form data array
		 	
			
		
    			$this->main_model->insertData("departments",$data); 
    			$this->session->set_flashdata('departmentAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Department has been added successfully.</div>'); 
				redirect('admin/departments');
    		
    			
	

}
}
		
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/departments/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "departments")==false){

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
				$data = array(
				'en_name'=>$this->input->post('en_name'),
				'ar_name'=>$this->input->post('ar_name'),
				

			); //form data array

		
					 	
			$return=$this->main_model->updateData($id,"departments",$data); //submit to database
			$this->session->set_flashdata('departmentEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Department has been edited successfully</div>'); 
		
	}
	

}


		$this->data['department']=$this->main_model->getItem('departments',$id); 
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/departments/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "departments")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('departments',$id);
		}
	}


}