<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('App.Models.Food', function ($user) {
    return true;
});
Broadcast::channel('App.Models.Food.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('App.Models.Order', function ($user) {
    return true;
});
Broadcast::channel('App.Models.Order.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('App.Models.Comment', function ($user) {
    return true;
});
Broadcast::channel('App.Models.Comment.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('App.Models.Category', function ($user) {
    return true;
});
Broadcast::channel('App.Models.Category.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('App.Models.Partner', function ($user) {
    return true;
});
Broadcast::channel('App.Models.Partner.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('App.Models.Table', function ($user) {
    return true;
});
Broadcast::channel('App.Models.Table.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('App.Models.User', function ($user) {
    return true;
});
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return true;
});
