<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /***
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('users.index');
    }
    /***
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function serverSideDataTable(): mixed
    {
        Cache::remember('User:array', 120, function () {
            try {
                $query = User::select('*')->get();
                return $query->toArray();
            } catch (\Exception $exception) {
                return [];
            }
        });
        return datatables(Cache::get('User:array'))->make(true);
    }
}
