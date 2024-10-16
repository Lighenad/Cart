<?php
////////////////////////////////////////////////////////////////////////////////////////////////////
function AddToUser($dni, $name, $last_name, $age, $password){
    echo "AddToUser<br>";
    $user = _GetUser();

    foreach($user->children() as $child){
        if($child->dni == $dni){
            echo 'El usuario con este dni ya existe';
            return;
        }
    }

    if (strlen($password) >= 8){
        $item = $user->addChild('user');
        $item->addChild('dni', $dni);
        $item->addChild('name', $name);
        $item->addChild('last_name', $last_name);
        $item->addChild('age', $age);
        $item->addChild('password', $password);

        $user->asXML('xmldb/user.xml');
        echo "Usuario añadido correctamente";
        }else{
            echo 'Usuario no añadido, contraseña con pocos caracteres';
        }
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function Login($dni,$password){
    $xml = _GetUser();

    foreach($xml->children() as $child){
        if($child->dni == $dni && $child->password == $password){
            return true;
        }
    }
    return false;
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function _GetUser(){
    if(file_exists('xmldb/user.xml')){
        $user = simplexml_load_file('xmldb/user.xml');
    }else{
        $user = new SimpleXMLElement('<users></users>');
    }
    return $user;
}
?>