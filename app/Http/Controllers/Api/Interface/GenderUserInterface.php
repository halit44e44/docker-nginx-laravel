<?php

namespace App\Http\Controllers\Api\Interface;

use Illuminate\Http\JsonResponse;

interface GenderUserInterface {
    /***
     * @param string $name
     * @return array|JsonResponse
     */
    public function getById(string $name): JsonResponse|array;
}
