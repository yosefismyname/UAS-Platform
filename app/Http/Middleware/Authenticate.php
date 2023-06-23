<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;


class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                Session::put('url.intended', $request->url()); // Menyimpan URL tujuan sebelumnya ke dalam session
                return route('admin.admsign'); // Mengarahkan ke halaman login admin
            } else {
                Session::put('url.intended', $request->url()); // Menyimpan URL tujuan sebelumnya ke dalam session
                return route('login'); // Mengarahkan ke halaman login pengguna reguler
            }
        }
    }
}