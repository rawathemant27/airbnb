<?php

class Main_content_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //calculate lat long
    function getLnt($zip) {

        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($zip) . "&sensor=false";
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, TRUE);
        if ($result['status'] != "ZERO_RESULTS") {
            //echo "HERE";
            if ($result['status'] != 'OVER_QUERY_LIMIT') {
                //echo "NT HERE";
                $result1[] = $result['results'][0];
                $result2[] = $result1[0]['geometry'];
                $result3[] = $result2[0]['location'];
                return $result3[0];
            } else {
                //echo "HELLO";
                $result3 = array("Error" => "Error Message");
                return $result3;
            }
        }
    }

    //image decode
    public function getImageBase64Code($img) {
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img = str_replace('[removed]', '', $img);
        $data = base64_decode($img);
        return $data;
    }

    public function customInsert($options) {
        $table = false;
        $data = false;

        extract($options);

        $this->db->insert($table, $data);

        return $this->db->insert_id();
    }

    public function customInsertServices($data = array(), $table) {
        //echo "here";exit;
        $this->db->insert('tempory_service_hold', $data);

        $ids = $this->db->insert_id();
        $this->db->where('fkVendorId', $data['fkVendorId']);
        $this->db->update($table, array('updateStatus' => 1));
        return $ids;
    }

    public function customUpdate($options) {
        $table = false;
        $where = false;
        $orwhere = false;
        $data = false;

        extract($options);

        if (!empty($where)) {
            $this->db->where($where);
        }

        // using or condition in where  
        if (!empty($orwhere)) {
            $this->db->or_where($orwhere);
        }
        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    public function customGet($options) {

        $select = false;
        $table = false;
        $join = false;
        $order = false;
        $limit = false;
        $offset = false;
        $where = false;
        $or_where = false;
        $single = false;
        $where_not_in = false;
        $group = false;

        extract($options);

        if ($select != false)
            $this->db->select($select);

        if ($table != false)
            $this->db->from($table);

        if ($where != false)
            $this->db->where($where);

        if ($where_not_in != false) {
            foreach ($where_not_in as $key => $value) {
                if (count($value) > 0)
                    $this->db->where_not_in($key, $value);
            }
        }

        if ($group != false)
            $this->db->group_by($group);

        if ($or_where != false)
            $this->db->or_where($or_where);

        if ($limit != false) {

            if (!is_array($limit)) {
                $this->db->limit($limit);
            } else {
                foreach ($limit as $limitval => $offset) {
                    $this->db->limit($limitval, $offset);
                }
            }
        }


        if ($order != false) {

            foreach ($order as $key => $value) {

                if (is_array($value)) {
                    foreach ($order as $orderby => $orderval) {
                        $this->db->order_by($orderby, $orderval);
                    }
                } else {
                    $this->db->order_by($key, $value);
                }
            }
        }


        if ($join != false) {

            foreach ($join as $key => $value) {

                if (is_array($value)) {
                    if (count($value) == 3) {
                        $this->db->join($value[0], $value[1], $value[2]);
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $this->db->join($key1, $value1);
                        }
                    }
                } else {
                    $this->db->join($key, $value);
                }
            }
        }
        
        if (isset($having) && $having != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->having($having);
        
        if (isset($group_by) && $group_by != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->group_by($group_by);


        $query = $this->db->get();

        if ($single) {
            return $query->row();
        }
//echo $this->db->last_query();//die();
        return $query->result();
    }

    public function getData($tbl = null, $select = null, $con = null, $orderBy = null, $limit = null, $join = null, $between = null, $multiple = TRUE, $groupBy = null, $orderBy2 = null, $having = NULL) {

        if ($select != null) {
            $this->db->select($select);
        } else {
            $this->db->select('*');
        }

        $this->db->from($tbl);

        if ($join != null) {
            foreach ($join as $j) {
                $type = 'inner';
                if (isset($j['type']))
                    $type = $j['type'];

                $this->db->join($j['table'], $j['relation'], $type);
            }
        }

        if ($con != null)
            $this->db->where($con);

        if ($between != null)
            $this->db->where($between);

        if ($groupBy != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->group_by($groupBy);

        if ($orderBy != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->order_by($orderBy);

        if ($orderBy2 != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->order_by($orderBy2);

        if ($limit != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->limit($limit);

        if ($having != null) //$this->db->order_by('title desc, name asc'); 
            $this->db->having($having);

        $query = $this->db->get();
//        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            if ($multiple) {
                return $query->result();
            } else {
                return $query->row();
            }
        } else
            return FALSE;
    }

    public function customQuery($query, $single = false, $updDelete = false, $noReturn = false) {
        $query = $this->db->query($query);

        if ($single) {
            return $query->db->row();
        } elseif ($updDelete) {
            return $this->db->affected_rows();
        } elseif (!$noReturn) {
            return $query->result();
        } else {
            return true;
        }
    }

    public function customQueryCount($query) {
        return $this->db->query($query)->num_rows();
    }

    public function getCountNotice($con = null, $between = null) {

        if ($con != null)
            $this->db->where($con);

        if ($between != null)
            $this->db->where($between);

        return $this->db->count_all_results('notice');
    }

    function getTimeSlotByDay($day = NULL, $cityServiceId) {
        if ($day == NULL) {
            return NULL;
        } else {
            $option = array(
                'table' => 'happyHourTimeSlot',
                'select' => '*',
                'where' => array('fk_bar_id' => $cityServiceId, 'enabled' => 1, 'deleted' => 0, "dayNumber" => $day),
                'single' => FALSE
            );

            $data['womenTimeSlotArray'] = $venderTimeSlotArray = $this->customGet($option);

            if (count($venderTimeSlotArray) != 0) {
                return $venderTimeSlotArray;
            } else {
                return NULL;
            }
        }
    }

    function cutString($string = '', $upto = 100, $strip_tags = TRUE, $title = '') {
        if ($strip_tags)
            $string = strip_tags($string);

        if (strlen($string) > $upto) {
            return substr($string, 0, $upto) . '<span  data-toggle="popover" title="' . $title . '" data-content="' . $string . '" data-placement="left">...</sapn>';
        } else {
            return $string;
        }
    }

    function sendMail($mailData = '') {

        $email = $mailData['email'];
        $password = $mailData['password'];
        $hash = $mailData['hash'];

        $config = array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);

        $this->email->from('noreply@ecommerce.com', 'Babyeo Team');
        $this->email->to($email);
        //    $this->email->bcc('them@their-example.com');
        $this->email->subject("Signup | Verification");

        $message = '
                Thanks for signing up!
                Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                 
                ------------------------
                Username: '.$email.'
                Password: '.$password.'
                ------------------------
                 
                Please click this link to activate your account:
                <a href="http://perpetualweb.in/babyeo/home/verify/'.$email.'/'.$hash.'">Click here</a>
                '; // Our message above including the link


        $this->email->message($message);
        $send = $this->email->send();
       // return 'http://localhost/ecommerce/home/verify/'.$email.'/'.$hash.' ';
        if ($send) {
            return '1';
        } else {
            return '0';
        }
    }


    function sendMailAfterCheckout($mailData = '') {

        $email = $mailData['email'];

        $config = array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);

        $this->email->from('noreply@babyeo.com', 'Babyeo Team');
        $this->email->to($email);
        //    $this->email->bcc('them@their-example.com');
        $this->email->subject("Item has successfully swapped");

        $message = 'Hello sir,

                        Your item has been successfully swped. Please login and check your about order detail
        '; // Our message above including the link


        $this->email->message($message);
        $send = $this->email->send();
       // return 'http://localhost/ecommerce/home/verify/'.$email.'/'.$hash.' ';
        if ($send) {
            return '1';
        } else {
            return '0';
        }
    }


  function sendMailToBuyer($mailData = '') {

        $email = $mailData['payer_email'];
        $order_id = $mailData['order_id'];
        $txn_id = $mailData['txn_id'];
        $payment_gross = $mailData['payment_gross'];
        $payment_date = $mailData['payment_date'];

        $config = array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);

        $this->email->from('noreply@babyeo.com', 'Babyeo Team');
        $this->email->to($email);
        //    $this->email->bcc('them@their-example.com');
        $this->email->subject("Item has been successfully swapped");

        $message = 'Hello sir,

                    Thanks your swap item from babyeo.
                    Your payment detail is here
                    Your Order Id : '. $order_id .' </br>
                    Your Transaction id : '. $txn_id .' </br>
                    Your Payment Gross : '. $payment_gross .' </br>
                    Your Payment Date : '. $payment_date .' </br>
        '; // Our message above including the link


        $this->email->message($message);
        $send = $this->email->send();
       // return 'http://localhost/ecommerce/home/verify/'.$email.'/'.$hash.' ';
        if ($send) {
            return '1';
        } else {
            return '0';
        }
    }

    function sendSms($mobileNo, $mess, $type) {

        $username = urlencode("u16868");
        $msg_token = urlencode("34Qgjg");
        $sender_id = urlencode("SARVSM"); // optional (compulsory in transactional sms)
        $message = urlencode($mess);
        $mobile = urlencode($mobileNo);
        if($type == 1){
            $api = "http://manage.sarvsms.com/api/send_transactional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile."";
        }else{
            $api = "http://manage.sarvsms.com/api/send_promotional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 
        }
        $http_result = file_get_contents($api);
        
        if (!empty($http_result) && $http_result != NULL) {
            return '1';
        } else {
            return '0';
        }
    }

    function findDayNumber($date) {
        $dayNumber = date('D', strtotime($date));

        $days = array('Mon' => 1, 'Tue' => 2, 'Wed' => 3, 'Thu' => 4, 'Fri' => 5, 'Sat' => 6, 'Sun' => 7);
        if ($days != NULL)
            return $days[$dayNumber];
        else
            return $days;
    }


    function forgot_password($emailId) {

        if($emailId == ''){
            return 0; exit;
        }
            
        $passkey = rand(100000, 999999);    
        $mdpass = md5($passkey);
            
        $options = array(
                'table' => 'users',
                'data' => array("password"=>$mdpass),
                'where' => array('email'=>$emailId)
            );

        $updatepass = $this->customUpdate($options);

        if(! $updatepass ){
            return 0; exit;
        }

        $config = array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);

        $this->email->from('noreply@ecommerce.com', 'Babyeo Team');
        $this->email->to($emailId);
        //    $this->email->bcc('them@their-example.com');
        $this->email->subject("Reset password");

        $mail_msg = '
            <!DOCTYPE html PUBLIC " -//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>                            
    <title>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">    body, html {
      width: 100% !important;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: none;
      -ms-text-size-adjust: 100%;
    }
      table td, table {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }
      #outlook a {
        padding: 0;
      }
      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
        line-height: 100%;
      }
      .ExternalClass {
        width: 100%;
      }
      @media only screen and (max-width: 480px) {
        table, table tr td, table td {
          width: 100% !important;
        }
        img {
          width: inherit;
        }
        .layer_2 {
          max-width: 100% !important;
        }
      }
    </style>
  </head>
  <body style="padding: 0px; margin: 0px;">                                
    <table style="height: 100%; width: 100%; background-color: #efefef;" align="center">        
      <tbody>            
        <tr>                
          <td valign="top" id="dbody" data-version="2.22" style="padding-top:30px;padding-bottom:30px;background-color:#efefef;width:100%;height:100%;">
            <!--[if (gte mso 9)|(IE)]><table style="width:600px" width="600" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
            <table class="layer_1" align="center" border="0" cellpadding="0" cellspacing="0" style="max-width:600px;box-sizing:border-box;width:100%;">                        
              <tbody>                                                                                    
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color:#ffffff;box-sizing:border-box;font-size:0px;text-align:center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <div class="layer_2" style="display:inline-block;vertical-align:top;width:100%;max-width:600px;">    
                      <table border="0" cellspacing="0" cellpadding="20" class="edcontent" style="border-collapse: collapse; width: 100%; background-color: #3498db;">        
                        <tbody>
                          <tr>            
                            <td valign="top" class="edtext" style="text-align:left;color:#5f5f5f;font-size:12px;font-family:Helvetica,Arial,sans-serif;word-break:break-word;direction:ltr;box-sizing:border-box;">
                              <p style="margin:0px;padding:0px;text-align:right;">
                                <span style="color: #ffffff;">
                                  <span style="font-size: 14px;">Reset Password
                                  </span>
                                </span>
                              </p>
                            </td>        
                          </tr>    
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>
                <tr>                                
                  <td class="drow" valign="top" align="center" style="background-color:#ffffff;box-sizing:border-box;font-size:0px;text-align:center;">                                    
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <div class="layer_2" style="display:inline-block;vertical-align:top;width:100%;max-width:600px;">                                        
                      <table class="edcontent" style="border-collapse: collapse;width:100%" border="0" cellpadding="1" cellspacing="0">                                            
                        <tbody>                                                
                          <tr>                                                    
                            <td class="edtext" valign="top" style="text-align:left;color:#5f5f5f;font-size:12px;font-family:Helvetica,Arial,sans-serif;word-break:break-word;direction:ltr;box-sizing:border-box;">

                              <p style="margin:0px;padding:0px;margin-top:20px; margin-left:5px;font-size:20px">
                                   Hello Dear,
                                <br>
                              </p>                                              
                              
                              <p style="margin:0px;padding:0px;margin-top:20px; margin-left:10px;">
                                   You`ve requested for password reset.
                                <br>
                              </p>
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <span class="elastictext-invisible-space">
                                  <br>
                                </span>
                              </p>
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <span class="elastictext-invisible-space">Your new password is: 
                                  <strong>'.$passkey.'
                                  </strong>
                                </span>
                              </p>
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <span class="elastictext-invisible-space">
                                  <br>
                                </span>
                              </p>
                              <p style="margin:0px;padding:0px;  margin-left:10px;">
                                <span class="elastictext-invisible-space">Regards,
                                </span>
                              </p>
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <span class="elastictext-invisible-space">
                                  <br>
                                </span>
                              </p>
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <span class="elastictext-invisible-space">Babyeo Team
                                </span>
                              </p>
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <span class="elastictext-invisible-space">
                                    <a href="www.babyeo.com" target="_blank" style="color:#828282;font-size:12px;font-family:Helvetica,Arial,sans-serif;text-decoration:none;"><img src="http://perpetaulweb.com/babyeo/assets/images/logo.png" style="border-width: 0px; border-style: none; max-width: 182px;" width="100" alt="Babyeo"></a> 
                                </span>
                              </p>
                            </td>                                                
                          </tr>                                            
                        </tbody>                                        
                      </table>                                    
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>                            
                </tr>
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color:#ffffff;box-sizing:border-box;font-size:0px;text-align:center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <div class="layer_2" style="display:inline-block;vertical-align:top;width:100%;max-width:600px;">                                        
                      <table class="edcontent" style="border-collapse: collapse;width:100%" border="0" cellpadding="10" cellspacing="0">                                            
                        <tbody>                                                
                          <tr>                                                    
                            <td class="edimg" valign="middle" style="box-sizing:border-box;text-align:center;">                                                        
                              <div style="text-align: center;font-size:11px;">                                                            
                                                                                       
                              </div>                                                    
                            </td>                                                
                          </tr>                                            
                        </tbody>                                        
                      </table>                                    
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>                                                                                                                
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color:#ffffff;box-sizing:border-box;font-size:0px;text-align:center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
                    <div class="layer_2" style="display:inline-block;vertical-align:top;width:100%;max-width:600px;">    
                      <table border="0" cellspacing="0" cellpadding="1" class="edcontent" style="border-collapse: collapse;width:100%">        
                        <tbody>
                          <tr>            
                            <td valign="top" class="edtext" style="text-align:left;color:#5f5f5f;font-size:12px;font-family:Helvetica,Arial,sans-serif;word-break:break-word;direction:ltr;box-sizing:border-box;">
                              <p style="margin:0px;padding:0px; margin-left:10px;">
                                <em data-elastictext-tag="em" data-verified="redactor">This is an automated response. Please do not reply back to this email. For any comments, you can visit www.babyeo.com
                                </em>
                              </p>
                            </td>        
                          </tr>    
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>                                                    
              </tbody>                    
            </table>                
            <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
          </td>            
        </tr>        
      </tbody>    
    </table>
  </body>
</html> ';
    
  //  echo $mail_msg; exit;

        $this->email->message($mail_msg);
        $send = $this->email->send();
       // return 'http://localhost/ecommerce/home/verify/'.$email.'/'.$hash.' ';
        if ($send) {
            return '1';
        } else {
            return '0';
        }


     }
}