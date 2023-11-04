<?php

session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] != 1 && $_SESSION['admin'] != 1)
    echo json_encode(array(
        'success' => 0,
        'error' => "You aren't an admin"
    ));
$file_type = $_FILES['cover']['type'][0];
$file_ext = pathinfo($_FILES['cover']['name'][0], PATHINFO_EXTENSION);
$file_tmp = $_FILES['cover']['tmp_name'][0];
$file_name = $_FILES['cover']['name'][0];
$random_name = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
$flag = false;
$error = null;
$MIME_TYPE = array('image/jpeg', 'image/png', 'image/gif');


if (preg_match('/\.(jpeg|jpg|gif|png|bmp|jpe)/', $file_name)) {
    if (filesize($file_tmp) <= 2000048) {
        //controllo MIME TYPE
        if ($file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/gif') {
            //rename
            $file_name_array = explode(".", $file_name);
            $file_name_array[0] = $random_name;
            $file_name = implode(".", $file_name_array);
            $final_path = '../upload/' . $file_name;
            $upload = move_uploaded_file($file_tmp, $final_path);
            if ($upload)
                $flag = true;
        } else {
            $error = "The file must be an image";
        }
    } else $error = "File size > 2MB";
} else {
    $error = "Invalid extension";
}
// Return JSON
if ($flag) {
    echo json_encode(array(
        'success' => 1,
        'path' => $final_path
    ));
} else {
    echo json_encode(array(
        'success' => 0,
        'error' => $error,
    ));
}
