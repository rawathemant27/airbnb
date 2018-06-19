<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {

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
        $data['title'] = 'Help'; 
        $this->tmpl_rander('help',$data);
    }

    function how_it_work(){
        $data = array();
        // page data
        $options = array('table' => 'general_pages', 'where' => array('general_pages_id' => 1), 'single' => true );
        $data['pagesdata'] = $this->front_model->customGet($options);

        $data['title'] = 'How it work'; 
        $this->tmpl_rander('how_it_work',$data);
    }
    
    

}
