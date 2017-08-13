<?php

if ( ! function_exists('nav_item'))
{
    function nav_item($uri = '', $title = '', $icon  = '', $attributes = '')
    {
        $title = (string) $title;

        if ( ! is_array($uri))
        {
            $site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
        }
        else
        {
            $site_url = site_url($uri);
        }

        if ($title == '')
        {
            $title = $site_url;
        }

        if ($attributes != '')
        {
            $attributes = _parse_attributes($attributes);
        }

        $current_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $active = ($site_url == $current_url) ? ' class="active"' : '';

        return '<li'.$active.'><a href="'.$site_url.'"'.$attributes.'><span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span> '.$title.'</a></li>';
    }
}

if ( ! function_exists('isLoggedIn'))
{
    function isLoggedIn()
    {
        $CI = & get_instance();

        if ($CI->session->id != null && $CI->session->logged_in == true) {
            return true;
        }
        else 
        {
            return false;
        }
    }
}

if ( ! function_exists('isAdminOperator'))
{
    function isAdminOperator()
    {
        $CI = & get_instance();

        if ($CI->session->type == 'operator' && $CI->session->level == 1) {
            return true;
        }
        else 
        {
            return false;
        }
    }
}

if ( ! function_exists('isOperator'))
{
    function isOperator()
    {
        $CI = & get_instance();

        if ($CI->session->type == 'operator' && $CI->session->level != null) {
            return true;
        }
        else 
        {
            return false;
        }
    }
}

if ( ! function_exists('isPatient'))
{
    function isPatient()
    {
        $CI = & get_instance();

        if ($CI->session->type == 'patient' && $CI->session->level == null) {
            return true;
        }
        else 
        {
            return false;
        }
    }
}

if ( ! function_exists('redirect_prev'))
{
    function redirect_prev($url = null)
    {
        if ($url == null)
        {
            $url = '/';
        }

        if (isset($_SERVER['HTTP_REFERER']))
        {
            $url = $_SERVER['HTTP_REFERER'];
        }
        
        redirect($url);
    }
}


if ( ! function_exists('display_alert'))
{
    function display_alert($message, $type = 'danger')
    {
        if ($message == null) return null;

        return '<div class="alert alert-'.$type.'" role="alert">'.$message.'</div>';
    }
}

if ( ! function_exists('display_alerts'))
{
    function display_alerts($field)
    {
        $CI = & get_instance();

        $message = $CI->session->flashdata($field.'_message');
        $warning = $CI->session->flashdata($field.'warning');
        $error = $CI->session->flashdata($field.'_error');

    	if ($message == null && $warning == null && $error == null) return null;

        $form = '';

        if ($message != null)
        {
            $form .= '<div class="alert alert-success" role="alert">'.$message.'</div>';
        }

        if ($warning != null)
        {
            $form .= '<div class="alert alert-warning" role="alert">'.$warning.'</div>';
        }

        if ($error != null)
        {
            $form .= '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }

        return $form;
    }
}

if ( ! function_exists('display_name'))
{
    function display_name($id = null)
    {
        $CI = & get_instance();

        if ($id == null)
        {
            $id = $CI->session->id;

            if ($CI->session->type == 'operator')
            {
                $user = $CI->operator->get($id);
            }
            else
            {
                $user = $CI->patient->get($id);
            }
        }
        else
        {
            $user = $CI->patient->get($id);
        }

        if ($user)
        {
            return $user->name;
        }
        
    }
}

if ( ! function_exists('display_form_error'))
{
    function display_form_error($field)
    {
        if (form_error($field) == '') return null;

        return '<span class="help-block">'.form_error($field).'</span>';
    }
}

if ( ! function_exists('display_age'))
{
    function display_age($dob)
    {
        $from = new DateTime($dob);
        $to   = new DateTime('today');
        return $from->diff($to)->y;
    }
}

if ( ! function_exists('display_status'))
{
    function display_status($status)
    {
        return ($status == 'S' ? 'STAT' : 'Routine');
    }
}

if ( ! function_exists('display_gender'))
{
    function display_gender($gender)
    {
        return ($gender == 'F' ? 'Female' : 'Male');
    }
}

if ( ! function_exists('display_level'))
{
    function display_level($level)
    {
        if ($level == 1)
        {
            return 'Administrator';
        }
        else
        {
            return 'Operator';
        }
    }
}

if ( ! function_exists('display_flags'))
{
    function display_flags()
    {
        return array(
            '' => '',
            'l' => 'Low',
            'L' => 'Low (Critical)',
            'h' => 'High',
            'H' => 'High (Critical)'
        );
    }
}

if ( ! function_exists('format_result'))
{
    function format_result($type)
    {
        if ($type == 'N')
        {
            return 'Negative';
        } 
        else if ($type == 'P')
        {
            return 'Positive';
        }
        else
        {
            return 'Value';
        }
    }
}

if ( ! function_exists('format_flag'))
{
    function format_flag($flag)
    {
        if ($flag === 'l' || $flag === 'h')
        {
            return ucfirst($flag);
        }
        else if ($flag === 'L' || $flag == 'H')
        {
            return $flag.'**';
        }
    }
}


if ( ! function_exists('display_units'))
{
    function display_units()
    {
        return array(
            '' => '',
            'K/mcL' => 'K/mcL',
            'M/mcL' => 'M/mcL',
            'fL' => 'fL',
            'pg' => 'pg',
            'g/dL' => 'g/dL',
            '%' => '%', 
        );
    }
}