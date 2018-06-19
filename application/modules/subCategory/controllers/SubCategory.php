<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategory extends MY_Controller {

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

        // get all users
        $options = array('select' => '*, subcategory.status as subStatus', 'table' => 'subcategory', 'join' => array( array( 'category', 'category.categoryId = subcategory.categoryId', 'left' ) ) );
        $data['allsubCat'] = $this->front_model->customGet($options);

        $data['title'] = 'All Sub Category';
        $this->view_admintemplate('list_subcategory', $data);
    }

    public function add_subcategory(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('subCategoryName', 'Sub Category Name', 'required');

        if ($this->form_validation->run() == TRUE)
            {

                  $data = array(
                        'categoryId'       => $this->input->post('categoryId'),
                        'subCategoryName'  => $this->input->post('subCategoryName'),
                        'tier'             => $this->input->post('tier'),
                        'createdDatetime'  => date('Y-m-d h:i:s')
                    );

                   $options = array(
                        'table' => 'subcategory',
                        'data' => $data
                    );

                  $response = $this->front_model->customInsert($options);

                  if(count($response)){
                    $this->session->set_flashdata('success', 'Sub Category added successfully!');
                    redirect('subcategory');
                  }else{
                     $this->session->set_flashdata('error', 'some error while inserting into database!');
                     redirect('subcategory/add_subcategory');
                  }
            
            }
            else
            {
                   $this->add_subcategory();
            }
        }else{

            $data = array();

             // get all category
            $options = array('table' => 'category', 'where' => array('status' => 1) );
            $data['allcat'] = $this->front_model->customGet($options);

            $data['title'] = 'Add Sub Category';
            $this->view_admintemplate('add_subcategory', $data);

      }

    }



    public function edit_category(){

        if($this->is_admin() == false)
            redirect('admin');

        if(isset($_POST['submit'])){

        $this->form_validation->set_rules('categoryName', 'Category Name', 'required');

        if ($this->form_validation->run() == TRUE)
            {
              $id = $this->input->post('categoryId');
              $data = array(
                        'categoryName'                 => $this->input->post('categoryName')
                    );
                  
               $options = array(
                    'table' => 'category',
                    'data'  => $data,
                    'where' => array('categoryId' => $id)
                );

              $response = $this->front_model->customUpdate($options);

             // echo $this->db->last_query(); exit;

              if($response > 0){
                  $this->session->set_flashdata('success', 'Category updated successfully!');
                  redirect('category');
              }elseif($response == 0){
                 $this->session->set_flashdata('info', 'No update found!');
                 redirect('category');
              }else{
                 $this->session->set_flashdata('error', 'Error while updating user!');
                 redirect('category');
              }
            
            }
            else
            {
                    redirect('category');
            }
        }else{

          $cid = $this->uri->segment(3);

          if(isset($cid) &&  $cid != ''){
            $data = array();
            // get user
            $options = array('table' => 'category', 'where' => array('categoryId' => $cid), 'single' => true );

            $data['cat'] = $this->front_model->customGet($options);

            $data['title'] = 'Edit Category';
            $this->view_admintemplate('edit_category', $data);
          }else{
            redirect('category');
          }
      }

    }
    

}
