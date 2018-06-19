<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

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
        // get all blog
        $options = array('table' => 'blog', 'where' => array('Status'  => 1));
        $data['allblog'] = $this->front_model->customGet($options);

        $data['title'] = 'Blog'; 
        $this->tmpl_rander('blog',$data);
    }



    function single(){

        $blog_id = $this->uri->segment(3);

        if(isset($blog_id) &&  $blog_id != ''){

        $data = array();

         // get single blog
        $options = array('table' => 'blog', 'where' => array('blog_id' => $blog_id), 'single' => true );

        $data['blog'] = $this->front_model->customGet($options);

        $data['title'] = 'Blog Detail'; 
        $this->tmpl_rander('single_blog',$data);

      }else{
        $this->session->set_flashdata('error', ' ');
          redirect('blog/add_blog');
      }
    }

    function all_blog(){
       if($this->is_admin() == false)
        redirect('admin');
        $data = array();

        // get all users
        $options = array('table' => 'blog');
        $data['allblog'] = $this->front_model->customGet($options);

        $data['title'] = 'All Blog';
        $this->view_admintemplate('list_blog', $data);
    }

    function add_blog(){
        $data = array();
        $data['title'] = 'Add Blog'; 
        $this->view_admintemplate('add_blog', $data);
    }


    public function addblog(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('blog_title', 'Blog title', 'required');

        if ($this->form_validation->run() == TRUE)
            {

                  $data = array(
                        'blog_title'                 => $this->input->post('blog_title'),
                         'blog_body'                 => $this->input->post('blog_body'),
                        'blog_createdDateTime'                => date('Y-m-d h:i:s')
                    );

                   $options = array(
                        'table' => 'blog',
                        'data' => $data
                    );

                  $response = $this->front_model->customInsert($options);

                  if(count($response)){
                    $this->session->set_flashdata('success', 'Blog added successfully!');
                    redirect('blog/all_blog');
                  }else{
                     $this->session->set_flashdata('error', 'some error while inserting into database!');
                     redirect('blog/add_blog');
                  }
            
            }
            else
            {
                   $this->addblog();
            }
        }else{

            redirect('blog/add_blog');

      }

    }


        public function edit_blog(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('blog_title', 'Blog title', 'required');

        if ($this->form_validation->run() == TRUE)
            {
                   $blog_id = $this->input->post('blog_id');
                   $data = array(
                        'blog_title'                 => $this->input->post('blog_title'),
                         'blog_body'                 => $this->input->post('blog_body')
                    );
                  
                  $options = array(
                    'table' => 'blog',
                    'data'  => $data,
                    'where' => array('blog_id' => $blog_id)
                   );

                   $response = $this->front_model->customUpdate($options);

              if($response > 0){
                  $this->session->set_flashdata('success', 'Blog updated successfully!');
                  redirect('blog/all_blog');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('blog/all_blog');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                 redirect('blog/all_blog');
              }
            
            }
            else
            {
                    redirect('blog/all_blog');
            }
        }else{

          $blog_id = $this->uri->segment(3);

          if(isset($blog_id) &&  $blog_id != ''){
            $data = array();
            // get user
            $options = array('table' => 'blog', 'where' => array('blog_id' => $blog_id), 'single' => true );

            $data['blog'] = $this->front_model->customGet($options);

            $data['title'] = 'Edit Blog';
            $this->view_admintemplate('edit_blog', $data);
          }else{
            redirect('blog/all_blog');
          }
      }

    }
    
    

}
