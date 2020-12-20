<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

/**
 * Class RaidenBoService
 *
 * @package App\Services
 */
class RaidenBoService
{
    /**
     * @var string
     */
    protected $apiUrl;
    /**
     * @var
     */
    protected $token;

    /**
     * RaidenBoService constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->apiUrl = 'https://raidenbo.com/api/';
    }

    public function balance()
    {
        $client = new \GuzzleHttp\Client();
        $response = Http::withToken($this->token)->get($this->apiUrl . 'wallet/binaryoption/spot-balance');
    }

    /**
     * @return array
     */
    public function profile()
    {
        $response = Http::withToken($this->token)->get($this->apiUrl . 'auth/me/profile');
        return json_decode($response->body(), true);
    }

    public function setCommand()
    {
        $payload = ["betType" => "UP", "betAmount" => 1, "betAccountType" => "DEMO"];
        $response = Http::withHeaders($this->token)
            ->post($this->apiUrl . 'wallet/binaryoption/bet', $payload);
        return json_decode($response->body(), true);
    }

    public function pricesHistory()
    {
        $response = Http::withHeaders($this->token)->get($this->apiUrl . 'wallet/binaryoption/prices');
    }
}
