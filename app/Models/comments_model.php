<?php

function getCommentsFromFile() {
    $fp = fopen('../app/comments_list.txt', 'r');
    if($fp) {
        while (($data = fread($fp, 4096)) !== false) {
            return $data;
        }
        fclose($fp);
    }
    return false;
}


function getAllComments() {
    $json_data = getCommentsFromFile();
    $json_data .= ']';
    $data = json_decode($json_data, true);
    return $data;
}

function commentAdded($comment){   // TODO комментарии должны быть привязаны к товару!
    if (in_file($comment)) {
        return true;
    }
    return false;
}

function in_file($comment){
    // TODO перед записью в файл обязательна валидация полученного комментария - $comment!!!
    $filename = '../app/comments_list.txt';
    $date = date("F j, Y, g:i a");
    $username = $_SESSION['username'];
    $user = getUserByLogin($username);
    $avatar = $user['preview'];
    $comment_for_json = [
        ["id" => 11,
         "username" => $username,
         "comment" => $comment,
         "date" => $date,
         "avatar" => $avatar
         ]
    ];
    $comment_for_add = json_encode($comment_for_json);
    $comment_for_add = trim($comment_for_add, ']\[');
    $comment_for_add = "," . $comment_for_add;
    $ok = file_put_contents($filename, $comment_for_add, FILE_APPEND);
    return $ok;
}

