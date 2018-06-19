<?php

class Home_model extends My_model {

    /**
     * service model page.
     *
     * Since this model is set as the default model in
     * config/autoload.php, it's displayed
     * 
     * @package	clinicApp
     * @category db model
     */
    function __construct() {
        // parent class construct call
        parent::__construct();
    }

    /**
     * getResult
     * get all data
     * @access public
     * @param string
     * @return array
     */
    

    function getRow($table, $id = null, $coloumns = null, $order = null, $multiple = TRUE) {
        if (is_array($coloumns) && !empty($coloumns)) {
            $this->db->select($coloumns);
        } else {
            $this->db->select('*');
        }
        if (!empty($id)) {
            if (!is_array($id)) {
                $this->db->where('accountId', $id);
            } else {
                $this->db->where($id);
            }
        }
        if (!empty($order)) {
            $this->db->order_by($order);
        }
        if (!empty($table)) {
            $query = $this->db->get($table);
            if ($query->num_rows() > 0) {
                if ($multiple) {
                    return $query->result();
                } else {
                    return $query->row();
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * setRow
     * set all data
     * @access public
     * @param string
     * @return string
     */
    function setRow($data, $table) {
        if (is_array($data) && !empty($data) && !empty($table)) {
            if ($this->db->insert($table, $data)) {
                $this->db->last_query();
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * updateRow
     * update row data
     * @access public
     * @param string
     * @return string
     */
    function updateRow($table, $data, $id) {
        if (!empty($id)) {
            if (!is_array($id)) {
                $this->db->where('accountId', $id);
            } else {
                $this->db->where($id);
            }
            if (!empty($table) && !empty($data) && is_array($data)) {

                if ($this->db->update($table, $data)) {
                    return $this->db->affected_rows();
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * deleteRow
     * delete row data
     * @access public
     * @param string
     * @return string
     */
    function deleteRow($table, $id) {
        if (!empty($id)) {
            if (!is_array($id)) {
                $this->db->where('accountId', $id);
            } else {
                $this->db->where($id);
            }
            if (!empty($table)) {
                if ($this->db->delete($table)) {
                    return $this->db->affected_rows();
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * countRow
     * count all rows in table
     * @access public
     * @param string
     * @return string
     */
    function countRow($table) {
        if (!empty($table)) {
            return $this->db->count_all($table);
        } else {
            return FALSE;
        }
    }

    /**
     * whereInRow
     * where in array multiple value check in one table field name get all recoed
     * @param string
     * @return array
     */
    function whereInRow($table, $whereIn, $id) {
        if (is_array($whereIn) && !empty($id)) {
            $this->db->where_in($id, $whereIn);
        }
        if (!empty($table)) {
            $query = $this->db->get($table);
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * searchRow
     * search row data in table
     * @param string
     * @return array
     */
    function searchRow($table, $data, $order = '') {
        if (!empty($data) && is_array($data)) {
            $this->db->like($data);
        }
        if (!empty($order)) {
            $this->db->order_by($order);
        }
        if (!empty($table)) {
            $query = $this->db->get($table);
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * joinWhereRow
     * join table and get records using where
     * @param string
     * @return array
     */
    function joinWhereRow($table, $field, $join, $id) {
        if (!empty($id)) {
            if (!is_array($id)) {
                $this->db->where('accountId', $id);
            } else {
                $tyhis->db->where($id);
            }
        }
        if (!empty($field) && is_array($field)) {
            $this->db->select($field);
        }
        if (!empty($table)) {
            $this->db->from($table);
        }
        if (!empty($join) && is_array($join)) {
            foreach ($join as $key => $val):
                $this->db->join($key, $val);
            endforeach;
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result;
        } else {
            return FALSE;
        }
    }


//Function for insert
    public function customInsert1($options) {
        $table = false;
        $data = false;
        extract($options);

        $this->db->insert($table, $data);

     return   $lastInserId = $this->db->insert_id();
    }

}
