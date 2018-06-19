<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

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
        $options = array('table' => 'users');
        $data['alluser'] = $this->front_model->customGet($options);

        $data['title'] = 'All Users';
        $this->view_admintemplate('users_list', $data);
    }

}
