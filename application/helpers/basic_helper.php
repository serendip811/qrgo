<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 팝업창이면 팝업 닫고
// 아니면 URL을 replace 하거나, back();
if(!function_exists('alertmsg_move')) {
    function alertmsg_move($msg, $url=''){ // {{{
        echo "<html>";
        echo "<head>";
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
        echo "</head>";
        echo "<body>";
        echo "<script>";
        echo "alert('".$msg."');";
        echo "if(window.opener){";
        echo "window.close();";
        echo "}else{";
        if(empty($url))
            echo "history.go(-1);";
        else
            echo "location.replace('".$url."');";
        echo "}";
        echo "</script>";
        echo "</body>";
        echo "</html>";
        exit;
    } // }}}
}

if(!function_exists('load_view')) {
    function load_view($view_file, $data = array()){
        $CI =& get_instance();
        $CI->load->model('biz/cartbiz','cartbiz');
        $incart = $CI->cartbiz->get_cart_count();
        $data['incart'] = $incart['data'];
        $data['view_file'] = $view_file;
        $CI->load->view('common/body',$data);
        if((ENVIRONMENT === 'development' || ENVIRONMENT === 'dqa') && stripos($CI->input->server('QUERY_STRING'), 'VIEW_PROFILER') !== false)
            $CI->output->enable_profiler(true);
    }
}

if(!function_exists('load_admin_view')) {
    function load_admin_view($view_file, $data = array()){
        $CI =& get_instance();
        $data['view_file'] = $view_file;
        $CI->load->view('inko/common/body',$data);
        if((ENVIRONMENT === 'development' || ENVIRONMENT === 'dqa') && stripos($CI->input->server('QUERY_STRING'), 'VIEW_PROFILER') !== false)
            $CI->output->enable_profiler(true);
    }
}
