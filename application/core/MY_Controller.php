<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('main_content_model', 'front_model');
    }


    public function profileData($userId = null){

      if($userId != null){
         $options = array('table' => 'users', 'where' => array('userId' => $userId), 'single' => true);
        $userdata = $this->front_model->customGet($options);
        if(!empty($userdata)){
          return $userdata;
        }else{
          return false;
        }
      }else{
        return false;
      }

    }


    function tmpl_rander($main_content_file, $data){
     // $data = array();
      //get user data
      if($this->is_user()){
        $userId = $_SESSION['userId'];
        $options = array('table' => 'users', 'where' => array('userId' => $userId), 'single' => true);
        $data['userdata'] = $this->front_model->customGet($options);
      }

      //get all category
      $options = array('table' => 'category', 'where' => array('status' => 1) );
      $data['allcat'] = $this->front_model->customGet($options);

      

      // user credit
      $data['totalcredit'] = 0;
      if($this->is_user()){
         $userId = $_SESSION['userId'];
         $options = array('select' => 'SUM(credits) as totalcredit', 'table' => 'item', 'where' => array('userId' => $userId ), 'single' => true );
         $creditData = $this->front_model->customGet($options);
         $data['totalcredit'] = $creditData->totalcredit;
      }


        // transaction fees
         $data['transaction_fees'] = 0;
         $options = array('select' => 'fees', 'table' => 'transaction_fees', 'where' => array('id' => 1), 'single' => true );
         $tdata = $this->front_model->customGet($options);
         $data['transaction_fees'] = $tdata->fees;

       // cart item
      $data['itemInCart'] = 0;
      if($this->is_user()){
         $userId = $_SESSION['userId'];
         $options = array('select' => 'count(basketId) as totalItem', 'table' => 'basket', 'where' => array('userId' => $userId ), 'single' => true);
         $cartData = $this->front_model->customGet($options);
         $data['itemInCart'] = $cartData->totalItem;
      }

    	$this->load->view('include/header',$data);
    	$this->load->view($main_content_file);
    	$this->load->view('include/footer',$data);
    	
    }

      public function view_admintemplate($file = NULL, $data = NULL, $script = NULL){
         
          //print_r($userData);
          if($script != NULL)
          $this->load->view("$script");
          $this->load->view('admin_include/header.php', $data);
          $this->load->view('admin_include/sidebar.php', $data);
          if($file  != NULL)
          $this->load->view($file, $data );
          $this->load->view('admin_include/footer.php', $data );
      }


    
    function is_admin(){
        if(isset($_SESSION['adminId'])){
            return true;
        }else{
            return false;
        }
    }

    function is_user(){
        if(isset($_SESSION['userId'])){
            return true;
        }else{
            return false;
        }
    }


    function last_query(){
        return $this->db->last_query();
    }

    function uploadImag($image = NULL, $folder = NULL, $name = NULL){
      //  echo $image['ProductsStore_ProfileImage']['name']; exit;
         if($image != NULL && $folder != NULL && $name != NULL){
                  $temp = explode('.',$image[$name]['name']);
                  $extension = end($temp);
                  $config['upload_path'] = './images/'.$folder.'/';
                  $config['allowed_types'] = 'gif|jpg|png|jpeg';
                  $config['max_size'] = '8600';
                  $config['max_width']  = '2000';
                  $config['max_height']  = '2000';
                  $new_name = time().preg_replace("/[^a-zA-Z0-9]/", "", $image[$name]['name']).'.'.$extension;
                  $config['file_name'] = $new_name;
                  $this->load->library('upload');
                  $this->upload->initialize($config);
                  $error = array();

                if ( ! $this->upload->do_upload($name)) {
                          $error = array('error' => $this->upload->display_errors());
                }


                if(count($error)){
                    return array('status' => 0, 'error' => $error);
                }else{
                    return  array('status' => 1, 'name' => $new_name);
                }

            }else{

            return false;
        }
    }


}
