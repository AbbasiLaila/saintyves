<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class front extends MY_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jerusalem');
        $this->data['aboutPages'] = $this->main_model->getSubPages(1);
        $this->data['workPages'] = $this->main_model->getSubPages(2);
        $this->data['contactInfo'] = $this->main_model->getItem('contact',1);
    }
    public function index() {
		$this->data['seo']=$this->main_model->getItem('pages','1');
        $this->data['slides']=$this->main_model->get_all_data('slider');
        $this->data['overview'] = $this->main_model->getItemByname('sub_pages', 'overview');
        $this->data['mission'] = $this->main_model->getItemByname('sub_pages', 'mission');
        $this->data['latestNews'] = $this->main_model->getLatestItems('news', 3,"date",'DESC');

		$this->load->view('front/include/head',$this->data);
		$this->load->view('front/index',$this->data);
		$this->load->view('front/include/footer',$this->data);
    }
    public function page($page_name,$sub_page) {
        $page=$this->main_model->getItemByname('pages',$page_name);
        if($page == null){
            show_404();
        }
        else{
        if ($this->main_model->check_name_page($page->id,$sub_page) == false) {
            show_404();
        } else {
        $this->data['sub_page']  = $this->main_model->getItemByname('sub_pages', $sub_page);
        $this->data['menuItems'] = $this->main_model->getSubPages( $page->id);
        $this->data['seo']=$page;

        if($sub_page=="board"){
            $this->data['directors']=$this->main_model->get_all_data('board');
            $this->load->view('front/include/head',$this->data);
            $this->load->view('front/board',$this->data);
            $this->load->view('front/include/footer',$this->data);
        }
        else if($sub_page=="staff"){
            $this->data['departments']=$this->main_model->get_departments();
            foreach ($this->data['departments'] as $k => $department)
            {
                $this->data['departments'][$k]->members = $this->main_model->getDepartmentMembers($department->id);

            
            }
            $this->load->view('front/include/head',$this->data);
            $this->load->view('front/staff',$this->data);
            $this->load->view('front/include/footer',$this->data);
        }
        else if($sub_page=="vacancies"){
            $this->data['vacancies']=$this->main_model->getJobs();
            $this->load->view('front/include/head',$this->data);
            $this->load->view('front/vacancies',$this->data);
            $this->load->view('front/include/footer',$this->data);
        }
        else if($sub_page=="programs"){
            $this->data['programs']=$this->main_model->get_all_data('programs');
            $this->load->view('front/include/head',$this->data);
            $this->load->view('front/programs',$this->data);
            $this->load->view('front/include/footer',$this->data);
        }
        
        else{
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/inner',$this->data);
        $this->load->view('front/include/footer',$this->data);
        }
    }
    }
}

    public function vacancies($id)
    {       
    if($this->main_model->check($id, "vacancies")==false){

            show_404();

        }
        else{
            $this->data['vacancy']=$this->main_model->getItem('vacancies',$id);
            if( date('Y-m-d') > $this->data['vacancy']->deadline){
                show_404();
            } else{
                $this->data['seo']=$this->main_model->getItem('pages',2);
                $this->data['sub_page']  = $this->main_model->getItemByname('sub_pages', 'vacancies');
                $this->data['menuItems'] = $this->main_model->getSubPages(1);
                $this->load->view('front/include/head',$this->data);
                $this->load->view('front/vacancy',$this->data);
                $this->load->view('front/include/footer',$this->data);
            }
        }
    }

     public function news()
    {       
        $this->data['seo']=$this->main_model->getItem('pages',3);
        $this->data['news']=$this->main_model->get_all_data('news');
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/news',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }
    public function newsItem($url)
    {       
    $newsItem =$this->main_model->find_url($url, "news");
        if($newsItem==false){ 

            show_404();

        }
        else{

            $this->data['newsItem']=$this->main_model->getItem('news',$newsItem->id);
            $this->data['seo']=$this->main_model->getItem('pages',3);
            $this->load->view('front/include/head',$this->data);
            $this->load->view('front/newsItem',$this->data);
            $this->load->view('front/include/footer',$this->data);
            
        }
    }

    /*Programs*/

     public function programs($url)
    {       
    $program =$this->main_model->find_url($url, "programs");
    if($program==false){ 

            show_404();

        }
        else{

            $this->data['program']=$this->main_model->getItem('programs',$program->id);

                $this->data['seo']=$this->main_model->getItem('pages',2);
                $this->data['sub_page']  = $this->main_model->getItemByname('sub_pages', 'programs');
                $this->data['menuItems'] = $this->main_model->getSubPages(2);
                $this->load->view('front/include/head',$this->data);
                $this->load->view('front/article',$this->data);
                $this->load->view('front/include/footer',$this->data);
            
        }
    }

    /*Donors*/
      public function donors()
    {       
        $this->data['seo']=$this->main_model->getItem('pages',4);
        $this->data['donors']=$this->main_model->get_all_data('donors');
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/donors',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

     /*FAQ*/
      public function faq()
    {       
        $this->data['seo']=$this->main_model->getItem('pages',5);
        $this->data['faq']=$this->main_model->get_all_data('faq');
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/faq',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

      /*Contact*/
      public function contact()
    {       
        $this->data['seo']=$this->main_model->getItem('pages',6);
        $this->data['offices']=$this->main_model->get_all_data('offices');
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/contact',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }
}