<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jerusalem");
        $this->load->library('ion_auth');
        // if not admin redirect to login form.
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }
        $this->data['pages']      = $this->main_model->get_all_data('pages');
        $this->data['aboutPages'] = $this->main_model->getSubPages(1);
        $this->data['workPages'] = $this->main_model->getSubPages(2);
    }
    public function index() {
        $this->load->view('admin/include/head', $this->data);
        $this->load->view('admin/index', $this->data);
        $this->load->view('admin/include/footer');
    }
    public function users() {
        if ($this->ion_auth->in_group('super')) {
            $this->data['users'] = $this->ion_auth->users(1)->result();
            $this->load->view('admin/include/head');
            $this->load->view('admin/users/index', $this->data);
            $this->load->view('admin/include/footer');
        } else {
            return show_error('You must be a super admin to view this page.');
        }
    }
    public function delete_user($id) {
        if ($this->ion_auth->in_group('super')) {
            $this->main_model->deleteData('users', $id);
        }
    }
    public function support() {
        if ($_POST) { //If the form is posted-> validate data
            // Validation Check
            $rules = $this->validation_model->support;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == false) //If Form validation errors exist
                {
                $this->data['errors'] = $this->form_validation->error_array();
                $this->session->set_flashdata('supportSent', '');
            } else {
                $this->email->set_mailtype("html");
                $to           = 'support@media-clouds.com';
                $from         = $this->input->post('email');
                $subject      = 'Support Form MediaClouds Website';
                $name         = $this->input->post('name');
                $organization = $this->input->post('organization');
                $phone        = $this->input->post('phone');
                $email        = $this->input->post('email');
                $type         = $this->input->post('type');
                $issue        = $this->input->post('issue');
                $details      = $this->input->post('details');
                $date         = date('d-m-Y H:i:s');
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message('<table border="0" cellpadding="20" cellspacing="0" height="100%" width="100%" id="bodyTable">



                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Name</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $name . '</td>

                            </tr>

                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Organization</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $organization . '</td>

                            </tr>                        

                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Phone Number</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $phone . '</td>

                            </tr>
                            
                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Email Address</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $email . '</td>

                            </tr>
                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Project Type</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $type . '</td>

                            </tr>
                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Issue Category</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $issue . '</td>

                            </tr>
                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Issue Details</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $details . '</td>

                            </tr>
                            <tr>

                            <td align="center" valign="top" style="border:1px solid #ddd">Date/Time Submitted</td>

                            <td align="center" valign="top" style="border:1px solid #ddd">' . $date . '</td>

                            </tr>

                           </table>');
                if ($this->email->send()) {
                    $to      = $this->input->post('email');
                    $from    = 'support@media-clouds.com';
                    $subject = 'Support Form MediaClouds Website';
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message('Thank you for sending your feedback.<br /><br />
 Your form was submitted on ' . $date . ' . Our team will follow up with you as per the response time specified in the Support page www.media-clouds.com/support <br /><br />
For complaints please call +970 56 969 1 969');
                    $this->email->send();
                    $this->session->set_flashdata('supportSent', 'Thank you for sending your feedback.');
                    redirect('admin/support');
                }
            }
        }
        $this->load->view('admin/include/head');
        $this->load->view('admin/support', @$this->data);
        $this->load->view('admin/include/footer');
    }
    public function seo($name) {
        $this->session->set_flashdata('seoUpdated', '');
        if ($this->main_model->check_name($name, "pages") == false) {
            show_404();
        } else {
            if ($_POST) { //If the form is posted-> validate data
                // Validation Check
                $rules = $this->validation_model->seo;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
                    $this->data['seo'] = $this->main_model->getItemByname('pages', $name);
                    $data              = array(
                        'en_seo_title' => $this->input->post('en_seo_title'),
                        'ar_seo_title' => $this->input->post('ar_seo_title'),
                        'en_seo_description' => $this->input->post('en_seo_description'),
                        'ar_seo_description' => $this->input->post('ar_seo_description'),
                        'en_keys' => $this->input->post('en_keys'),
                        'ar_keys' => $this->input->post('ar_keys')
                    ); //form data array
                    $return            = $this->main_model->updateData($this->data['seo']->id, "pages", $data); //submit to database
                    $this->session->set_flashdata('seoUpdated', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               SEO Data has been updated successfully.</div>');
                }
            }
            $this->data['seo'] = $this->main_model->getItemByname('pages', $name);
            $this->load->view('admin/include/head', $this->data);
            $this->load->view('admin/seo', $this->data);
            $this->load->view('admin/include/footer');
        }
    }public function content($name) {
        $this->session->set_flashdata('pageEdited', '');
        if ($this->main_model->check_name($name, "pages") == false) {
            show_404();
        } else {
           
            if ($_POST) { //If the form is posted-> validate data
                // Validation Check
                $rules = $this->validation_model->page;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
                    $this->data['page']         = $this->main_model->getItemByname('pages', $name);
                    $data                          = array(
                        'en_title' => $this->input->post('en_title'),
                        'ar_title' => $this->input->post('ar_title'),
                        'en_content' => $this->input->post('en_content'),
                        'ar_content' => $this->input->post('ar_content'),

                    ); //form data array
                   
                       $this->main_model->updateData($this->data['page']->id, "pages", $data); //submit to database
                        $this->session->set_flashdata('pageEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               Page Data has been updated successfully.</div>');
                    
                }
            }
            $this->data['page'] = $this->main_model->getItemByname('pages', $name);

            $this->load->view('admin/include/head', $this->data);
            $this->load->view('admin/content', $this->data);
            $this->load->view('admin/include/footer');
        }
    }
   
    public function page($name) {
        $this->session->set_flashdata('pageEdited', '');
        if ($this->main_model->check_name($name, "sub_pages") == false) {
            show_404();
        } else {
        	if($name=="board"){
        		redirect('board');
        	}
        	else if($name=="staff"){
        		redirect('staff');
        	}
            else if($name=="vacancies"){
                redirect('vacancies');
            }
            if ($_POST) { //If the form is posted-> validate data
                // Validation Check
                $rules = $this->validation_model->page;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
                    $this->data['upload_response'] = "";
                    $this->data['page']         = $this->main_model->getItemByname('sub_pages', $name);
                    $data                          = array(
                        'en_title' => $this->input->post('en_title'),
                        'ar_title' => $this->input->post('ar_title'),
                        'en_description' => $this->input->post('en_description'),
                        'ar_description' => $this->input->post('ar_description'),
                        'url' => $this->safeUrl($this->input->post('en_title'))

                    ); //form data array
                   
                       $this->main_model->updateData($this->data['page']->id, "sub_pages", $data); //submit to database
                        $this->session->set_flashdata('pageEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               Page Data has been updated successfully.</div>');
                    
                }
            }
            $this->data['page'] = $this->main_model->getItemByname('sub_pages', $name);

            $this->load->view('admin/include/head', $this->data);
            $this->load->view('admin/page', $this->data);
            $this->load->view('admin/include/footer');
        }
    }
    public function contact() {
        $this->data['contact'] = $this->main_model->getItem('contact', '1');
        $this->data['offices'] = $this->main_model->get_all_data('offices');
        $this->load->view('admin/include/head', $this->data);
        $this->load->view('admin/contact');
        $this->load->view('admin/include/footer');
    }
    public function update_contact() {
        $id            = intval($this->input->post('pk'));
        $name_of_column = $this->input->post('name');
        $data          = array(
            $name_of_column => $this->input->post('value')
        );
        $this->main_model->updateData($id, 'contact', $data);
        echo $this->input->post('value');
    }

    public function update_office() {
        $id            = intval($this->input->post('pk'));
        $name_of_column = $this->input->post('name');
        $data          = array(
            $name_of_column => $this->input->post('value')
        );
        $this->main_model->updateData($id, 'offices', $data);
        echo $this->input->post('value');
    }


    function upload_image2() { // HERE SET THE PATH TO THE FOLDER WITH IMAGES ON YOUR SERVER (RELATIVE TO THE ROOT OF YOUR WEBSITE ON SERVER)
        $upload_dir = 'saintyves/uploads/';
        // HERE PERMISSIONS FOR IMAGE
        $imgsets    = array(
            'maxsize' => 2000, // maximum file size, in KiloBytes (2 MB)
            'maxwidth' => 2000, // maximum allowed width, in pixels
            'maxheight' => 2000, // maximum allowed height, in pixels
            'minwidth' => 10, // minimum allowed width, in pixels
            'minheight' => 10, // minimum allowed height, in pixels
            'type' => array(
                'bmp',
                'gif',
                'jpg',
                'jpe',
                'png'
            ) // allowed extensions
        );
        $re         = '';
        if (isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {
            $upload_dir = trim($upload_dir, '/') . '/';
            $prod       = rand(1000000000, mt_getrandmax());
            $img_name   = basename($_FILES['upload']['name']);

            $filename   = $_FILES["upload"]["name"];
            $extension  = end(explode(".", $filename));
            var_dump($prod);
            $img_name   = $prod . "." . $extension;
            // get protocol and host name to send the absolute image path to CKEditor
            $protocol   = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $site       = $protocol . $_SERVER['SERVER_NAME'] . '/';
            $uploadpath = $_SERVER['DOCUMENT_ROOT'] . '/' . $upload_dir . $img_name; // full file path
            $sepext     = explode('.', strtolower($_FILES['upload']['name']));
            $type       = end($sepext); // gets extension
            list($width, $height) = getimagesize($_FILES['upload']['tmp_name']); // gets image width and height
            $err = ''; // to store the errors
            // Checks if the file has allowed type, size, width and height (for images)
            if (!in_array($type, $imgsets['type']))
                $err .= 'The file: ' . $_FILES['upload']['name'] . ' has not the allowed extension type.';
            if ($_FILES['upload']['size'] > $imgsets['maxsize'] * 1000)
                $err .= '\\n Maximum file size must be: ' . $imgsets['maxsize'] . ' KB.';
            if (isset($width) && isset($height)) {
                if ($width > $imgsets['maxwidth'] || $height > $imgsets['maxheight'])
                    $err .= '\\n Width x Height = ' . $width . ' x ' . $height . ' \\n The maximum Width x Height must be: ' . $imgsets['maxwidth'] . ' x ' . $imgsets['maxheight'];
                if ($width < $imgsets['minwidth'] || $height < $imgsets['minheight'])
                    $err .= '\\n Width x Height = ' . $width . ' x ' . $height . '\\n The minimum Width x Height must be: ' . $imgsets['minwidth'] . ' x ' . $imgsets['minheight'];
            }
            // If no errors, upload the image, else, output the errors
            if ($err == '') {
                if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $url             = $site . $upload_dir . $img_name;
                    $message         = $img_name . ' successfully uploaded: \\n- Size: ' . number_format($_FILES['upload']['size'] / 1024, 3, '.', '') . ' KB \\n- Image Width x Height: ' . $width . ' x ' . $height;
                    $re              = "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')";
                    $data            = array(
                        'name' => $img_name
                    );
                    $this->main_model->insertData('texteditor_images', $data);
                } else
                    $re = 'alert("Unable to upload the file")';
            } else
                $re = 'alert("' . $err . '")';
        }
        echo "<script>$re;</script>";
    }
    function uploadfile() { // HERE SET THE PATH TO THE FOLDER WITH IMAGES ON YOUR SERVER (RELATIVE TO THE ROOT OF YOUR WEBSITE ON SERVER)
        $upload_dir = 'saintyves/uploads/';
        // HERE PERMISSIONS FOR IMAGE
        $imgsets    = array(
            'maxsize' => 2000, // maximum file size, in KiloBytes (2 MB)
            'maxwidth' => 2000, // maximum allowed width, in pixels
            'maxheight' => 2000, // maximum allowed height, in pixels
            'minwidth' => 10, // minimum allowed width, in pixels
            'minheight' => 10, // minimum allowed height, in pixels
            'type' => array(
                'pdf',
                'doc',
                'docx',
                'jpe',
                'png'
            ) // allowed extensions
        );
        $re         = '';
        if (isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {
            $upload_dir = trim($upload_dir, '/') . '/';
            $prod       = rand(1000000, 100000000000000000000000000000000);
            $img_name   = basename($_FILES['upload']['name']);
            $filename   = $_FILES["upload"]["name"];
            $extension  = end(explode(".", $filename));
            $img_name   = $prod . "." . $extension;
            // get protocol and host name to send the absolute image path to CKEditor
            $protocol   = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $site       = $protocol . $_SERVER['SERVER_NAME'] . '/';
            $uploadpath = $_SERVER['DOCUMENT_ROOT'] . '/' . $upload_dir . $img_name; // full file path
            $sepext     = explode('.', strtolower($_FILES['upload']['name']));
            $type       = end($sepext); // gets extension
            list($width, $height) = getimagesize($_FILES['upload']['tmp_name']); // gets image width and height
            $err = ''; // to store the errors
            // Checks if the file has allowed type, size, width and height (for images)
            if (!in_array($type, $imgsets['type']))
                $err .= 'The file: ' . $_FILES['upload']['name'] . ' has not the allowed extension type.';
            if ($_FILES['upload']['size'] > $imgsets['maxsize'] * 1000)
                $err .= '\\n Maximum file size must be: ' . $imgsets['maxsize'] . ' KB.';
            if (isset($width) && isset($height)) {
                if ($width > $imgsets['maxwidth'] || $height > $imgsets['maxheight'])
                    $err .= '\\n Width x Height = ' . $width . ' x ' . $height . ' \\n The maximum Width x Height must be: ' . $imgsets['maxwidth'] . ' x ' . $imgsets['maxheight'];
                if ($width < $imgsets['minwidth'] || $height < $imgsets['minheight'])
                    $err .= '\\n Width x Height = ' . $width . ' x ' . $height . '\\n The minimum Width x Height must be: ' . $imgsets['minwidth'] . ' x ' . $imgsets['minheight'];
            }
            // If no errors, upload the image, else, output the errors
            if ($err == '') {
                if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $url             = $site . $upload_dir . $img_name;
                    $message         = $img_name . ' successfully uploaded: \\n- Size: ' . number_format($_FILES['upload']['size'] / 1024, 3, '.', '') . ' KB \\n- file Width x Height: ' . $width . ' x ' . $height;
                    $re              = "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')";
                    $data            = array(
                        'link' => $img_name
                    );
                    $this->main_model->insertData('files', $data);
                } else
                    $re = 'alert("Unable to upload the file")';
            } else
                $re = 'alert("' . $err . '")';
        }
        echo "<script>$re;</script>";
    }
    private function _dir_path() {
        $path = 'uploads/';
        return $path;
    }
    private function _file_path($filename) {
        $dir_path = $this->_dir_path();
        return "{$dir_path}{$filename}";
    }
    private function _file_url($filename) {
        return "/files/ckeditor/{$filename}";
    }
    private function _delete_url() {
        return "/ckeditor/filedelete";
    }
    function brows() {
        $data = $this->main_model->get_all_data('texteditor_images');
        if (!empty($data)) {
            foreach ($data as $item) {
                $xx[] = array(
                    'image' => base_url('uploads/' . $item['name'] . '')
                );
            }
        } else {
            $xx = array();
        }
        echo json_encode($xx);
    }
    function browsefile() {
        $data = $this->main_model->get_all_data('files');
        if (!empty($data)) {
            foreach ($data as $item) {
                $xx[] = array(
                    'link' => base_url('uploads/' . $item['link'] . '')
                );
            }
        } else {
            $xx = array();
        }
        echo json_encode($xx);
    }
    function brows2() {
        $data = $this->primary_model->get_all_data('texteditor_images');
        if (!empty($data)) {
            foreach ($data as $item) {
                // $img='/aia/uploads/3.jpg';
                $xx[] = array(
                    'image' => 'uploads/' . $item['name'] . ''
                );
            }
        } else {
            $xx = array();
        }
        $xx = array();
        // header('Content-Type: application/json');
        echo json_encode($xx);
    }
    public function _valid_images($files_to_upload, $field_info) {
        $allowed  = array(
            'gif',
            'png',
            'jpg',
            'jpeg'
        );
        $filename = $_FILES[$field_info->encrypted_field_name]['name'];
        $ext      = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            return 'You are not allow to upload this kind of files';
        }
        return true;
    }
    /*Upload images function*/
    function upload_image($form_field_name) {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name']  = TRUE;
        $config['overwrite']     = FALSE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($form_field_name)) {
            return false;
        } else {
            $data        = array(
                'upload_data' => $this->upload->data()
            );
            $upload_data = $this->upload->data();
            $imgname     = $upload_data['file_name'];
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