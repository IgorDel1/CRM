<?php
function OutputClients($clients){
    if(!empty($clients)){
        foreach($clients as $key => $value){
            $id =$value['id'];
            $name =$value['name'];
            $email =$value['email'];
            $phone=$value['phone'];
            $birthday=$value['birthday'];
            $created_at =$value['created_at'];
        echo "
                        <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$birthday</td>
                        <td>$created_at</td>
                        <td><i  onclick='MicroModal.show(`history-modal`)' class='fa fa-history' aria-hidden='true'></i></td>
                        <td><i onclick='MicroModal.show(`edit-modal`)' class='fa fa-pencil-square-o' aria-hidden='true'></i></td>
                        <td><i  onclick='MicroModal.show(`delete-modal`)' class='fa fa-trash' aria-hidden='true'></i></td>  
                        </tr>
        ";
        }
        }
}
?>