<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Host extends MY_Controller {

    /**
     * service controller page.
     * @package	clinicApp
     * @category service controller
     */
    function __construct() {
        parent::__construct();
    }

    
    function index(){
        if($this->is_user() == false)
        redirect('home');

        $data = array();
        $data['title'] = 'Become a Host and Rent Out Your Room, House or Appartment on airbnb'; 
        $this->tmpl_rander('become_host',$data);
    }


     function room(){
        if($this->is_user() == false)
        redirect('home');

        $data = array();
        $data['title'] = 'Edit place type for your Airbnb listing'; 
        $this->tmpl_rander('room',$data);
    }

}
