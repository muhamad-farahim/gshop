<?php



class OrderRentVariantManager
{

    static function change_quantity(int $id, int $quantity)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        $sql = "UPDATE order_rent_variant SET quantity = $quantity WHERE id = $id";

        $q = mysqli_query($CONNECTION, $sql);

        return $q;
    }


    static function create_and_save(object $order, int $rent_variant_fk, array $time, int $quantity = 1)
    {

        $CONNECTION = mysqli_connect('localhost', 'root', '', 'gshop');

        if (!$order || !$rent_variant_fk) {

            return 0;
        }

        $item = $order->check_variant($rent_variant_fk, $time);

        // var_dump($item);

        if (!$item) {

            return 0;
        }

        if (get_class($item) === "OrderItem") {

            $sql = "INSERT INTO order_rent_variant VALUES (NULL, $item->id, $rent_variant_fk, $quantity)";

            $q = mysqli_query($CONNECTION, $sql);
            return $q;
        } elseif (get_class($item) === "OrderVariant") {

            self::change_quantity($item->id, $quantity);

            return 1;
        }
    }
}
