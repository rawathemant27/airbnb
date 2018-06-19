<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends MY_Controller {

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
        $data['title'] = 'Contactus'; 
        $this->tmpl_rander('contactus',$data);
    }
    

}
