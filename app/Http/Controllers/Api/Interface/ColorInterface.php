<?php

namespace App\Http\Controllers\Api\Interface;

use App\Helpers\FunctionHelpers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface ColorInterface {

    /***
     * @param Request $request
     * @param int|null $id
     */
    public function getColor(Request $request, int $id= null);
}
