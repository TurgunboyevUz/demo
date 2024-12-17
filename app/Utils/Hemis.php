<?php

namespace App\Utils;

use Carbon\Carbon;
use Illuminate\Support\Arr;

class Hemis
{
    public $token;
    public $base_uri = 'https://student.andmiedu.uz/rest/v1/';
    public $response;

    public function __construct($token = null)
    {
        $this->token = $token;
    }

    public function get($method, $query = [])
    {
        $client = new Client;
        $response = $client->base_uri($this->base_uri)->query($query)->token($this->token)->get($method);

        $this->response = $response;

        return $this;
    }

    public function post($method, $data = [])
    {
        $client = new Client;
        $client->base_uri($this->base_uri)->data($data);

        if ($this->token) {$client->token($this->token);}

        $response = $client->post($method);

        $this->response = $response;

        return $this;
    }

    public function code()
    {
        return $this->response->code;
    }

    public function body()
    {
        return $this->response->body;
    }

    public function json($key = null, $default = null)
    {
        if ($this->code() !== 200) {
            return;
        }

        $json = json_decode($this->body(), true);

        if (is_null($key)) {
            return $default ?? $json;
        }

        return Arr::get($json, $key, $default);
    }

    public function login($login, $password)
    {
        $response = $this->post('auth/login', compact('login', 'password'));

        return $response->json('data.token', 'default');
    }

    public function employee_list($query = [])
    {
        $response = $this->get('data/employee-list', $query);

        return $response->json('data');
    }
}