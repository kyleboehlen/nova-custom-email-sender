<?php


namespace Dniccum\CustomEmailSender\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NebulaSenderController
{
    use ApiController;

    /**
     * Gets the list of sent messages
     *
     * @param Request $request
     * @return mixed
     */
    public function messages(Request $request)
    {
        $response = Http::withToken($this->key)
            ->get($this->apiRoute.'/message');

        return response()->json([
            'data' => $response->json('data')
        ]);
    }

    /**
     * Clones a message (draft or sent) to create a new draft
     *
     * @param string $message
     * @param Request $request
     * @return mixed
     */
    public function clone(string $message, Request $request)
    {
        $response = Http::withToken($this->key)
            ->post($this->apiRoute.'/message/'.$message.'/clone');

        return response()->json([
            'data' => $response->json('data')
        ]);
    }
}