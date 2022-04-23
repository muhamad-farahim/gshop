<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop/tools.php');



class ProductRentPhotoManager
{


    static function create_and_save(array $imgarr, int $pid)
    {
        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $imgnamearr = multi_image_upload($imgarr);

        $OK = 1;

        foreach ($imgnamearr as $val) {

            $sql = "INSERT INTO product_rent_photo VALUES (NULL, '$val', $pid)";

            $q = mysqli_query($CONNECTION, $sql);

            if (!$q) {

                $OK = 0;
            }
        }

        return $OK;
    }
}
