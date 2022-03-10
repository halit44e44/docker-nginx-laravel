<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Interface\GenderUserInterface;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;

class GenderUserController extends Controller implements GenderUserInterface
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
     * @param string $name
     * @return array|JsonResponse
     */
    public function getById(string $name): JsonResponse|array
    {
        try {
            $res = $this->client->request('GET', env('GENDER') . 'get', [
                'query' => [
                    'key' => env('GENDER_KEY'),
                    'name' => $name
                ]
            ]);
            //Data her koşulda doğru dönüyor onun için bir sorgulama yapamadım direk datayı bastım. Ne kadar doğru tartışılır.
            $data = json_decode($res->getBody()->getContents());
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => [
                    $data
                ]
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
}
