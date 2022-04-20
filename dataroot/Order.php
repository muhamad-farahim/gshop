<?php

require_once './staticmethod/static.php';

require_once './dataroot/OrderItem.php';

class Order
{

    function __construct(int $id, int $user_fk, ?int $invoice,  bool $is_completed)
    {
        $bool = $is_completed ? 1 : 0;

        $this->id = $id;
        $this->user_fk = $user_fk;
        $this->invoice = $invoice;
        $this->is_completed = $bool;
    }


    function check_variant($variant_id)
    {


        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT order_variant.id, order_variant.order_item_fk, order_variant.variant_fk, order_variant.quantity FROM orderitem
                INNER JOIN order_variant ON orderitem.id = order_variant.order_item_fk WHERE order_variant.variant_fk = $variant_id AND
                orderitem.order_fk = $this->id";

        $q = mysqli_query($CONNECTION, $sql);

        $data = mysqli_fetch_assoc($q);



        if ($data) {
            return Converter::OrderVariantConverter($data);
        } else {

            $sql = "SELECT product_fk FROM variant WHERE id = $variant_id;";

            $q = mysqli_query($CONNECTION, $sql);

            if (!$q) {

                return 0;
            }

            $data = mysqli_fetch_assoc($q);

            if (!$data) {
                return 0;
            }

            $pidq = intval($data['product_fk']);

            $sql = "SELECT * FROM orderitem WHERE product_fk = $pidq AND order_fk = $this->id";

            $q = mysqli_query($CONNECTION, $sql);

            if (!$q) {

                return 0;
            }

            $data = mysqli_fetch_assoc($q);

            if ($data) {

                return Converter::OrderItemConverter($data);
            } else {

                $sql = "INSERT INTO orderitem VALUES (NULL, $this->id, $pidq)";

                $q = mysqli_query($CONNECTION, $sql);

                if ($q) {
                    $sql = "SELECT * FROM orderitem WHERE order_fk = $this->id AND product_fk = $pidq;";

                    $q = mysqli_query($CONNECTION, $sql);

                    return Converter::OrderItemConverter(mysqli_fetch_assoc($q));
                } else {
                    return 0;
                }
            }
        }
    }

    //AMBIL JUMLAH ITEM DI ORDER
    function total_items()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT order_variant.quantity FROM orderitem INNER JOIN order_variant ON orderitem.id = order_variant.order_item_fk
                WHERE orderitem.order_fk = $this->id;";

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

        $sql = "SELECT * FROM orderitem WHERE order_fk = $this->id;";

        $q = mysqli_query($CONNECTION, $sql);

        $sum = 0;

        while ($data = mysqli_fetch_assoc($q)) {

            // var_dump($data);
            $sum++;
        }

        return $sum;
    }

    function total_cost()
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "SELECT * FROM variant INNER JOIN product ON product.id = variant.product_fk INNER JOIN
                order_variant ON order_variant.variant_fk = variant.id INNER JOIN orderitem ON order_variant.order_item_fk = orderitem.id
                WHERE orderitem.order_fk = $this->id";

        $q = mysqli_query($CONNECTION, $sql);

        $totalprice = 0;

        while ($data = mysqli_fetch_assoc($q)) {

            $totalprice += intval($data['price']) * intval($data['quantity']);
        }

        return $totalprice;
    }
}
