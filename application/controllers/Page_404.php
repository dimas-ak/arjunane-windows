<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page_404
 *
 * @author DIMAS AWANG KUSUMA
 */
class Page_404 extends CI_Controller {
    function __construct() {
	parent::__construct();
    }
    
    function index(){
	    views('menu-404');
    }
}
