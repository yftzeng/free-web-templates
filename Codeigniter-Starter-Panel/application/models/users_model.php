<?php if (! defined('BASEPATH')) exit('No direct script access');

class Users_model extends CI_Model
{
    //Table name
    var $db_table = 'users';
    
    // Primary key
    var $db_pk = 'id';
    
    //Session data
    var $session_key = 'user_id';
    
    public function get_all()
    {
        $q = $this->db->get($this->db_table);
        return $q->result();
    }
    
    public function try_login($username = NULL, $password = NULL)
    {
                 $this->db->where(array('username' => $username, 'password' => $this->encryption_mode($password)));
        $query = $this->db->get($this->db_table, 1, 0);

        if ($query->num_rows != 1) return FALSE;

        $row = $query->row();
        $this->session->set_userdata(array($this->session_key => $row->{$this->db_pk}));
        
        $login_data['last_login'] = date('Y-m-d H:i:s');
        $login_data['last_login_ip'] = $this->input->ip_address();

        $this->db->update($this->db_table, $login_data, array($this->db_pk => $row->{$this->db_pk}));

        return $row;
    }

    // Get logged user or passed id
    public function get($id = FALSE)
    {
        if ($id == FALSE) $id = $this->session->userdata($this->session_key);
        if ($id == FALSE) return FALSE;
        
             $this->db->where(array($this->db_pk => $id));
        $q = $this->db->get($this->db_table, 1, 0);
        
        $row = ($q->num_rows() == 1) ? $q->row() : FALSE;

        return $row;
    }
    
    public function find_by($condition = array())
    {
        $q = $this->db->get_where($this->db_table, $condition, 1);
        return $q->row();
    }
    
    public function insert($data)
    {
        $data = $this->validate_data($data);
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->db_table, $data);
    }
    
    public function update($id, $data)
    {
        $data = $this->validate_data($data);
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->update($this->db_table, $data, array($this->db_pk => $id));
    }
    
    public function logout()
    {
        $this->session->set_userdata(array($this->session_key => NULL));
    }
    
    private function encryption_mode($data)
    {
        return sha1($data);
    }
    
    private function validate_data($data = array())
    {
        if(isset($data['password'])) $data['password'] = $this->encryption_mode($data['password']);
        if(isset($data['username'])) $data['username'] = mb_convert_case($data['username'], MB_CASE_LOWER);
        
        return $data;
    }

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */