<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('welcome_model','wdb',TRUE);
    }

    function fakultas() {
        $view=(array(
            'views'=>'tables',
            'sidebar'=>'templates/sidebar',
            'data'=>$this->wdb->get(),
            'users'=>$this->session->userdata('username')));
        $this->load->view('base_view-coolui',array(
            
            'display'=>json_decode(json_encode($view))));        
    }
    function index() {
        $view=(array(
            'views'=>'tables',
            'sidebar'=>'templates/sidebar',
            'data'=>$this->wdb->get(),
            'users'=>$this->session->userdata('username')));
        $this->load->view('base_view-coolui',array(
            
            'display'=>json_decode(json_encode($view))));        
    }
}
         ?>