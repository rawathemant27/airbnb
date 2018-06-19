<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    /**
     * service controller page.
     * @package	clinicApp
     * @category service controller
     */
    function __construct() {
        parent::__construct();
    }

    
    function index(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // Total user
        $query = "SELECT count('userId') as totalUser FROM users WHERE userId != 0";
        $data['User'] = $this->front_model->customQuery($query, false);

        // Total order
        $query = "SELECT count('order_id') as totalOrder FROM order_detail WHERE order_id != 0";
        $data['Order'] = $this->front_model->customQuery($query, false);

        // Total category
        $query = "SELECT count('categoryId') as totalC FROM category WHERE categoryId != 0";
        $data['cat'] = $this->front_model->customQuery($query, false);

        // Total subcategory
        $query = "SELECT count('subCategoryId') as totalSubC FROM subcategory WHERE subCategoryId != 0";
        $data['subCat'] = $this->front_model->customQuery($query, false);

        // Total credit points
        $query = "SELECT SUM(credits) as TotalCredits FROM item WHERE itemId != 0";
        $data['credits'] = $this->front_model->customQuery($query, false);

        //number of item uploads

        // today
        $sql="SELECT count(itemId) as todayItem FROM item WHERE createdDatetime > DATE_SUB(NOW(), INTERVAL 1 Day)"; 
        $data['todayItem'] = $this->front_model->customQuery($sql, false);

         // week
        $sql="SELECT count(itemId) as weekItem FROM item WHERE createdDatetime > DATE_SUB(NOW(), INTERVAL 6 Day)"; 
        $data['weekItem'] = $this->front_model->customQuery($sql, false);

         // month
        $sql="SELECT count(itemId) as monthItem FROM item WHERE createdDatetime > DATE_SUB(NOW(), INTERVAL 31 Day)"; 
        $data['monthItem'] = $this->front_model->customQuery($sql, false);

         // year
        $sql="SELECT count(itemId) as yearItem FROM item WHERE createdDatetime > DATE_SUB(NOW(), INTERVAL 365 Day)"; 
        $data['yearItem'] = $this->front_model->customQuery($sql, false);



        //number of item successfully item

        // today
        $sql="SELECT count(order_id) as todayItemSwap FROM order_detail WHERE order_date > DATE_SUB(NOW(), INTERVAL 1 Day)"; 
        $data['todayItemSwap'] = $this->front_model->customQuery($sql, false);

         // week
         $sql="SELECT count(order_id) as weekItemSwap FROM order_detail WHERE order_date > DATE_SUB(NOW(), INTERVAL 6 Day)"; 
        $data['weekItemSwap'] = $this->front_model->customQuery($sql, false);

         // month
         $sql="SELECT count(order_id) as monthItemSwap FROM order_detail WHERE order_date > DATE_SUB(NOW(), INTERVAL 31 Day)"; 
        $data['monthItemSwap'] = $this->front_model->customQuery($sql, false);

         // year
        $sql="SELECT count(order_id) as yearItemSwap FROM order_detail WHERE order_date > DATE_SUB(NOW(), INTERVAL 365 Day)"; 
        $data['yearItemSwap'] = $this->front_model->customQuery($sql, false);


        $data['title'] = 'Dashbaord';
        $this->view_admintemplate('dashboard', $data);
    }


   public function changepassword(){
        if($this->is_admin() == false)
        redirect('admin');
        $data = array();
        $data['title'] = 'Change Password';
        $this->view_admintemplate('change_password', $data);
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
                redirect('dashboard/changepassword');

            } else {

                $options = array(
                        'table' => 'admin',
                        'where' => array('admin_id' => $this->session->userdata('adminId')),
                        'data'  => array('admin_password' => md5($this->input->post('new_password')))
                    );

                $is_update = $this->front_model->customUpdate($options);

                if(!$is_update){
                     $this->session->set_flashdata('info', 'There is no changes found in password!');
                     redirect('dashboard/changepassword');
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
                redirect('dashboard/changepassword');
             }
         }
        } else {
           $this->changepassword();
        }
    }


    public function edit_fees(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('fees', 'Transaction Fees', 'required');

        if ($this->form_validation->run() == TRUE)
            {

              $data = array(
                        'fees'  => $this->input->post('fees')
                    );
                  
               $options = array(
                    'table' => 'transaction_fees',
                    'data'  => $data,
                    'where' => array('id' => 1)
                );

              $response = $this->front_model->customUpdate($options);

             // echo $this->db->last_query(); exit;

              if($response > 0){
                  $this->session->set_flashdata('success', 'Transaction updated successfully!');
                 redirect('dashboard/edit_fees');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                redirect('dashboard/edit_fees');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating Fees!');
                 redirect('dashboard/edit_fees');
              }
            
            }
            else
            {
                     redirect('dashboard/edit_fees');
            }
        }else{

            $data = array();
            // get user
            $options = array('table' => 'transaction_fees', 'where' => array('id' => 1), 'single' => true );
            $data['t_fees'] = $this->front_model->customGet($options);

            $data['title'] = 'Setting';
            $this->view_admintemplate('setting', $data);
          
      }

    }
    

}
