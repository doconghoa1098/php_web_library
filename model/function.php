<?php

    /**
    * debug
    **/
    function _debug($data) {

        echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);

        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';

        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }
    /**
    * tao slug
    **/

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

     if( ! function_exists('xss_clean') ) {
        function xss_clean($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);
            // we are done...
            return $data;
        }
    }
    /**
     * get input
     */

    function  getInput($string)
    {
        return isset($_GET[$string]) ? xss_clean($_GET[$string]) : '';
    }


    /**
     * post Input
     */

    function  postInput($string)
    {
        return isset($_POST[$string]) ? xss_clean($_POST[$string]) : '';
    }



    function base_url()
    {

        return $url  = "http://localhost:8080/mvc/";
    }



    function public_admin()
    {
        return base_url() . "view/admin/";
    }

    function public_frontend()
    {
        return base_url() . "view/frontend/";
    }

    function modules($url)
    {
        return base_url() . "admin/modules/" .$url ;
    }

    function uploads()
    {
        return base_url() . "view/uploads/";
    }

     if ( ! function_exists('redirectStyle'))
    {
        function redirectStyle($url = "")
        {
            header("location: ".base_url()."{$url}");exit();
        }
    }



    /**
     *  redirect về các trang
     */
    if ( ! function_exists('redirectAdmin'))
    {
        function redirectAdmin($url = "")
        {
            header("location: ".base_url()."controller/admin/{$url}");exit();
        }
    }



    /**
     *  redirect về các trang
     */
    if ( ! function_exists('redirect'))
    {
        function redirect($url = "")
        {
            header("location: ".base_url().$url);exit();
        }
    }

    function fomatprice($number)
    {
       $number = intval($number);
       return $number = number_format($number,'0',',','.') ." ₫";
    }

    function fomatpricesale($number,$sale)
    {
        $number =intval($number);
        $sale = intval($sale);

        $price = $number*(100-$sale)/100;
        return fomatprice ($price);
    }

    function sale($number)
    {
        if ($number < 5000000) {
            return 0;
        }
        elseif ($number <10000000) {
            return 5;
        }
        else {
            return 10;
        }

    }
    function url_no_php()
    {
        $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $b=preg_replace("/(index|create|update|delete|add|edit|status|active).php/", '', $a);   
        return $b;
    }
    if (!function_exists('upload_image'))
    {
        function upload_image($file , $folder = '',array $extend = array() )
        {
            $code = 1;
            // lay thông tin ảnh
            $file_name  = $_FILES[$file]['name'];
            $file_tmp   = $_FILES[$file]['tmp_name'];
            // duoi file
            $ext = strtolower(end(explode('.',$file_name)));
            // kiem tra dinh dang file
            if ( ! $extend )
            {
                $extend = ['png','jpg','jpeg','gif'];
            }
            if( !in_array($ext,$extend))
            {
                return $data['code'] = 0;
            }
             // Tên file mới
            $nameFile = trim(str_replace('.'.$ext,'',strtolower($file_name)));
            $filename = date('Y-m-d__').to_slug($nameFile) . '.' . $ext;
             // thu muc goc de upload
            $path = ROOT.date('Y/m/d/');
            if ($folder)
            {
                $path =  ROOT.$folder.'/'.date('Y/m/d/');
            }
            if ( !is_dir($path))
            {
                mkdir($path,0777,true);
            }
            // di chuyen file vao thu muc uploads
            move_uploaded_file($file_tmp, $path. $filename);

            $data = [  'name' => $filename ];
            return $data;
        }
    }
    if (!function_exists('pare_url_file')) {
        function pare_url_file($image,$folder = '')
        {
            if (!$image)
            {
                return base_url().'view/img/img-default.jpg';
            }
            $explode = explode('__', $image);
            if (isset($explode[0])) {
                $time = str_replace('_', '/', $explode[0]);
                return base_url().'view/img/uploads/'.$folder.'/'.date('Y/m/d',strtotime($time)).'/'.$image;
            }
        }   
    }



 ?>
