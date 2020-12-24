<?php

/**
 * Raiden-bo Service - Define logic of method need have.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

/**
 * Class RaidenBoService
 *
 * @package App\Services
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class RaidenBoService
{

    /**
     * Uri api raiden-bo.
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * User's token raiden-bo.
     *
     * @var string
     */
    protected $token;

    /**
     * RaidenBoService constructor.
     *
     * @param string $token : New token.
     */
    public function __construct(string $token)
    {
        $this->token  = $token;
        $this->apiUrl = 'https://raidenbo.com/api/';
    }

    /**
     * Get user's balance.
     *
     * @return array
     */
    public function balance()
    {
        $response = Http::withToken($this->token)->get($this->apiUrl . 'wallet/binaryoption/spot-balance');
        return json_decode($response->body(), true);
    }

    /**
     * Get user's profile.
     *
     * @return array
     */
    public function profile()
    {
        $response = Http::withToken($this->token)->get($this->apiUrl . 'auth/me/profile');
        return json_decode($response->body(), true);
    }

    /**
     * Set command raiden-bo.
     *
     * @return array
     */
    public function setCommand()
    {
        $payload = [
            'betType'        => 'UP',
            'betAmount'      => 1,
            'betAccountType' => 'DEMO',
        ];

        $response = Http::withHeaders($this->token)->post($this->apiUrl . 'wallet/binaryoption/bet', $payload);

        return json_decode($response->body(), true);
    }

    /**
     * Get histories price.
     *
     * @return array
     */
    public function pricesHistory()
    {
        $response = Http::withHeaders($this->token)->get($this->apiUrl . 'wallet/binaryoption/prices');
        return json_decode($response->body(), true);
    }
}
