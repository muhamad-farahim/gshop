<?php

require_once './staticmethod/static.php';

// require_once './dataroot/OrderItem.php';

class OrderRent
{

    function __construct(int $id, int $user_fk, ?int $invoice,  bool $is_completed, bool $is_returned)
    {
        $completebool = $is_completed ? 1 : 0;
        $returnbool = $is_returned ? 1 : 0;

        $this->id = $id;
        $this->user_fk = $user_fk;
        $this->invoice = $invoice;
        $this->is_completed = $completebool;
        $this->is_returned = $returnbool;
    }

    function save()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "UPDATE order_rent SET user_fk=$this->user_fk , invoice =$this->invoice , is_completed =$this->is_completed , is_returned = $this->is_completed WHERE id = $this->id";

        $q = mysqli_query($CONNECTION, $sql);

        if ($q) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_items()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM orderitem_rent WHERE order_fk = $this->id";

        $q = mysqli_query($CONNECTION, $sql);

        $arr = [];

        while ($data = mysqli_fetch_assoc($q)) {

            $arr[] = new OrderItemRent($data['id'], $data['order_fk'], $data['product_fk'], $data['year'], $data['month'], $data['day']);
        }

        return $arr;
    }

    function check_variant($variant_id, $time)
    {


        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        extract($time);

        if (!$years || !$months || !$days) {

            return 0;
        }

        $sql = "SELECT order_rent_variant.id, order_rent_variant.orderrent_item_fk, order_rent_variant.variant_rent_fk, order_rent_variant.quantity FROM orderitem_rent
                INNER JOIN order_rent_variant ON orderitem_rent.id = order_rent_variant.orderrent_item_fk WHERE order_rent_variant.variant_rent_fk = $variant_id AND
                orderitem_rent.order_fk = $this->id";

        $q = mysqli_query($CONNECTION, $sql);



        if (!$q) {

            return 0;
        }

        $data = mysqli_fetch_assoc($q);



        if ($data) {
            return Converter::OrderVariantConverter($data);
        } else {

            $sql = "SELECT product_rent_fk FROM product_rent_variant WHERE id = $variant_id;";

            $q = mysqli_query($CONNECTION, $sql);




            if (!$q) {

                return 0;
            }

            $data = mysqli_fetch_assoc($q);

            if (!$data) {
                return 0;
            }

            $pidq = intval($data['product_rent_fk']);

            $sql = "SELECT * FROM orderitem_rent WHERE product_fk = $pidq AND order_fk = $this->id";

            $q = mysqli_query($CONNECTION, $sql);



            if (!$q) {

                return 0;
            }

            $data = mysqli_fetch_assoc($q);

            if ($data) {

                return Converter::OrderItemRentConverter($data);
            } else {

                $sql = "INSERT INTO orderitem_rent VALUES (NULL, $this->id, $pidq, $years, $months, $days)";

                $q = mysqli_query($CONNECTION, $sql);

                // var_dump(mysqli_error($CONNECTION));

                if ($q) {
                    $sql = "SELECT * FROM orderitem_rent WHERE order_fk = $this->id AND product_fk = $pidq;";

                    $q = mysqli_query($CONNECTION, $sql);

                    return Converter::OrderItemRentConverter(mysqli_fetch_assoc($q));
                } else {
                    return 0;
                }
            }
        }
    }

    function total_items()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT order_rent_variant.quantity FROM orderitem_rent INNER JOIN order_rent_variant ON orderitem_rent.id = order_rent_variant.orderrent_item_fk
                WHERE orderitem_rent.order_fk = $this->id;";

        $q = mysqli_query($CONNECTION, $sql);

        $sum = 0;

        while ($data = mysqli_fetch_assoc($q)) {

            $sum += intval($data['quantity']);
        }

        return $sum;
    }

    function total_unique_items()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM orderitem_rent WHERE order_fk = $this->id;";

        $q = mysqli_query($CONNECTION, $sql);

        $sum = 0;

        while (mysqli_fetch_assoc($q)) {

            // var_dump($data);
            $sum++;
        }

        return $sum;
    }

    function total_cost()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM product_rent_variant INNER JOIN product_rent ON product_rent.id = product_rent_variant.product_rent_fk INNER JOIN
                order_rent_variant ON order_rent_variant.variant_rent_fk = product_rent_variant.id INNER JOIN orderitem_rent ON order_rent_variant.orderrent_item_fk = orderitem_rent.id
                WHERE orderitem_rent.order_fk = $this->id";

        $q = mysqli_query($CONNECTION, $sql);

        $totalprice = 0;

        while ($data = mysqli_fetch_assoc($q)) {

            // var_dump($data);

            // echo "<br><br><br><br><br>";

            $totalprice += intval($data['priceperday']) * intval($data['quantity']);
        }

        return $totalprice;
    }
}
