<?php if (! defined('BASEPATH')) exit('No direct script access');

class Sessions extends CI_Controller
{
    var $data;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->spark('template/1.9.0');
    }
    
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        
        if($this->form_validation->run())
        {
            if($this->users_model->try_login($this->input->post('username'), $this->input->post('password')))
            {
                redirect('/');
            }
            else
            {
                $this->data->error = 'Username or password wrong';
            }
        }
        
        $this->template->set_layout(FALSE)
                       ->build('sessions/login', $this->data);
    }
    
    public function logout()
    {
        $this->users_model->logout();
        redirect('sessions/login');
    }

}

/* End of file sessions.php */
/* Location: ./application/controllers/sessions.php */