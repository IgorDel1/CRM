<?php
function OutputOrders($orders){
    if(!empty($orders)){
        foreach($orders as $key => $value){
            $id = $value['id'];
            $name = $value['name'];
            $desc = $value['descc'];
            $price = $value['price'];
            $stock = $value['stock'];
        echo "
                        <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$desc</td>
                        <td>$price</td>
                        <td>$stock</td>
                        <td><i class='fa fa-history' aria-hidden='true'></i></td>
                        <td><i class='fa fa-pencil-square-o' aria-hidden='true'></i></td>
                        <td><a href = 'api/product/DeleteProduct.php?id=$id'><i class='fa fa-trash' aria-hidden='true'></a></i></td>  
                        </tr>
        ";
        }
        }
}
?>