<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FunctionHelpers;
use App\Http\Controllers\Api\Interface\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class UserController extends Controller implements UserInterface
{
    /***
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /***
     * user getAll data
     * @return array|JsonResponse
     */
    public function getAll(): JsonResponse|array
    {
        try {
            $code = 500;
            $arr = [
              'status' => false,
              'message' => 'There is data'
            ];

            $res = $this->client->request('GET', env('PLACEHOLDERS') . 'users');
            $data = json_decode($res->getBody()->getContents());
            $dbUsers = User::all();
            if (empty($dbUsers->toArray())) {
                foreach ($data as $item) {
                    $array = new User();
                    $array->name = $item->name;
                    $array->save();
                }
                $arr = [
                    'status' => true,
                    'message' => 'success'
                ];
                $code = 200;
            }
            return response()->json($arr, $code);

        } catch (\Exception $exception) {
            return FunctionHelpers::exceptionError(false, 'Error Exception', $exception->getMessage(), 404);

        } catch (GuzzleException $exception) {
            return FunctionHelpers::exceptionError(false, 'Error GuzzleException', $exception->getMessage(), 404);
        }
    }


    /***
     * users getById data
     * @param integer $id
     * @return array|JsonResponse|mixed
     */
    public function getById(int $id): mixed
    {
        try {
            $res = $this->client->request('GET', env('PLACEHOLDERS') . 'users/' . $id);
            $data = json_decode($res->getBody()->getContents());

            if (!empty($data)) {
                return $data;
            } else {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return [
                'status' => false,
                'msg' => 'Error Exception',
                'err' => $exception->getMessage()
            ];
        } catch (GuzzleException $exception) {
            return [
                'status' => false,
                'msg' => 'GuzzleException Exception',
                'err' => $exception->getMessage()
            ];
        }
    }
}
