<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Main_content_model','front_model');
    }

    public function index()
    {
        if($this->is_admin() == true)
        redirect('admin/dashboard');
        $data = array();
        $this->load->view('admin/login', $data);
    }

    public function login()
    {   
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE)
            {
                   $userName = $this->input->post('username');
                   $passWord = $this->input->post('password');
                   $options = array(
                        'table' => 'admin',
                        'where' => array('admin_email' => $userName, 'admin_password' => md5($passWord))
                    );

                  $response = $this->front_model->customGet($options);
                  if(count($response)){
                    $this->session->set_userdata(array(
                            'adminId' => $response[0]->admin_id,
                            'adminEmail' => $response[0]->admin_id
                        ));
                    $this->session->set_flashdata('success', 'Admin login successfully!');
                    redirect('dashboard');
                  }else{
                     $this->session->set_flashdata('error', 'username or password not matched!');
                     $this->load->view('admin/login');
                  }
            }
            else
            {
                   $this->session->set_flashdata('error', 'Some error while login!');
                   $this->load->view('admin/common/login');
            }
    }

    public function dashboard()
    {   
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // Total user
        $query = "SELECT count('User_id') as totalUser FROM User WHERE User_id != 0";
        $data['User'] = $this->front_model->customQuery($query);



        $data['title'] = 'Dashbaord';
        $this->view_admintemplate('dashboard', $data);
    }

    public function logout(){
        session_destroy();
        $this->session->set_flashdata('success', 'Admin logout successfully!');
        redirect('admin/index');
    }

    public function users(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all users
        $options = array('table' => 'User');
        $data['alluser'] = $this->front_model->customGet($options);

        $data['title'] = 'All Users';
        $this->view_admintemplate('users_list', $data);
    }


     public function changepassword(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();
        $data['title'] = 'Change Password';
        $this->view_admintemplate('change_password', $data);
    }

    public function delete(){
        $deleteId       = $_POST['deleteId'];
        $deleteColumn   = $_POST['deleteColumn'];
        $table          = $_POST['table'];

        if(isset($deleteId ) && isset($deleteColumn ) && isset($table )){

           $this->db->delete( $table , array($deleteColumn => $deleteId)); 

             echo json_encode(array('status' => 1, 'msg' => 'Item deleted!'));
         
        }

    }

    public function updateMoreTable($id = NULL, $value =NULL){
      if($id != NULL && $value != NULL){
          $options = array(
                    'table' => 'Questions',
                    'where' => array('Questions_Template_Id' => $id),
                    'data'  => array('Status' => $value)
                  );

          $this->front_model->customUpdate( $options ); 
          return true;
         }else{
          return false;
      }
    }

    public function changeStatus(){
        $id             = $_POST['id'];
        $column         = $_POST['column'];
        $table          = $_POST['table'];
        $value          = $_POST['value'];


        if(isset($id ) && isset($column ) && isset($table ) && isset($value )){
            $options = array(
                'table' => $table,
                'where' => array($column => $id),
                'data'  => array('Status' => $value)
              );

            $this->front_model->customUpdate( $options ); 

            if($table == 'Template'){
              $this->updateMoreTable($id, $value);
            }

             echo json_encode(array('status' => 1, 'msg' => 'Status changed!'));
         
        }

    }

    function change_password() {
        if (isset($_POST['submit'])) {
            $options = array(
                'table' => 'admin',
                'where' => $where = array('admin_id' => $this->session->userdata('adminId'), 'admin_password' => md5($this->input->post('old_password')))
                );
            $check_password = $this->front_model->customGet($options);


            if (count($check_password) == 0) {

                $this->session->set_flashdata('error', 'Old Password does not match');
                redirect('change-password');

            } else {

                $options = array(
                        'table' => 'admin',
                        'where' => array('admin_id' => $this->session->userdata('adminId')),
                        'data'  => array('admin_password' => md5($this->input->post('new_password')))
                    );

                $is_update = $this->front_model->customUpdate($options);

                if(!$is_update){
                     $this->session->set_flashdata('info', 'There is no changes found in password!');
                     redirect('change-password');
                }else{
                //----------------Mail Start------------------//

                $message = '<h1>Question App</h1></b></b><p>Your password has been changed successfully Your Email = ' . $this->session->userdata('adminEmail') . '.</p>
            <p><a href="' . base_url() . '" [astyle]></a></p></b>,
            </b></b><p>The Admin</p>';

                $to = $this->session->userdata('adminEmail');
                $subject = 'Password Changed';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                $headers .= 'From: Actually<"hemant.ypsilon@gmail.com">' . "\r\n";
                mail($to, $subject, $message, $headers);

                //----------------Mail End------------------//

                $this->session->set_flashdata('success', 'Password successfully changed!');
                redirect('change-password');
             }
         }
        } else {
           $this->changepassword();
        }
    }

    public function addBike(){

         $this->load->helper(array('form', 'url')); 
        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('bike_name', 'Bike Name', 'required');

        if ($this->form_validation->run() == TRUE)
            {

           //   print_r($_FILES); exit;

              if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != ''){

                      $temp = explode('.',$_FILES["userfile"]['name']);
                      $extension = end($temp);
                      $config['upload_path'] = './uploads';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg';
                      $config['max_size'] = '8600';
                      $config['max_width']  = '2000';
                      $config['max_height']  = '2000';
                      $new_name = time().preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["userfile"]['name']).'.'.$extension;
                      $config['file_name'] = $new_name;
                      $this->load->library('upload');
                      $this->upload->initialize($config);

                      if ( ! $this->upload->do_upload())
                      {
                          $this->session->set_flashdata('error', $this->upload->display_errors());
                          redirect('add-bike');
                          exit;

                      }else{


                     $data = array(
                        'bike_name'                 => $this->input->post('bike_name'),
                        'bike_picture'              => $new_name,
                        'category'                  => $this->input->post('category'),
                        'build_year'                => $this->input->post('build_year'),
                        'cc'                        => $this->input->post('cc'),
                        'capacity'                 => $this->input->post('capacity'),
                        'discription'               => $this->input->post('discription'),
                        'rental_charge'             => $this->input->post('rental_charge'),
                        'security_deposite'         => $this->input->post('security_deposite'),
                        'rating'                    => $this->input->post('rating'),
                        'available'                 => $this->input->post('available'),
                        'created_at'                => date('Y-m-d h:i:s')
                    );

                   $options = array(
                        'table' => 'bikes',
                        'data' => $data
                    );

                  $response = $this->front_model->customInsert($options);

                  if(count($response)){
                    $this->session->set_flashdata('success', 'Bike added successfully!');
                    redirect('add-bike');
                  }else{
                     $this->session->set_flashdata('error', 'some error while inserting into database!');
                     redirect('add-bike');
                  }
                }
              }else{
                die('not selected');
                 $this->session->set_flashdata('error', 'File not selected!');
                redirect('add-bike');
              }
            }
            else
            {
                   $this->addBike();
            }
        }else{

            $data = array();
            $data['title'] = 'Add Bike';
            $this->view_admintemplate('add_bike', $data);

      }

    }

    public function allBikes(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all category
        $options = array('table' => 'bikes', 'order' => array('id' => 'DESC'));
        $data['all_bikes'] = $this->front_model->customGet($options);

       // echo $this->last_query(); exit;

        $data['title'] = 'All Bikes';
        $this->view_admintemplate('bike_list', $data);
    }


   public function allScooter(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all category
        $options = array('table' => 'bikes', 'where' => array('category' => 2), 'order' => array('id' => 'DESC', 'category' => 2));
        $data['all_bikes'] = $this->front_model->customGet($options);

       // echo $this->last_query(); exit;

        $data['title'] = 'All Scooter';
        $this->view_admintemplate('scooter_list', $data);
    }


      public function editScooter(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

          $this->form_validation->set_rules('bike_name', 'Bike Name', 'required');

           if ($this->form_validation->run() == TRUE)
            {

              $bike_id = $this->input->post('bike_id');
              $data = array(
                        'bike_name'                 => $this->input->post('bike_name'),
                        'category'                  => $this->input->post('category'),
                        'build_year'                => $this->input->post('build_year'),
                        'cc'                        => $this->input->post('cc'),
                        'capacity'                 => $this->input->post('capacity'),
                        'discription'               => $this->input->post('discription'),
                        'rental_charge'             => $this->input->post('rental_charge'),
                        'security_deposite'         => $this->input->post('security_deposite'),
                        'rating'                    => $this->input->post('rating'),
                        'available'                 => $this->input->post('available'),
                        'updated_at'                => date('Y-m-d h:i:s')
                    );


                if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != ''){
                      $temp = explode('.',$_FILES["userfile"]['name']);
                      $extension = end($temp);
                      $config['upload_path'] = './uploads';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg';
                      $config['max_size'] = '8600';
                      $config['max_width']  = '2000';
                      $config['max_height']  = '2000';
                      $new_name = time().preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["userfile"]['name']).'.'.$extension;
                      $config['file_name'] = $new_name;
                      $this->load->library('upload');
                      $this->upload->initialize($config);

                      if ( ! $this->upload->do_upload())
                      {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                             redirect('all-scooter');
                          exit;

                      }
                      else
                      {
                          
                        $data['bike_picture'] = $new_name;
                            
                      }

                 }


               $options = array(
                    'table' => 'bikes',
                    'data'  => $data,
                    'where' => array('id' => $bike_id)
                );

              $response = $this->front_model->customUpdate($options);

             // echo $this->db->last_query(); exit;

              if($response > 0){
                  $this->session->set_flashdata('success', 'Sccoter updated successfully!');
                  redirect('all-scooter');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('all-scooter');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                 redirect('all-scooter');
              }
          }else{

            $this->session->set_flashdata('error', 'You miss something!');
            redirect('all-scooter');

          }
            
        }else{

          $bikeid = $this->uri->segment(2);

          if(isset($bikeid) &&  $bikeid != ''){
            $data = array();
            // get user
            $options = array('table' => 'bikes', 'where' => array('id' => $bikeid), 'single' => true );
            $data['bike'] = $this->front_model->customGet($options);

            $data['title'] = 'Edit Sccoter';
            $this->view_admintemplate('edit_scooter', $data);
          }else{
            redirect('all-scooter');
          }

      }
    }



    public function allMotorbike(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all category
        $options = array('table' => 'bikes', 'where' => array('category' => 1),  'order' => array('id' => 'DESC', 'category' => 1));
        $data['all_bikes'] = $this->front_model->customGet($options);

       // echo $this->last_query(); exit;

        $data['title'] = 'All Motorbike';
        $this->view_admintemplate('motorbike_list', $data);
    }


    public function editMotorbike(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

          $this->form_validation->set_rules('bike_name', 'Bike Name', 'required');

           if ($this->form_validation->run() == TRUE)
            {

              $bike_id = $this->input->post('bike_id');
              $data = array(
                        'bike_name'                 => $this->input->post('bike_name'),
                        'category'                  => $this->input->post('category'),
                        'build_year'                => $this->input->post('build_year'),
                        'cc'                        => $this->input->post('cc'),
                        'capacity'                 => $this->input->post('capacity'),
                        'discription'               => $this->input->post('discription'),
                        'rental_charge'             => $this->input->post('rental_charge'),
                        'security_deposite'         => $this->input->post('security_deposite'),
                        'rating'                    => $this->input->post('rating'),
                        'available'                 => $this->input->post('available'),
                        'updated_at'                => date('Y-m-d h:i:s')
                    );


                if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != ''){
                      $temp = explode('.',$_FILES["userfile"]['name']);
                      $extension = end($temp);
                      $config['upload_path'] = './uploads';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg';
                      $config['max_size'] = '8600';
                      $config['max_width']  = '2000';
                      $config['max_height']  = '2000';
                      $new_name = time().preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["userfile"]['name']).'.'.$extension;
                      $config['file_name'] = $new_name;
                      $this->load->library('upload');
                      $this->upload->initialize($config);

                      if ( ! $this->upload->do_upload())
                      {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                             redirect('all-motorbike');
                          exit;

                      }
                      else
                      {
                          
                        $data['bike_picture'] = $new_name;
                            
                      }

                 }


               $options = array(
                    'table' => 'bikes',
                    'data'  => $data,
                    'where' => array('id' => $bike_id)
                );

              $response = $this->front_model->customUpdate($options);

             // echo $this->db->last_query(); exit;

              if($response > 0){
                  $this->session->set_flashdata('success', 'Motorbike updated successfully!');
                  redirect('all-motorbike');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('all-motorbike');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                 redirect('all-motorbike');
              }
          }else{

            $this->session->set_flashdata('error', 'You miss something!');
            redirect('all-motorbike');

          }
            
        }else{

          $bikeid = $this->uri->segment(2);

          if(isset($bikeid) &&  $bikeid != ''){
            $data = array();
            // get user
            $options = array('table' => 'bikes', 'where' => array('id' => $bikeid), 'single' => true );
            $data['bike'] = $this->front_model->customGet($options);

            $data['title'] = 'Edit Motorbike';
            $this->view_admintemplate('edit_motorbike', $data);
          }else{
            redirect('all-motorbike');
          }

      }
    }


     public function editBicycles(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

          $this->form_validation->set_rules('bike_name', 'Bike Name', 'required');

           if ($this->form_validation->run() == TRUE)
            {

              $bike_id = $this->input->post('bike_id');
              $data = array(
                        'bike_name'                 => $this->input->post('bike_name'),
                        'category'                  => $this->input->post('category'),
                        'build_year'                => $this->input->post('build_year'),
                        'cc'                        => $this->input->post('cc'),
                        'capacity'                 => $this->input->post('capacity'),
                        'discription'               => $this->input->post('discription'),
                        'rental_charge'             => $this->input->post('rental_charge'),
                        'security_deposite'         => $this->input->post('security_deposite'),
                        'rating'                    => $this->input->post('rating'),
                        'available'                 => $this->input->post('available'),
                        'updated_at'                => date('Y-m-d h:i:s')
                    );


                if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != ''){
                      $temp = explode('.',$_FILES["userfile"]['name']);
                      $extension = end($temp);
                      $config['upload_path'] = './uploads';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg';
                      $config['max_size'] = '8600';
                      $config['max_width']  = '2000';
                      $config['max_height']  = '2000';
                      $new_name = time().preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["userfile"]['name']).'.'.$extension;
                      $config['file_name'] = $new_name;
                      $this->load->library('upload');
                      $this->upload->initialize($config);

                      if ( ! $this->upload->do_upload())
                      {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                             redirect('all-bicycles');
                          exit;

                      }
                      else
                      {
                          
                        $data['bike_picture'] = $new_name;
                            
                      }

                 }


               $options = array(
                    'table' => 'bikes',
                    'data'  => $data,
                    'where' => array('id' => $bike_id)
                );

              $response = $this->front_model->customUpdate($options);

             // echo $this->db->last_query(); exit;

              if($response > 0){
                  $this->session->set_flashdata('success', 'Bicycle updated successfully!');
                  redirect('all-bicycles');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('all-bicycles');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                 redirect('all-bicycles');
              }
          }else{

            $this->session->set_flashdata('error', 'You miss something!');
            redirect('all-bicycles');

          }
            
        }else{

          $bikeid = $this->uri->segment(2);

          if(isset($bikeid) &&  $bikeid != ''){
            $data = array();
            // get user
            $options = array('table' => 'bikes', 'where' => array('id' => $bikeid), 'single' => true );
            $data['bike'] = $this->front_model->customGet($options);

            $data['title'] = 'Edit Bicycle';
            $this->view_admintemplate('edit_bicycle', $data);
          }else{
            redirect('all-bicycles');
          }

      }
    }



    public function allBicycle(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all category
        $options = array('table' => 'bikes', 'where' => array('category' => 3), 'order' => array('id' => 'DESC', 'category' => 3));
        $data['all_bikes'] = $this->front_model->customGet($options);

       // echo $this->last_query(); exit;

        $data['title'] = 'All Bicycle';
        $this->view_admintemplate('bicycles_list', $data);
    }


    public function allAvailableBikes(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all category
        $options = array('table' => 'bikes', 'where' => array('available' => 1), 'order' => array('id' => 'DESC', 'available' => 1));
        $data['all_bikes'] = $this->front_model->customGet($options);

       // echo $this->last_query(); exit;

        $data['title'] = 'All Available Bikes';
        $this->view_admintemplate('available_bike_list', $data);
    }







    public function editBike(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

          $this->form_validation->set_rules('bike_name', 'Bike Name', 'required');

           if ($this->form_validation->run() == TRUE)
            {

              $bike_id = $this->input->post('bike_id');
              $data = array(
                        'bike_name'                 => $this->input->post('bike_name'),
                        'category'                  => $this->input->post('category'),
                        'build_year'                => $this->input->post('build_year'),
                        'cc'                        => $this->input->post('cc'),
                        'capacity'                 => $this->input->post('capacity'),
                        'discription'               => $this->input->post('discription'),
                        'rental_charge'             => $this->input->post('rental_charge'),
                        'security_deposite'         => $this->input->post('security_deposite'),
                        'rating'                    => $this->input->post('rating'),
                        'available'                 => $this->input->post('available'),
                        'updated_at'                => date('Y-m-d h:i:s')
                    );


                if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != ''){
                      $temp = explode('.',$_FILES["userfile"]['name']);
                      $extension = end($temp);
                      $config['upload_path'] = './uploads';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg';
                      $config['max_size'] = '8600';
                      $config['max_width']  = '2000';
                      $config['max_height']  = '2000';
                      $new_name = time().preg_replace("/[^a-zA-Z0-9]/", "", $_FILES["userfile"]['name']).'.'.$extension;
                      $config['file_name'] = $new_name;
                      $this->load->library('upload');
                      $this->upload->initialize($config);

                      if ( ! $this->upload->do_upload())
                      {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                             redirect('all-bikes');
                          exit;

                      }
                      else
                      {
                          
                        $data['bike_picture'] = $new_name;
                            
                      }

                 }


               $options = array(
                    'table' => 'bikes',
                    'data'  => $data,
                    'where' => array('id' => $bike_id)
                );

              $response = $this->front_model->customUpdate($options);

             // echo $this->db->last_query(); exit;

              if($response > 0){
                  $this->session->set_flashdata('success', 'Bike updated successfully!');
                  redirect('all-bikes');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('all-bikes');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                 redirect('all-bikes');
              }
          }else{

            $this->session->set_flashdata('error', 'You miss something!');
            redirect('all-bikes');

          }
            
        }else{

          $bikeid = $this->uri->segment(2);

          if(isset($bikeid) &&  $bikeid != ''){
            $data = array();
            // get user
            $options = array('table' => 'bikes', 'where' => array('id' => $bikeid), 'single' => true );
            $data['bike'] = $this->front_model->customGet($options);

            $data['title'] = 'Edit Bike';
            $this->view_admintemplate('edit_bike', $data);
          }else{
            redirect('all-bikes');
          }

      }
    }

    function chnageOrder(){
       $sectionids = $_POST['sectionsid'];
        $count = 1;
        if (is_array($sectionids)) {
            foreach ($sectionids as $sectionid) {
                $query  = "Update Category SET Category_OrderDisplay = $count";
                $query .= " WHERE Category_Id='".$sectionid."'";
               
                 $this->db->query($query,$single = false, $updDelete = true);
               
                $count++;
            }
           
            echo '{"status":"success"}';
        } else {
            echo '{"status":"failure", "message":"No Update happened. Could be an internal error, please try again."}';
        }
    }


      public function setting(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('shop_name', 'Shop name', 'required');

        if ($this->form_validation->run() == TRUE)
            {

                     $data = array(
                        'shop_name'        => $this->input->post('shop_name'),
                        'shop_address'     => $this->input->post('shop_address'),
                        'shop_telephon'     => $this->input->post('shop_telephon'),
                        'terms'             => $this->input->post('terms'),
                        'about'             => $this->input->post('about'),
                        'created_at'        => date('Y-m-d h:i:s')
                    );

                   $options = array(
                        'table' => 'shop',
                        'data' =>  $data,
                        'where' => array('id' => 1)
                    );

                  $response = $this->front_model->customUpdate($options);

                  if(count($response)){
                    $this->session->set_flashdata('success', 'Shop updated successfully!');
                    redirect('shop-setting');
                  }else{
                     $this->session->set_flashdata('error', 'some error while updating database!');
                     redirect('shop-setting');
                  }
                }else
                 {
                   $this->setting();
            }
        }else{

            $data = array();
            // get user
            $options = array('table' => 'shop', 'where' => array('id' => 1), 'single' => true );
            $data['shop'] = $this->front_model->customGet($options);

            $data['title'] = 'Shop Setting';
            $this->view_admintemplate('shop', $data);
         
      }

  }


   function currentRents(){
       if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        $currentdate = date('Y-m-d');
        // get all category
        $query = "SELECT * FROM `rent` WHERE `date` = '$currentdate' ";
        $data['current_rent'] = $this->front_model->customQuery($query);

        $data['title'] = 'Current Rent';
        $this->view_admintemplate('current_rent', $data);

  }


     function pastRents(){
       if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        $currentdate = date('Y-m-d');
        // get all category
        $query = "SELECT * FROM `rent` WHERE `date` < '$currentdate' ";
        $data['past_rent'] = $this->front_model->customQuery($query);

        
        $data['title'] = 'Current Rent';
        $this->view_admintemplate('past_rent', $data);

  }
}
