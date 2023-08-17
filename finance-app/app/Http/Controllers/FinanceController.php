<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;

class FinanceController extends Controller
{

    public function finance()
    {
        $result = $this->getFinanceData();

        return view('finance', ['data' => $result]);
    }

    public function financeApi()
    {
        $result = $this->getFinanceData();

        return response()->json(['finance_data' => $result]);
    }

    public function financeChart()
    {
        $result = [];
        $response = $this->getFinanceData();
        foreach ($response->results as $data) {

            $result['dates'][] = date('d-m-Y', $data->t / 1000);
            $result['high'][] = $data->h;
            $result['low'][] = $data->l;
        }

        return response(['finance_data' => $result]);
    }

    //  action called from finance.vue component
    public function financeLib()
    {
        $client = ApiClientFactory::createApiClient();
        $response =
            $client->getHistoricalQuoteData(
                "AAPL",
                ApiClient::INTERVAL_1_DAY,
                new \DateTime("-14 days"),
                new \DateTime("today")
            );

        return view('finance', ['datalib' => $response]);
    }

    // action called via laravel HTTP Client
    private function getFinanceData()
    {
        $url = config('finance.polygon-api.url');
        $paramsArray = config('finance.polygon-api');
        unset($paramsArray['url']);

        $response = Http::get($url, $paramsArray);
        if ($response->failed()) {
            abort($response->status());
        }
        $response = $response->object();

        return $response;
    }
}
