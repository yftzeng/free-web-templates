<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_controller
{

    public function index()
    {
        $this->load->view('dashboard/welcome_message');
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */