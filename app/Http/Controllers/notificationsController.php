<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class notificationsController extends Controller
{
    public function marcarLeido($id){
        auth()->user()->unreadNotifications->find($id)->markAsRead();
        return Redirect('/user');
    }
    public function delete($id){
        auth()->user()->notifications->find($id)->delete();
        return  Redirect()->back();
    }
}
