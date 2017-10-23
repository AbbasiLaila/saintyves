<?php
class MY_Controller extends CI_Controller
{
    public $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->helper('language');
        $language = $this->check_languge_type();
        if ($language == 'ar') {
            $this->config->set_item('language', 'arabic');
            $this->lang->load('form_validation','arabic');
            $this->lang->load('site_lang', 'arabic');
            $this->lang->load('ion_auth','arabic');
            $this->lang->load('auth','arabic');
        } else {
            $this->config->set_item('language', 'english');
            $this->lang->load('site_lang', 'english');
            $this->lang->load('ion_auth','english');
            $this->lang->load('auth','english');
            $this->lang->load('form_validation','english');
        }
        $this->data['lang'] = $this->check_languge_type();
        $language           = $this->check_languge_type();
        
        $this->data['title']           = $language . '_title';
        $this->data['description']     = $language . '_description';
        $this->data['box']             = $language . '_box';
        $this->data['seo_title']       = $language . '_seo_title';
        $this->data['seo_description'] = $language . '_seo_description';
        $this->data['keys']        = $language . '_keys';
        $this->data['position']        = $language . '_position';
        $this->data['address']        = $language . '_address';
        $this->data['name']        = $language . '_name';
        $this->data['question']        = $language . '_question';
        $this->data['answer']        = $language . '_answer';
        $this->data['location']        = $language . '_location';

    }
    function check_cookie()
    {
        if (get_cookie('site_language')) {
            if (file_exists('application/language/' . get_cookie('site_language') . '/site_lang.php') && is_dir('application/language/' . get_cookie('site_language'))) {
                $this->lang->load('site', get_cookie('site_language'));
            }

        } 
        else {
            $this->lang->load('site', 'english');
        } 
    } 
    function check_languge_type()
    {
        $lang = get_cookie('site_language');
        if ($lang == 'arabic') {
            $langugetype = 'ar';
            return $langugetype;
        } else {
            $langugetype = "en";
            return $langugetype;
        }
    } //end check_languge_type
}
