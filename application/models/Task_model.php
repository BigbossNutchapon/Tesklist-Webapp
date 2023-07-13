<?php
class Task_model extends CI_Model{



    public function insert_entry($request){
        $data = array(
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => $request['user_id'],
            'due_date' => $request['due_date'],
            'status' => 'incomplete'
        );
        $query = $this->db->insert('tbl_task',$data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_entriesByUserId($id,$status){

        $this->db->where('user_id', $id);
        if ($status == "all"){
            $this->db->where('status !=', 'removed');
        }
        else{
            $this->db->where('status', $status);
        }
        $query = $this->db->get('tbl_task');
        if(!empty($query)){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function get_entryById($id){
    $query =$this->db->get_where('tbl_task', array('id'=>$id));
    if(!empty($query)){
        return $query->row();
        }
    else{
        return false;
        }
    }

    public function delete_entryById($id){
        $this->db->where('id', $id);
        $query =$this->db->update('tbl_task', array('status'=>'removed'));
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function update_entryById($updatedData) 
    {
        date_default_timezone_set("Asia/Bangkok");
        $id = $updatedData['task_id'];
        $data = [
            'title' => $updatedData['title'],
            'description' => $updatedData['description'],
            'due_date' => $updatedData['due_date'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $query = $this->db->where('id',$id)->update('tbl_task',$data);
        
        if($query){
            return true;
        }
        else{
            return false;
        }        
    }
    public function done_ById($id){
        $this->db->where('id', $id);
        $query =$this->db->update('tbl_task', array('status'=>'complete'));
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_doneTask_ByUserId($id){
        $this->db->where('user_id', $id);
        $this->db->where('status', 'complete');
        $query = $this->db->get('tbl_task');
        if(!empty($query)){
            return $query->result();
        }
        else{
            return false;
        }
    }







}

