<?php
/**
 * Created by PhpStorm.
 * Users: AYINDE
 * Date: 25/01/2019
 * Time: 02:16
 */

namespace Src\helper;

class Error
{
    public static function display_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
            $output .= "<div class=\"errors\">";
            $output .= "<h3>";
            $output .= "Warning";
            $output .= "</h3>";
            $output .= "<ul>";
            foreach($errors as $error) {
                $output .= "<li>" . Path::h($error) . "</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        }
        return $output;
    }

    public static function customized_display_error($errors){
        $output = '';
        if (!empty($errors)){
            $output .= '<div class="alert alert-danger alert-dismissible" role="alert">';
            $output .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            $output .= '<div class="alert-icon contrast-alert">';
            $output .= '<i class="fa fa-remove"></i>';
            $output .= '</div>';
            $output .= '<div class="alert-message">';
            $output .= ' <span><strong>Warning! </strong>' . Path::h($errors) . '</span>';
            $output .= '</div>';
            $output .= '</div>';
        }

        return $output;
    }

    public static function require_admin_login(){
        global $admin_session;
        if(!$admin_session->is_logged_in()) {
            Path::redirect_to(Path::url_for('/admin/sign_in.php'));
        } else {
            // Do nothing, let the rest of the page proceed
        }
    }


}