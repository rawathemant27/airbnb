<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    /**
     * service controller page.
     * @package	clinicApp
     * @category service controller
     */
    function __construct() {
        parent::__construct();
    }

    

    public function how_it_work(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('how_it_work', 'How it work', 'required');

        if ($this->form_validation->run() == TRUE)
            {
                   $how_it_work = $this->input->post('how_it_work');
                   $data = array(
                        'how_it_work'                 => $this->input->post('how_it_work')
                    );
                  
                  $options = array(
                    'table' => 'general_pages',
                    'data'  => $data,
                    'where' => array('general_pages_id' => 1)
                   );

                   $response = $this->front_model->customUpdate($options);

              if($response > 0){
                  $this->session->set_flashdata('success', 'Content updated successfully!');
                  redirect('pages/how_it_work');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('pages/how_it_work');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                redirect('pages/how_it_work');
              }
            
            }
            else
            {
                    redirect('pages/how_it_work');
            }
        }else{

            $data = array();
            // get user
            $options = array('table' => 'general_pages', 'where' => array('general_pages_id' => 1), 'single' => true );

            $data['how'] = $this->front_model->customGet($options);

            $data['title'] = 'How it work';
            $this->view_admintemplate('how_it_work', $data);
          
      }

    }




    public function about_us(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('about_us', 'About us', 'required');

        if ($this->form_validation->run() == TRUE)
            {
                   $data = array(
                        'about_us'   => $this->input->post('about_us')
                    );
                  
                  $options = array(
                    'table' => 'general_pages',
                    'data'  => $data,
                    'where' => array('general_pages_id' => 1)
                   );

                   $response = $this->front_model->customUpdate($options);

              if($response > 0){
                  $this->session->set_flashdata('success', 'Content updated successfully!');
                  redirect('pages/about_us');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('pages/about_us');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                redirect('pages/about_us');
              }
            
            }
            else
            {
                    redirect('pages/about_us');
            }
        }else{

            $data = array();
            // get user
            $options = array('table' => 'general_pages', 'where' => array('general_pages_id' => 1), 'single' => true );

            $data['about'] = $this->front_model->customGet($options);

            $data['title'] = 'About us';
            $this->view_admintemplate('about_us', $data);
          
      }

    }
    
    
    

}
