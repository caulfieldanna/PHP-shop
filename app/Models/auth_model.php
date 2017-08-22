<?php

function getUsersFromFile() {
    $fp = fopen('../app/users_list.txt', 'r');
    if($fp) {
        while (($data = fread($fp, 4096)) !== false) {
            return $data;
        }
        fclose($fp);
    }
    return false;
}


function getAllUser() {
    $json_data = getUsersFromFile();
    $json_data .= ']';
    $data = json_decode($json_data, true);
    return $data;
}

function login($login, $pwd) {
    $users_arr = getAllUser(); //123
    foreach ($users_arr as $key => $value) {
        if (($users_arr[$key]['login'] == $login) && (password_verify($pwd, $users_arr[$key]['hash']))) {
            $_SESSION['username'] = $login;
            setcookie('user_id', $pwd); // TODO генерировать уникальный id в целях безопасности!!!
            return true;
        }
    }
    return false;

}


function is_session() {
    if(isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

function getUserByLogin($login) {
    $users_arr = getAllUser();
    foreach ($users_arr as $key => $value) {
        if ($users_arr[$key]['login'] == $login) {
            return $value;
        }
    }
    return false;
}

function is_admin($login){
    $user_arr = getUserByLogin($login);
    if ($user_arr['role'] == 'admin') {
        return true;
    }
    return false;

}

