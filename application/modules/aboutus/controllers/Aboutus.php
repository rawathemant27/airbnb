<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends MY_Controller {

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
        // page data
        $options = array('table' => 'general_pages', 'where' => array('general_pages_id' => 1), 'single' => true );
        $data['pagesdata'] = $this->front_model->customGet($options);

        $data['title'] = 'About Us'; 
        $this->tmpl_rander('aboutus',$data);
    }
    

}
