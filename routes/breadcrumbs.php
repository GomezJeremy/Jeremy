<?php

use DaveJamesMiller\Breadcrumbs\Generator;

Breadcrumbs::register('users', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.dashboard.title'), route('dashboard'));
    $breadcrumbs->push(__('views.users.index.title'));
});

Breadcrumbs::register('users.show', function (Generator $breadcrumbs, \App\Models\Auth\User\User $user) {
    $breadcrumbs->push(__('views.dashboard.title'), route('dashboard'));
    $breadcrumbs->push(__('views.users.index.title'), route('users'));
    $breadcrumbs->push(__('views.users.show.title', ['name' => $user->name]));
});


Breadcrumbs::register('users.edit', function (Generator $breadcrumbs, \App\Models\Auth\User\User $user) {
    $breadcrumbs->push(__('views.dashboard.title'), route('dashboard'));
    $breadcrumbs->push(__('views.users.index.title'), route('users'));
    $breadcrumbs->push(__('views.users.edit.title', ['name' => $user->name]));
});
