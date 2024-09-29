<?php

use app\models\User;

$users = User::find()->all();
foreach ($users as $user) {
    echo $user->username . '<br>';
}
