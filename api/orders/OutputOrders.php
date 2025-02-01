<?php
function OutputOrders($orders){
    if(!empty($orders)){
        foreach($orders as $key => $value){
            $id = $value['id'];
            $name = $value['name'];
            $order_date = $value['order_date'];
            $total = $value['total'];
            $product_details = $value['product_details'];
        echo "
                        <tr>
                        <td>$id</td>
                        <td> $name</td>
                        <td>$order_date</td>
                        <td>$total</td>
                        <td>$product_details</td>
                        <td><i class='fa fa-history' aria-hidden='true'></i></td>
                        <td><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>
                        <td><a href = 'api/product/DeleteProduct.php?id=$id'><i class='fa fa-trash' aria-hidden='true'></a></i></td>  
                        </tr>
        ";
        }
        }
}
?>