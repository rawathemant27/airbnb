<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getActiveClass')){
   function getActiveClass($class = NULL, $method = NULL){
          if(isset($method)){

				if($method == 'dashboard'){
					return 'dashboard';
				}elseif($method == 'users'){
					return 'users';
				}elseif($method == 'allBikes' OR  $method == 'addBike' OR  $method == 'allScooter' OR $method == 'allMotorbike' OR $method == 'allBicycle' OR $method == 'allAvailableBikes' OR $method == 'editBike' OR $method == 'editScooter' OR $method == 'editMotorbike' OR $method == 'editBicycles'){
					return 'bikes';
				}elseif($method == 'setting'){
					return 'setting';
				}elseif($method == 'currentRents' OR $method == 'pastRents'){
					return 'rents';
				}

              }
           }
       }

if ( ! function_exists('getProductImage')){
   function getProductImage($filePath = NULL, $fileName = NULL){
		 if($filePath != NULL && $fileName != NULL){
		 	if (file_exists($filePath.$fileName)) {
		 		return $filePath.$fileName;
 			 }else{
 			 	return base_url() . 'webassets/images/cap_01.png';
 			 }
		 }else{
		 	return base_url() . 'webassets/images/cap_01.png';
		 }

	}
  }


if ( ! function_exists('getMessage')){
   function getMessage($messageType = NULL, $message = NULL){
		 if($messageType != NULL && $message != NULL){

		 	switch($messageType){
		 		case 'success' : 
			 		return '<div class="alert alert-success">
	                              '.$message.'
	                        </div>';
			 		break;
			 	case 'error' : 
			 		return '<div class="alert alert-danger">
	                              '.$message.'
	                        </div>';
			 		break;
			 	case 'info' : 
			 		return '<div class="alert alert-info">
	                              '.$message.'
	                        </div>';
			 		break;
			 }
	 }
  }
}


if ( ! function_exists('questionType')){
   function questionType($questionType){
		 if($questionType != NULL){

		 	switch($questionType){
		 		case 'text' : 
			 		return 'Text Input';
			 		break;
			 	case 'date' : 
			 		return 'Date Input';
			 		break;
			 	case 'select' : 
			 		return 'Drop Down';
			 		break;
			 }
	 }
  }
}



if ( ! function_exists('getNumberOfReview')){
   function getNumberOfReview($itemId){
   	     $ci =& get_instance();
         $ci->load->database();
		 if($itemId != NULL){
		 	$sql = "SELECT count(review_id) as numberOfReview  FROM review WHERE item_id =  ".$itemId."";
			$q = $ci->db->query($sql);
	      if($q->num_rows() > 0)
	     {
	       $data =  $q->row();
	       return $data->numberOfReview;
	     }else{
	     	return 0;
	     }
     }
  } 
}

if ( ! function_exists('avgRating')){
   function avgRating($itemId){
   	     $ci =& get_instance();
         $ci->load->database();
		 if($itemId != NULL){
		 	$sql = "SELECT AVG(rating) as avgRating FROM review WHERE item_id =  ".$itemId."";
			$q = $ci->db->query($sql);
	      if($q->num_rows() > 0)
	     {
	       $data =  $q->row();
	       return $data->avgRating;
	     }else{
	     	return 0;
	     }
     }
  } 
}


if ( ! function_exists('reviews')){
   function reviews($itemId){
   	     $ci =& get_instance();
         $ci->load->database();
		 if($itemId != NULL){
		 	$sql = "SELECT userId, name, userImage, review.*, review.createdDateTime as postedDate FROM review INNER JOIN users ON  users.userId = review.user_id WHERE review.item_id =  ".$itemId."";
			$q = $ci->db->query($sql);
	      if($q->num_rows() > 0)
	     {
	       return $q->result();
	     }else{
	     	return false;
	     }
     }
  } 
}


if ( ! function_exists('checkAlreadyAdded')){
   function checkAlreadyAdded($itemId, $userId){
   	     $ci =& get_instance();
         $ci->load->database();
		 if($itemId != NULL && $userId != NULL){
		 	 $sql = "SELECT basketId FROM basket WHERE itemId =  ".$itemId." AND userId =  ".$userId." ";
			$q = $ci->db->query($sql);

	      if($q->num_rows() > 0)
	     {
	       return '1';
	     }else{
	     	return '0';
	     }
     }else{
     	return '0';
     }
  } 
}


if ( ! function_exists('getCountryCode')){
   function getCountryCode($ContryName){
   	     $ci =& get_instance();
         $ci->load->database();
		 if($ContryName != NULL){
		 	  $sql = "SELECT code  FROM country_code WHERE country =  '".$ContryName."' ";
			$q = $ci->db->query($sql);
	      if($q->num_rows() > 0)
	     {
	       $data =  $q->row();
	       return $data->code;
	     }else{
	     	return false;
	     }
     }else{
     	return false;
     }
  } 
}


if ( ! function_exists('getSubCat')){
   function getSubCat($categoryId = NULL){
		 if($categoryId != NULL && $categoryId != NULL){

		 	 $ci =& get_instance();
             $ci->load->database();

		 	

             $sql = "SELECT *  FROM subcategory WHERE categoryId =  ".$categoryId." ";
			$q = $ci->db->query($sql);

			if($q->num_rows() > 0)
		     {
		       return $data =  $q->result();
		     }else{
		     	return false;
		     }


		 }else{
		 	return false;
		 }

	}
  }


  if ( ! function_exists('getdeliveryAddress')){
   function getdeliveryAddress($itemId){
   	     $ci =& get_instance();
         $ci->load->database();
		 if($itemId != NULL){
		 	  $sql = "SELECT order_detail.*, payments.payment_status, payments.order_status  FROM `order_item`INNER JOIN order_detail ON order_detail.order_id = order_item.orderId INNER JOIN payments ON payments.order_id = order_item.orderId WHERE order_item.itemId = ".$itemId." LIMIT 0,1 ";
			$q = $ci->db->query($sql);
	      if($q->num_rows() > 0)
	     {
	       return $data =  $q->row();
	     }else{
	     	return false;
	     }
     }else{
     	return false;
     }
  } 
}
