<?php if (! defined('BASEPATH')) exit('No direct script access');

class Admin_controller extends CI_Controller 
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->spark('template/1.9.0');
        
        /* Url to redirect if not logged */
        $url_login = 'sessions/login';
        
        if(! $this->logged_user = $this->users_model->get())
        {
            /* Redirect in Ajax requests */
            if($this->input->is_ajax_request()) echo '<script> window.location = "'.site_url($url_login).'"</script>';
            redirect($url_login);
        }
        
        /* Load layouts */
        $this->template->set_layout('default');
        
        /* Load optional Partials */
        //$this->template->set_partial('navbar','partials/navbar', FALSE);
        //$this->template->set_partial('breadcrumbs','partials/breadcrumbs', FALSE);
        //$this->template->set_partial('alerts','partials/alerts', FALSE);
        
        /* Autofill post data when use form_validation Class */
        // foreach ($_POST as $key => $value)
        // {
        //  $this->form_validation->set_rules($key);
        // }
        
        /* Profiler Mode */
        // $this->output->enable_profiler(TRUE);
    }

}

/* End of file Admin_controller.php */
/* Location: ./application/core/Admin_controller.php */