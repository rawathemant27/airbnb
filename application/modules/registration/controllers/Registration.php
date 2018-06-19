<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

    /**
     * service controller page.
     * @package	clinicApp
     * @category service controller
     */
    function __construct() {
        parent::__construct();
    }

    
    function index(){
        $data = array();

        // get all category
        $options = array('table' => 'category', 'where' => array('status' => 1) );
        $data['allcat'] = $this->front_model->customGet($options);

        $data['title'] = 'Registration'; 
        $this->tmpl_rander('registration',$data);
    }


   public function signUp(){

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('fullName', 'Full Name', 'required');

        if ($this->form_validation->run() == TRUE)
            {

              

                 // check email id already exist
                 $email = $this->input->post('email');
                 $password = $this->input->post('password');
                 $hash = md5( rand(0,1000) ); 
                 $categoryId = implode(',', $this->input->post('categoryId'));
                 $marketing_pre = implode(',', $this->input->post('marketing_pre'));
                 $ifOthere = $this->input->post('other');


                 $query = "SELECT userId FROM users WHERE email = '".$email."'  ";
                 if($this->front_model->customQueryCount($query)){
                     $this->session->set_flashdata('error', 'Email id already exist!');
                     redirect('registration');
                     exit;
                 }

                  $data = array(
                        'name'            => $this->input->post('fullName'),
                        'email'           => $this->input->post('email'),
                        'paypal_id'           => $this->input->post('paypal_id'),
                        'hash'            => $hash,
                        'phone'           => $this->input->post('mobile'),
                        'password'        => md5($this->input->post('password')),
                        'address'         => $this->input->post('address'),
                        'categoryId'      => $categoryId,
                        'bio'             => $this->input->post('bio'),
                        'marketing_pre'   => $marketing_pre,
                        'hear_about_us'   => $this->input->post('hear_about_us'),
                        'ifOthere'        => isset($ifOthere) && $ifOthere != '' ? $ifOthere : '',
                        'createdDatetime' => date('Y-m-d h:i:s'),
                        'city'            => $this->input->post('city'),
                        'state'           => $this->input->post('state'),
                        'country'         => $this->input->post('country'),
                        'post_code'       => $this->input->post('post_code')
                    
                    );

                   $options = array(
                        'table'  => 'users',
                        'data'   => $data,
                        'single' => true
                    );

                  $response = $this->front_model->customInsert($options);

                  if(count($response)){

                    // verification mail
                    $mailData = array('email' => $email, 'hash' =>$hash, 'password' => $password);
                    $isSend = $this->front_model->sendMail($mailData);

                    if($isSend){
                         $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                     }else{
                         $msg = 'Your account has been made, <br /> please contact to admin to verify account';
                     }

                    $this->session->set_flashdata('success', "$msg");
                    redirect('home');
                    
                  }else{
                     $this->session->set_flashdata('error', 'some error while inserting into database!');
                      redirect('registration');
                  }
            
            }
            else
            {
                   $this->registration();
            }
        }else{
            
             redirect('registration');

      }

    }
    

}
