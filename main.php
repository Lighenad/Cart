<?php
include_once("com/cart/cart.php");
include_once("com/user/users.php");
//AddToCart('3',57);
//AddToUser('123496','Abraham','Zavala','20','aaron1234');
//RemoveFromCart(4)
//ViewCart();
//UpdateCart(1,30);

$function = $_GET['function'];
//$dni = $_GET['dni'];
//$password = $_GET['password'];
//$id_prod = $_GET['id_prod'];
//$quantity = $_GET['quantity'];
//$name = $_GET['name'];
//$last_name = $_GET['last_name'];
//$age = $_GET['age'];
//$discount = $_GET['discount'];

switch($function){
    case 'Login':
        $function2 = $_GET['function2'];
        $dni = $_GET['dni'];
        $password = $_GET['password'];
        if(Login($dni,$password)){
            switch($function2){
                case 'AddToCart':
                    $id_prod = $_GET['id_prod'];
                    $quantity = $_GET['quantity'];
                    AddToCart($id_prod,$quantity,$dni,$password);
                    break;
                case 'RemoveFromCart':
                    $id_prod = $_GET['id_prod'];
                    RemoveFromCart($id_prod,$dni,$password);
                    break;
                case 'ViewCart':
                    $discount = $_GET['discount'];
                    ViewCart($dni,$password,$discount);
                    break;
                case 'UpdateCart':
                    $id_prod = $_GET['id_prod'];
                    $quantity = $_GET['quantity'];
                    UpdateCart($id_prod,$quantity,$dni,$password);
                    break;
                default:
                    echo 'Hola mundo';
            }
        }else{
            echo 'User no exist';
        }
        break;
    case 'AddToUser':
        $dni = $_GET['dni'];
        $name = $_GET['name'];
        $last_name = $_GET['last_name'];
        $age = $_GET['age'];
        $password = $_GET['password'];
        AddToUser($dni,$name,$last_name,$age,$password);
        break;
}
?>