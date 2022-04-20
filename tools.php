<?php

function alert($msg): void
{


    echo "
    <script>
    
    alert('$msg')
    
    
    </script>
    
    
    ";
}

function emailverif($email)
{

    $is_valid = 1;
    $strarr = explode("@", $email);

    if (count($strarr) != 2) {

        $is_valid = 0;
    }

    if (!strpos($email, '.')) {
        $is_valid = 0;
    }


    return $is_valid;
}

function gendercheck($gender)
{

    $allowed_input = ['male', 'female', 'other'];

    return in_array($gender, $allowed_input);
}


function check_image_type($img_name)
{
    $supported_img_type = ['jpeg', 'jpg'];

    $strarr = explode('.', $img_name);

    $imageformat = end($strarr);

    if (in_array($imageformat, $supported_img_type)) {

        return 1;
    } else {
        return 0;
    }
}
