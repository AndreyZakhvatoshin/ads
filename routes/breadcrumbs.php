<?php

use App\Models\User;
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
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->parent('home');
    $trail->push('Панель администрирования', route('admin.home'));
});
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Пользователи', route('admin.users.index'));
});
Breadcrumbs::for('admin.users.show', function ($trail, User $user) {
    $trail->parent('admin.users.index');
    $trail->push($user->name, route('admin.users.show', $user));
});
Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->parent('admin.users.index');
    $trail->push('Добавление пользователя', route('admin.users.create'));
});
Breadcrumbs::for('verification.notice', function ($trail) {
    $trail->parent('home');
    $trail->push('Подтвердите email', route('verification.notice'));
});
