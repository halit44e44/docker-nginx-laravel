<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use MongoDB\Model\BSONArray;

class NewUsersCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cp:new-users-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Var olan APIda herhangi bir farklılık algılarsa bunu db ye kayıt eder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $client = new Client();
        $res = $client->request('GET', env('PLACEHOLDERS') . 'users');
        $data = json_decode($res->getBody()->getContents());

        foreach ($data as $item) {
            User::firstOrCreate(
                [
                    'name' => (string)$item->name
                ],
                [
                    'name' => (string)$item->name
                ]
            );
        }
    }
}
