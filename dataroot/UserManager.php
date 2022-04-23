<?php

require_once '../tools.php';

class UserManager
{

    // CREATE USER
    static function create_save_user($asoc)
    {
        extract($asoc);

        if (isset($email) && isset($name) && isset($password) && isset($re_password) && isset($phone) && isset($gender)) {
            $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

            $email = mysqli_real_escape_string($CONNECTION, $email);
            $name = mysqli_real_escape_string($CONNECTION, $name);
            $password = mysqli_real_escape_string($CONNECTION, $password);
            $re_password = mysqli_real_escape_string($CONNECTION, $re_password);
            $phone = mysqli_real_escape_string($CONNECTION, $phone);
            $gender = strtolower(mysqli_real_escape_string($CONNECTION, $gender));

            $createuserOK = 1;

            if (!emailverif($email)) {


                $createuserOK = 0;
                alert("Email not valid");
            }

            if ($password !== $re_password) {

                $createuserOK = 0;
                alert("Password not matching");
            }

            if (!is_numeric($phone)) {
                $createuserOK = 0;

                alert("invalid phone number");
            }

            if (!gendercheck($gender)) {

                $createuserOK = 0;

                alert("Enter your gender");
            }

            if ($createuserOK) {

                $hashed = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO user VALUES (NULL, '$email', '$name', '$hashed', '$phone', '$gender', 2)";

                $q = mysqli_query($CONNECTION, $sql);

                if ($q) {
                    return 1;
                } else {
                    return 0;
                }
            }
            return $createuserOK;
        } else {
            alert("Credentials Incomplete");
            return 0;
        }
    }

    // AMBIL USER
    static function get($asoc)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        extract($asoc);

        if (isset($id)) {

            $sql = "SELECT * FROM user WHERE id = $id";
        } elseif (isset($email)) {

            $email = mysqli_real_escape_string($CONNECTION, $email);

            $sql = "SELECT * FROM user WHERE email = '$email'";
        } else {

            return 0;
        }

        $q = mysqli_query($CONNECTION, $sql);

        return mysqli_fetch_assoc($q);
    }

    static function edit_user($assoc)
    {

        extract($assoc);

        if (!isset($email) && !isset($name) && !isset($phone_number) && !isset($gender)) return 0;

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $userid = $_SESSION['userid'];

        $sqlarr = [];

        if ($email) {

            $sql = "UPDATE user SET email = '$email' WHERE id = $userid;";

            array_push($sqlarr, $sql);
        }

        if ($name) {
            $sql = "UPDATE user SET `name` = '$name' WHERE id = $userid;";

            array_push($sqlarr, $sql);
        }

        if ($phone_number) {

            $sql = "UPDATE user SET `phone_number` = '$phone_number' WHERE id = $userid;";

            array_push($sqlarr, $sql);
        }

        if ($gender) {

            $sql = "UPDATE user SET `gender` = '$gender' WHERE id = $userid;";

            array_push($sqlarr, $sql);
        }

        $OK = 1;

        foreach ($sqlarr as $SQL) {

            $q = mysqli_query($CONNECTION, $SQL);

            if (!$q) {

                $OK = 0;
            }
        }

        return $OK;
    }


    //MENGEMBALIKAN ID ROLE USER BERDASARKAN ID USERNYA
    static function role_check($user_id)
    {

        $CONNECTION  = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT role.id FROM user INNER JOIN role ON user.role_fk = role.id WHERE user.id = $user_id";
        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);

        if ($data) {

            return $data['id'];
        } else {
            return 0;
        }
    }
}
