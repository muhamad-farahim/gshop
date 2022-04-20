<?php



class OrderVariantManager
{

    static function change_quantity(int $id, int $quantity)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "UPDATE order_variant SET quantity = $quantity WHERE id = $id";

        $q = mysqli_query($CONNECTION, $sql);

        return $q;
    }


    static function create_and_save(object $order, int $variant_fk, int $quantity = 1)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        if (!$order || !$variant_fk) {

            return 0;
        }

        $item = $order->check_variant($variant_fk);

        var_dump($item);

        if (get_class($item) === "OrderItem") {

            $sql = "INSERT INTO order_variant VALUES (NULL, $item->id, $variant_fk, $quantity)";

            $q = mysqli_query($CONNECTION, $sql);

            return $q;
        } elseif (get_class($item) === "OrderVariant") {

            self::change_quantity($item->id, $quantity);

            return 1;
        }
    }
}
