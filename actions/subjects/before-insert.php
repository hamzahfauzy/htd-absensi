<?php

$user = $db->insert('users',[
    'name' => $_POST['subjects']['name'],
    'username' => $_POST['subjects']['phone'],
    'password' => md5(123456),
]);

$db->insert('user_roles',[
    'user_id' => $user->id,
    'role_id' => $_POST['subjects']['role'],
]);

$_POST['subjects']['user_id'] = $user->id;
unset($_POST['subjects']['role']);