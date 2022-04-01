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
    public function index(Request $request)
    {
        $urls = Url::where('id_usuario', $request->session()->get('user')->id)
            ->get();

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
//        $dados = $this->getHeaderDatas($request->url);

        $url = Url::create([
            'url'         => $request->url,
            'status_code' => '200',
            'response'    => 'teste',
            'id_usuario'  => $request->session()->get('user')->id
        ]);

        toastr()->success("A URL <em>($url->url)</em>, foi cadastrada com sucesso!");
        return redirect()->route('url.create');
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

    /**
     * @param $url
     * @return mixed
     */
    private function getHeaderDatas($url)
    {
        echo '<pre>';
        // Create a cURL handle
        $ch = curl_init($url);
        // Execute
        curl_exec($ch);
        // Check if any error occurred
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);
        }
        // Close handle
        curl_close($ch);

        var_dump($info);
        die();
//        return $info;
    }
}
