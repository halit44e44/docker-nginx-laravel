<?php

namespace App\Http\Controllers\Api\Interface;

use Illuminate\Http\JsonResponse;

interface UserInterface {

    /***
     * @return array|JsonResponse
     */
    public function getAll(): JsonResponse|array;


    /***
     * @param integer $id
     * @return array|JsonResponse|mixed
     */
    public function getById(int $id): mixed;
}
