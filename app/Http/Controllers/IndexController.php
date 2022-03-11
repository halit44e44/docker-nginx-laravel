<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        Cache::remember('index:usersCount', 500, function () {
            return User::count();
        });

        return view('index', [
            'usersCount' => Cache::get('index:usersCount')
        ]);
    }
}
