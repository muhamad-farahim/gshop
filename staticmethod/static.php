<?php
 session_start();

// spl_autoload_register(function ($class) {

//     require_once('../dataroot/' . $class . 'php');
// });

 require_once '../dataroot/UserManager.php';

// require_once './tools.php';

class Authentication
{


    static function signup()
    {

        $arr['email'] = $_POST['email'];
        $arr['password'] = $_POST['password'];
        $arr['re_password'] = $_POST['re_password'];
        $arr['name'] = $_POST['name'];
        $arr['phone'] = $_POST['phone'];
        $arr['gender'] = $_POST['gender'];


        return UserManager::create_save_user($arr);
    }

    static function login()
    {
        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $email = mysqli_real_escape_string($CONNECTION, $_POST['email']);
        $password = mysqli_real_escape_string($CONNECTION, $_POST['password']);


        if ($email && $password) {

            $arr['email'] = $email;

            $data = UserManager::get($arr);

            if ($data) {

                if (password_verify($password, $data['password'])) {

                    $_SESSION['userid'] = $data['id'];

                    header("location: http://localhost/impproject/gshop/");

                    return 1;
                }
            } else {
                print("user not found");

                return 0;
            }
        } else {

            alert("please fll in the blanks");
        }
    }
}



class Authenticator
{

    private const ADMIN = 1;
    private const VISITOR = 2;


    private const ADMIN_ENTRY = 'http://localhost/impproject/gshop/admin.php';
    private const AUTHENTICATED_ENTRY = 'http://localhost/impproject/gshop/edituser.php';
    private const LOGIN_ENTRY = 'http://localhost/impproject/gshop/test.php';

    static function inauthenticated_user_only()
    {

        if (!isset($_SESSION['userid'])) return;

        $adminentry = SELF::ADMIN_ENTRY;
        $authenticatedentry = SELF::AUTHENTICATED_ENTRY;

        $roleid = UserManager::role_check($_SESSION['userid']);

        $arr['id'] = $_SESSION['userid'];

        $userobj = UserManager::get($arr);

        // print($roleid);



        if ($roleid == self::ADMIN) {

            header("location: $adminentry");
            return;
        } elseif ($roleid == self::VISITOR) {
            header("location: $authenticatedentry");
            return;
        }

        return $userobj;
    }
    static function authenticated_user_only()
    {

        $adminentry = SELF::ADMIN_ENTRY;
        $loginentry = SELF::LOGIN_ENTRY;

        if (!$_SESSION['userid']) header("location: $loginentry");;



        $roleid = UserManager::role_check($_SESSION['userid']);

        $arr['id'] = $_SESSION['userid'];

        $userobj = UserManager::get($arr);



        if ($roleid == self::ADMIN) {

            header("location: $adminentry");

            return;
        }
        return $userobj;
    }

    static function admin_only()
    {
        $loginentry = SELF::LOGIN_ENTRY;
        $authenticatedentry = SELF::AUTHENTICATED_ENTRY;

        if (!$_SESSION['userid']) header("location: $loginentry");;

        $roleid = UserManager::role_check($_SESSION['userid']);

        $arr['id'] = $_SESSION['userid'];

        $userobj = UserManager::get($arr);

        if ($roleid == self::VISITOR) {

            header("location: location: $authenticatedentry");
        }

        return $userobj;
    }
}


class Converter
{


    static function ProductConverter($product)
    {

        // var_dump($product);

        extract($product);

        $newobj = new Product($id,  $name,  $price,  $user_fk,  $stock, $description);

        return $newobj;
    }

    static function OrderConverter($order)
    {


        extract($order);

        $newobj = new Order($id,  $user_fk,  $invoice, $is_completed);

        return $newobj;
    }

    static function OrderVariantConverter($ordervariant)
    {

        extract($ordervariant);

        $newobj = new OrderVariant($id,  $orderrent_item_fk,  $variant_rent_fk, $quantity);

        return $newobj;
    }
    static function OrderRentVariantConverter($variant)
    {


        extract($variant);

        $newobj = new OrderRentVariant($id,  $orderrent_item_fk,  $variant_rent_fk, $quantity);

        return $newobj;
    }

    static function OrderItemConverter($orderitem)
    {

        extract($orderitem);

        $newobj = new OrderItem($id,  $order_fk,  $product_fk);

        return $newobj;
    }



    static function OrderRentConverter($orderrent)
    {

        extract($orderrent);

        $newobj = new OrderRent($id, $user_fk, $invoice, $is_completed, $is_returned);

        return $newobj;
    }

    static function ProductRentConverter($productrent)
    {

        extract($productrent);

        $newobj = new ProductRent($id, $name,  $priceperday,  $user_fk,  $stock, $description);

        return $newobj;
    }

    static function OrderItemRentConverter($orderitem)
    {

        extract($orderitem);

        $newobj = new OrderItem($id,  $order_fk,  $product_fk);

        return $newobj;
    }
}
