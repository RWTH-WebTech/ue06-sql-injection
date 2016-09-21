<?php
$db = new PDO('sqlite:database.sqlite');

function process_formdata(){
    return array_merge(
        process_login(),
        process_pwchange(),
        process_newuser(),
        process_search()
    );
}

function process_login(){
    if(!empty($_GET['login'])){
        $res = login_correct($_GET['login']['name'], $_GET['login']['password']);
        if($res){
            return ['text' => 'Benutzer '.$res['name'].' erfolgreich eingeloggt'];
        }
        return ['text' => 'Login nicht erfolgreich'];
    }
    return [];
}

function process_pwchange(){
    if(!empty($_GET['pwchange'])){
        $res = change_password($_GET['pwchange']['name'], $_GET['pwchange']['old'], $_GET['pwchange']['new']);
        if($res){
            return ['text' => 'Passwort erfolgreich geändert'];
        }
        return ['text' => 'Passwort Änderung nicht erfolgreich'];
    }
    return [];
}

function process_newuser(){
    if(!empty($_GET['newuser'])){
        $res = create_user($_GET['newuser']['name'], $_GET['newuser']['password']);
        if($res){
            return ['text' => 'Benutzer erfolgreich erstellt'];
        }
        return ['text' => 'Benutzer konnte nicht erstellt werden'];
    }
    return [];
}

function process_search(){
    if(!empty($_GET['search'])){
        $users = find_user($_GET['search']['name']);
        if($users){
            $usernames = array_map(function($user){return $user['name'];}, $users);
            return ['text' => 'Benutzer gefunden: '.implode(',', $usernames)];
        }
        return ['text' => 'Keine Benutzer gefunden'];
    }
    return [];
}

function create_user($name, $password){
    global $db;

    $pw = password_hash($password, PASSWORD_DEFAULT);
    return $db->exec("INSERT INTO users (name, password) VALUES ('".$name."', '".$pw."')") > 0;
}

function login_correct($name, $password){
    global $db;

    $res = $db->query("SELECT * FROM users WHERE name = '".$name."'");
    while(($user = $res->fetch()) !== false){
        if(password_verify($password, $user['password'])){
            return $user;
        }
    }
    return false;
}

function change_password($name, $oldPassword, $password){
    global $db;

    $pw = password_hash($password, PASSWORD_DEFAULT);
    if($user = login_correct($name, $oldPassword)){
        $db->exec("UPDATE users SET password = '$pw' WHERE name = '".$user['name']."'");
        return true;
    }
    return false;
}

function find_user($name){
    global $db;

    $res = $db->query("SELECT * FROM users WHERE name = '".$name."'");
    return $res->fetchAll();
}