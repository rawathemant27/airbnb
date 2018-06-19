<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends MY_Controller {

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
        $data['title'] = 'Wishlist'; 
        $this->tmpl_rander('wishlist',$data);
    }
    

}
