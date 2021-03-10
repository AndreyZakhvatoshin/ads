<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('Вход', route('login'));
});
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('Регистрация', route('register'));
});
Breadcrumbs::for('cabinet', function ($trail) {
    $trail->parent('home');
    $trail->push('Личный кабинет', route('cabinet'));
});
