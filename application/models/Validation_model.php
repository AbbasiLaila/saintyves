<?php

class validation_model extends CI_Model {

	public $page = array(

		     'en_title' => array (

					'field' => 'en_title',

					'label' => 'English title',

					'rules' => 'required'

			),
		     'ar_title' => array (

					'field' => 'ar_title',

					'label' => 'Arabic title',

					'rules' => 'required'

			),

	
);

	public $news = array(

		     'en_title' => array (

					'field' => 'en_title',

					'label' => 'English title',

					'rules' => 'required'

			),
		     'ar_title' => array (

					'field' => 'ar_title',

					'label' => 'Arabic title',

					'rules' => 'required'

			),

	
);

	public $faq = array(

		     'en_question' => array (

					'field' => 'en_question',

					'label' => 'English Question',

					'rules' => 'required'

			),
		     'ar_question' => array (

					'field' => 'ar_question',

					'label' => 'Arabic Question',

					'rules' => 'required'

			),

		     'en_answer' => array (

					'field' => 'en_answer',

					'label' => 'English Answer',

					'rules' => 'required'

			),
		     'ar_answer' => array (

					'field' => 'ar_answer',

					'label' => 'Arabic Answer',

					'rules' => 'required'

			),

		     
	
);
	public $vacancy = array(

		     'en_title' => array (

					'field' => 'en_title',

					'label' => 'English title',

					'rules' => 'required'

			),
		     'ar_title' => array (

					'field' => 'ar_title',

					'label' => 'Arabic title',

					'rules' => 'required'

			),

		     'deadline' => array (

					'field' => 'deadline',

					'label' => 'Deadline date',

					'rules' => 'required'

			),
	
);
public $name = array(

		     'en_name' => array (

					'field' => 'en_name',

					'label' => 'English name',

					'rules' => 'required'

			),
		     'ar_name' => array (

					'field' => 'ar_name',

					'label' => 'Arabic name',

					'rules' => 'required'

			),

	
);


public $staff = array(

		     'en_name' => array (

					'field' => 'en_name',

					'label' => 'English name',

					'rules' => 'required'

			),
		     'ar_name' => array (

					'field' => 'ar_name',

					'label' => 'Arabic name',

					'rules' => 'required'

			),

		'department_id' => array (

					'field' => 'department_id',

					'label' => 'Staff Department',

					'rules' => 'required'

			),
	
);

public $support = array(

		     'name' => array (

					'field' => 'name',

					'label' => 'Name',

					'rules' => 'trim|required'

			),

			

			'organization' => array (

					'field' => 'organization',

					'label' => 'Organization',

					'rules' => 'trim|required'

			),
			
			'phone' => array (

					'field' => 'phone',

					'label' => 'Phone Number',

					'rules' => 'trim|required'

			),
			
			'email' => array (

					'field' => 'email',

					'label' => 'Email Address',

					'rules' => 'trim|required|valid_email'

			),
			'type' => array (

					'field' => 'type',

					'label' => 'Project Type',

					'rules' => 'trim|required'

			),
			
			'issue' => array (

					'field' => 'issue',

					'label' => 'Issue Category',

					'rules' => 'trim|required'

			),
			
			'details' => array (

					'field' => 'details',

					'label' => 'Issue Details',

					'rules' => 'trim|required'

			),
			'g-recaptcha-response' => array (

					'field' => 'g-recaptcha-response',

					'label' => 'recaptcha validation',

					'rules' => 'required'

			),

		

			

);


	public $article = array(

		     'post_title' => array (

					'field' => 'post_title',

					'label' => 'Title',

					'rules' => 'required'

			),

			 'post_date' => array (

					'field' => 'post_date',

					'label' => 'Date',

					'rules' => 'required'

			),

			'post_content' => array (

					'field' => 'post_content',

					'label' => 'Content',

					'rules' => 'required'

			),
			
			'author_id' => array (

					'field' => 'author_id',

					'label' => 'Author',

					'rules' => 'required'

			),
			
			'category_id' => array (

					'field' => 'category_id',

					'label' => 'Category',

					'rules' => 'required'

			),
			
	

);

public $video = array(

		     'title' => array (

					'field' => 'title',

					'label' => 'Title',

					'rules' => 'required'

			),

			 'date' => array (

					'field' => 'date',

					'label' => 'Date',

					'rules' => 'required'

			),

			'content' => array (

					'field' => 'content',

					'label' => 'Content',

					'rules' => 'required'

			),
			
			
			'video' => array (

					'field' => 'video',

					'label' => 'Video link',

					'rules' => 'required'

			),
			
	

);


public $seo = array(

		     'en_seo_title' => array (

					'field' => 'en_seo_title',

					'label' => 'English SEO Title',

					'rules' => 'required'

			),

			

			'ar_seo_title' => array (

					'field' => 'ar_seo_title',

					'label' => 'Arabic SEO Title',

					'rules' => 'required'

			),

			

);







public $contact = array(

		     'name' => array (

					'field' => 'name',

					'label' => 'Name',

					'rules' => 'required'

			),

			

		

			'email' => array (

					'field' => 'email',

					'label' => 'Email Address',

					'rules' => 'required|valid_email'

			),

			'message' => array (

					'field' => 'message',

					'label' => 'Message',

					'rules' => 'required'

			),

			

);





public $passwordChange = array(

		    'password' => array (

					'field' => 'password',

					'label' => 'Password',

					'rules' => 'trim|required|min_length[8]'

			),

			'confirmPassword' => array (

					'field' => 'confirmPassword',

					'label' => 'Confirm Password',

					'rules' => 'trim|required|min_length[8]|matches[password]'

			),

			

		

			

);



}