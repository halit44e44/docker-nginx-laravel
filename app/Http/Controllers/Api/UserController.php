<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Interface\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function getAll(): \Illuminate\Http\JsonResponse|array
    {
        try {
            $res = $this->client->request('GET', env('PLACEHOLDERS') . 'users');
            $data = json_decode($res->getBody()->getContents());
            $dbUsers = User::all();

            if (empty($dbUsers->toArray())) {
                foreach ($data as $item) {
                    $array = new User();
                    $array->name = $item->name;
                    $array->save();
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'There is data'
                ], 500);
            }
            return response()->json([
                'status' => true,
                'message' => 'success'
            ], 200);

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


    /***
     * users getById data
     * @param integer $id
     * @return array|\Illuminate\Http\JsonResponse|mixed
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
