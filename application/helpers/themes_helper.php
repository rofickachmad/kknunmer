<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('getfooterscript')){
    function getfooterscript() {
        // _loadjs('https://code.jquery.com/jquery-3.3.1.slim.min.js');
    	_loadjs('https://code.jquery.com/jquery-1.9.1.min.js');
    	_loadjs('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
    	_loadjs('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js');
    }

}
if ( ! function_exists('getheaderscript')){
    function getheaderscript() {
    	// _loadjs('https://code.jquery.com/jquery-3.3.1.slim.min.js');
    	return null;
    }

}
if ( ! function_exists('getheaderstyle')){
    function getheaderstyle() {
    	_loadcss(assets_url('themes/default/css/material.min.css'));
    	_loadcss(assets_url('themes/default/css/docs.min.css'));
    	_loadcss(assets_url('themes/default/css/default.css'));
    	_loadcss('https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700');
    	_loadcss('https://fonts.googleapis.com/icon?family=Material+Icons');
    }

}
if ( ! function_exists('getfooterstyle')){
    function getfooterstyle() {
    	// _loadcss(assets_url('themes/default/css/material.min.css'));
    	return null;
    }

}
// Themes Helper digunakan untuk mempermudah development dan segala hal yang beraitan dengan UI, UX dan Themes

if ( ! function_exists('getheader')){
    function getheader() {
    	getheaderstyle();
    	getheaderscript();
    }

}
if ( ! function_exists('getfooter')){
    function getfooter() {
    	getfooterstyle();
    	getfooterscript();
    }

}
if ( ! function_exists('_loadjs')){
    function _loadjs($js,$type=null) {
    	echo $script='<script src="'.$js.'"></script>';
    }

}
if ( ! function_exists('_loadcss')){
    function _loadcss($css,$type=null) {
    	echo $script='<link href="'.$css.'" rel="stylesheet">';
    }

}

    

        
         ?>