<?php
class User_model extends CI_Model{

    public function get_entry($username){
        $query = $this->db->get_where('tbl_user',array('username'=>$username));
        if(!empty($query->row())){
            return $query->row();
        }
        else{
            return false;
        }
    }
    public function insert_entry($data){
        $data = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'status' => 'enabled'
        );
        $query = $this->db->insert('tbl_user',$data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function checkUsernameExists($username)
    {
        $query = $this->db->get_where('tbl_user', array('username' => $username));
        
        return $query->num_rows() > 0;
    }
}

