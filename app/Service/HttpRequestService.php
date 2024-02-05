<?php

namespace App\Service;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HttpRequestService
{
    /**
     * @param string $url
     * @return Response
     */
    public function getDataByGetMehtod(string $url = "", ?string $query = null): Response
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => config('api.authorization'),
            'x-api-key' => config('api.api_key'),
        ])->get($url, $query);
    }


    public function getLoginUser(string $url = "https://foru-ms.vercel.app/api/v1/auth/me"): Response
    {
        if (!session()->has('userData') && !in_array(session()->get('userData')?->status() ?? 401, [200, 201])) {
            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => "Bearer " . session()->get('token'),
                'x-api-key' => config('api.api_key'),
            ])->get($url);

            session()->put('userData', $user);
        }

        return session()->get('userData');
    }

    /**
     * @param string $url
     * @return Response
     */
    public function postData(string $url = "", array $data = []): Response
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => config('api.authorization'),
            'x-api-key' => config('api.api_key'),
        ])->post($url, $data);
    }

    //fbe21140-5e8e-45ba-8c6a-931281e4627e
}
