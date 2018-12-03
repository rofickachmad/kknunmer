<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Templatest extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
                // echo"test";
                // $this->template->set_theme('coolui');
            	// $this->template->set_baseview('base_view');
                $this->template->load_view('welcome_message',array('data'=>'hello'));
                // print_r($this->template->themebase);
            }
        }
         ?>