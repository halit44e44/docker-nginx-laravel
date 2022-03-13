<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FunctionHelpers;
use App\Http\Controllers\Api\Interface\ColorInterface;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ColorController extends Controller implements ColorInterface
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
     * @param Request $request
     * @param int|null $id
     * @return JsonResponse|mixed|void
     */
    public function getColor(Request $request, int $id= null)
    {
        try {
            $res = $this->client->request('GET', env('REQRES') . 'get/' . $id, [
                'query' => [
                    'page' => $request->input('page'),
                    'per_page' => $request->input('perPage')
                ]
            ]);
            if ($res->getStatusCode() === 200) {
                return json_decode($res->getBody()->getContents());
            }
        } catch (\Exception $exception) {
            return FunctionHelpers::exceptionError(false, 'Error Exception', $exception->getMessage(), 404);
        } catch (GuzzleException $exception) {
            return FunctionHelpers::exceptionError(false, 'Error GuzzleException', $exception->getMessage(), 404);
        }
    }
}
