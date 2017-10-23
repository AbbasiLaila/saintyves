<?php

class main_model extends CI_Model  {

	

	

function insertData($table,$data){

		if($this->db->insert($table, $data)){

		    return $this->db->insert_id();

		}else{

		    return false;

		}

}//end function




function updateData($id,$table,$data){

	$this->db->where('id', $id);

	$this->db->update($table, $data);

}	//end function

function get_all_data($table){// for drop list 

	$sort='id';

    $order='DESC';


    $query=$this->db->select('*')

           ->from($table)

          ->order_by($sort, $order)

          ->get();

		return $query->result_array(); 	

}

function get_all_data_ordered($table , $sort, $order){

  
    $query=$this->db->select('*')

           ->from($table)

          ->order_by($sort, $order)

          ->get();

		return $query->result_array(); 	

}




function getItem($table,$id){// for drop list 

		

		$query= $this->db->get_where($table, array('id' => $id));      

		return $query->row(); 	

}

function deleteData($table,$id)

{

		if ($id != NULL)

		{

				$this->db->where('id', $id);                    

				$this->db->delete($table);                        

		}

} 



function get_all_data_pagination($table,$start,$sort,$limit){// for drop list 

	$sort=$sort;

    $order='DESC';


    $query=$this->db->select('*')

           ->from($table)

          ->order_by($sort, $order)
		  
		  ->limit($limit,$start)

          ->get();

		return $query->result_array(); 	

}

function get_albums(){

    $query=$this->db->select('*')

                  ->from('photo_gallery')

                  ->where('type', 'album')

                  ->get();

    return $query->result_array();  

}
function getSubPages($id){

    $query=$this->db->select('*')

                  ->from('sub_pages')

                  ->where('page_id', $id)

                  ->get();

    return $query->result_array();  

}


function getGalleryImages($id){

		$query=$this->db->select('*')

                  ->from('news_images')

                  ->where('news_id', $id)

                  ->get();

		return $query->result_array(); 	

}
function getJobs(){
 $date = new DateTime("now");

 $curr_date = $date->format('Y-m-d ');
    $query=$this->db->select('*')

           ->from('vacancies')
           ->where('vacancies.deadline >=', $curr_date)
          ->order_by('vacancies.date', 'DESC')

          ->get();

  return $query->result_array();

}
function get_departments(){

    $query=$this->db->select('*')

           ->from('departments')

          ->get();

  return $query->result();;  

}
function getDepartmentMembers($id){

    $query=$this->db->select('*')

                  ->from('staff')

                  ->where('department_id', $id)

                  ->get();

    return $query->result_array();  

}


function deletebrandImages($id){

if ($id != NULL)

    {

        $this->db->where('brand_id', $id);                    

        $this->db->delete('brands_images');                        

    }

}

function deletenewsImages($id){

if ($id != NULL)

    {

        $this->db->where('news_id', $id);                    

        $this->db->delete('news_images');                        

    }

}

function deleteGalleryImages($id){

if ($id != NULL)

    {

        $this->db->where('album_id', $id);                    

        $this->db->delete('album_images');                        

    }

}



function getItemByname($table,$name){// for drop list 

		

		$query= $this->db->get_where($table, array('name' => $name));      

		return $query->row(); 	

}




function check_name($name , $table){
    $query= $this->db->get_where($table, array('name' => $name));      

        $count = $query->num_rows(); 

       If($count!=0){ return true; } else {return false;}

}

function check_name_page($page_id , $subpage){
    $query= $this->db->get_where('sub_pages', array('name' => $subpage,'page_id' => $page_id));      

        $count = $query->num_rows(); 

       If($count!=0){ return true; } else {return false;}

}




function check($id , $table){



    $query= $this->db->get_where($table, array('id' => $id));      



    



        $count = $query->num_rows(); 







       If($count!=0){



       return true;



       } else {



    return false;



     }



}




function find_url($url,$table){// for drop list 

        if ($url == NULL)

    {

        return NULL;

    }

        $this->db->escape($url);

    $this->db->where('url', $url);


    $query = $this->db->get($table);

    if ($query->num_rows() > 0){

        $result = $query->row();


         return $result;

    }else { 


         return false; 

    }



}



function getLatestItems($table,$limit,$sort,$order){
 
    $query=$this->db->select('*')

          ->from($table)

          ->order_by($sort, $order)

          ->limit($limit)

           ->get();

    return $query->result_array();  

}


}

?>