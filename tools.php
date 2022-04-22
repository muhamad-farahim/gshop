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

function randomGen($min, $max, $q)
{

    $numbers = range($min, $max);
    shuffle($numbers);

    $num = implode("", array_slice($numbers, 0, $q));

    return $num;
}

function image_upload($FILES)
{

    $name = $FILES['name'];
    $tmp_name = $FILES['tmp_name'];
    $error = $FILES['error'];

    $randnamewithoutext = randomGen(0, 9, 10) . time();

    $namearr = explode('.', $name);

    $ext = end($namearr);

    $dest = getcwd() . "\\uploadedimg\\" . $randnamewithoutext . ".$ext";

    $uploadOK = 1;

    if (!check_image_type($name)) {

        alert("FILE NOT SUPPORTED");

        $uploadOK = 0;
    }

    if ($error == 4) {

        alert("INSERT THE IMAGE");

        $uploadOK = 0;
    }

    if ($uploadOK) {

        move_uploaded_file($tmp_name, $dest);

        return $randnamewithoutext . ".$ext";
    }
    return $uploadOK;
}

function multi_image_upload($FILES)
{

    $arrOname = [];

    // var_dump($FILES);

    foreach ($FILES['tmp_name'] as $key => $value) {

        $name = $FILES['name'][$key];
        $error = $FILES['error'][$key];

        $randnamewithoutext = randomGen(0, 9, 10) . time();

        $namearr = explode('.', $name);

        $ext = end($namearr);

        $dest = getcwd() . "\\uploadedimg\\" . $randnamewithoutext . ".$ext";
        $uploadOK = 1;

        if ($error === 4) {

            $uploadOK = 0;

            alert("INSERT THE IMAGE FIRST");
        }

        if (!check_image_type($name)) {

            $uploadOK = 0;

            alert("FILE TYPE NOT SUPPORTED");
        }

        if ($uploadOK) {

            move_uploaded_file($value, $dest);

            $arrOname[] = $randnamewithoutext . ".$ext";
        }
    }

    // var_dump($arrOname);

    return $arrOname;
}


function verifyuserid(int $id, bool $redirect = false)
{

    $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

    $q = mysqli_query($CONNECTION, "SELECT * FROM user WHERE id = $id;");

    $ok = 1;

    if ($q) {

        $data = mysqli_fetch_assoc($q);

        if (!$data) {

            $ok = 0;
        }
    } else {

        $ok = 0;
    }


    if ($ok) {

        return true;
    } else {

        if ($redirect) {

            header("location: http://localhost/impproject/gshop/;");
        } else {

            return false;
        }
    }
}


function intervaltodays(int $Y = 0, int $M = 0, int $D = 0)
{


    $duration = new DateInterval("P" . $Y . "Y" . $M . "M" . $D . "D");

    $durationinseconds = (new DateTime())->setTimestamp(0)->add($duration)->getTimestamp();

    return $durationinseconds / 86400;
}
