# Codeigniter Starter panel

Codeigniter Starter Panel is a simple and full customizable Administration panel include flexible Authentication mode.

## Sources
* Codeigniter 2.1.0
* Sparks (getsparks.org)
* Template Library (Philsturgeon)
* CSS3 PIE (Jason Johnston)

## Install
1. Copy Codeigniter-Starter-Panel folder in your web root directory
2. Configure DB Settings in application/database.php
3. Run migrations http://localhost/Project Folder/index.php/migrate
4. Congratulations the Starter Panel run!

## Basic usage
All controllers extends to Admin_controller for restrict access.

### Example

    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class ControllerName extends Admin_controller
    {

        public function index()
        {
            $this->load->view('dashboard/welcome_message');
        }
    }
    
When you run the migration create the following table:

    CREATE TABLE `users` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `username` varchar(60) NOT NULL,
      `password` varchar(255) NOT NULL,
      `active` tinyint(1) NOT NULL DEFAULT '1',
      `last_login` datetime DEFAULT NULL,
      `last_login_ip` varchar(45) DEFAULT '',
      `created_at` datetime DEFAULT NULL,
      `updated_at` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    );
    
After run migration your can alter the users table