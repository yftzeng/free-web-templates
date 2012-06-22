<?php if (! defined('BASEPATH')) exit('No direct script access');

class Migrate extends CI_Controller
{
    public function index()
    {
        $this->load->library('migration');

        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
        
        echo '<p style="color:green">Migration Successful!</p>';
    }

}

/* End of file migrate.php */
/* Location: ./application/controllers/migrate.php */