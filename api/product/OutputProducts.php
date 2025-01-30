<?php
function OutputProducts($products){
    if(!empty($products)){
        foreach($products as $key => $value){
            $id = $value['id'];
            $name = $value['name'];
            $desc = $value['desc'];
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
                        <td><a href = 'api/clients/DeleteClient.php?id=$id'><i class='fa fa-trash' aria-hidden='true'></a></i></td>  
                        </tr>
        ";
        }
        }
}
?>