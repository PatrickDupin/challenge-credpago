<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlsFormRequest;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $urls = [
            [
                'address' => 'urldeteste.com.br',
                'response' => 'OK',
                'status_code' => '200',
                'created_at' => date('Y-m-d')
            ],
            [
                'address' => 'abc.com.br',
                'response' => 'NOT FOUND',
                'status_code' => '404',
                'created_at' => date('Y-m-d')
            ],
            [
                'address' => 'globo.com',
                'response' => 'OK',
                'status_code' => '200',
                'created_at' => date('Y-m-d')
            ]
        ];
        return view('url.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('url/cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UrlsFormRequest $request)
    {

        echo '<pre>';

        // Create a cURL handle
        $ch = curl_init($request->url);

        // Execute
        curl_exec($ch);

        // Check if any error occurred
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);
            echo 'Took ', $info['total_time'], ' seconds to send a request to ', $info['url'], "\n";
        }

        // Close handle
        curl_close($ch);







        var_dump($info);
        die();
//        $url = Url::create($request->all());

//        $request->session()->flash(
//            "mensagem",
//            "A URL <em>($url->url)</em>, foi cadastrada com sucesso!"
//        );
//        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Url $urlId
     * @return Response
     */
    public function show($urlId)
    {
        return view('url.index', compact('urlId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Url $url
     * @return Response
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Url $url
     * @return Response
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Url $url
     * @return Response
     */
    public function destroy()
    {
        //
    }
}
