<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Pdf {
 
    function Pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function create()
    {
        
 
        return new mPDF($param);
    }
}
