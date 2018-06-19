<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Itemlist extends MY_Controller {

    /**
     * service controller page.
     * @package	clinicApp
     * @category service controller
     */
    function __construct() {
        parent::__construct();
    }

    
    function index(){
        redirect('home');
    }
    

    function byid(){
        $cateId = $this->uri->segment(3);
        if(!isset($cateId) || $cateId == '' || $cateId == 0){
            redirect('home');
        }else{

            $data = array();

            // get all users
            $options = array(
                'select' => '*, item.name as itemName',
                'table' => 'item',
                'join'  => array( array('itemimages', 'itemimages.itemId = item.itemId', 'inner'), array('category', 'category.categoryId = item.categoryId', 'inner') ),
                'group' => array('item.itemId'),
                'where' => array('item.status' => 1, 'item.categoryId' => $cateId),
                );

            $data['productList'] = $this->front_model->customGet($options);

            // get all category
            $query = 'SELECT *, (SELECT COUNT(item.itemId) FROM item WHERE item.categoryId = category.categoryId )  AS NumberOfProduct FROM category  where status = 1 order by NumberOfProduct DESC LIMIT 10 ';
            $data['categoryData'] = $this->front_model->customQuery($query);


            $data['title'] = 'all item'; 
            $this->tmpl_rander('itemlist',$data);

        }

    }


    function bykeyword(){

        $q = $_GET['q'];

        if(!isset($q) || $q == '' || $q === 0){
            redirect('home');
        }else{
            $data = array();
            // get all users
            $searchQuery = 'SELECT *, `item`.`name` as `itemName` FROM `item` LEFT JOIN `itemimages` ON `itemimages`.`itemId` = `item`.`itemId` LEFT JOIN `category` ON `category`.`categoryId` = `item`.`categoryId` LEFT JOIN `users` ON `users`.`userId` = `item`.`userId` WHERE ( `item`.`status` = 1 ) AND (`item`.`tier` = "'.$q.'" OR `users`.`name` = "'.$q.'" OR `item`.`estimateDelivery` = "'.$q.'" OR `category`.`categoryName` = "'.$q.'") GROUP BY `item`.`itemId`';

            $data['productList'] = $this->front_model->customQuery($searchQuery);

          //  echo $this->db->last_query(); exit;

            // get all category
            $query = 'SELECT *, (SELECT COUNT(item.itemId) FROM item WHERE item.categoryId = category.categoryId )  AS NumberOfProduct FROM category  where status = 1 order by NumberOfProduct DESC LIMIT 10 ';
            $data['categoryData'] = $this->front_model->customQuery($query);


            $data['title'] = 'all item'; 
            $this->tmpl_rander('itemlist',$data);

        }

    }

}
