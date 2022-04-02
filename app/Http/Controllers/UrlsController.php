<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlsFormRequest;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlsController extends Controller
{

    public function index(Request $request)
    {
        try {
            $urls = Url::where('id_usuario', $request->session()->get('user')->id)
                ->get();

            return view('url.index', compact('urls'));
        } catch (\Error $error) {
            toastr()->success("Erro ao tentar listar as URL's.");
            return redirect()->route('inicio');
        }
    }

    public function create()
    {
        return view('url/cadastrar');
    }

    public function store(UrlsFormRequest $request)
    {
        try {
            $dados = $this->getRequestDatas($request->url);

            $url = Url::create([
                'url'         => $request->url,
                'status_code' => $dados['http_code'],
                'response'    => $dados['body'],
                'id_usuario'  => $request->session()->get('user')->id
            ]);

            toastr()->success("A URL <em>($url->url)</em>, foi cadastrada com sucesso!");
            return redirect()->route('url.create');
        } catch (\Error $error) {
            toastr()->success('Erro ao tentar incluir a URL.');
            return redirect()->route('inicio');
        }
    }

    public function update($urlId)
    {
        try {
            $url = Url::find($urlId)->first();
            $url->update([
                'created_at' => date('Y-m-d H:i:s')
            ]);
            toastr()->success('URL atualizada com sucesso!');
            return redirect()->route('url.index');
        } catch (\Error $error) {
            toastr()->error('Erro ao tentar atualizar a URL.');
            return redirect()->route('inicio');
        }
    }

    public function destroy(Request $request)
    {
        try {
            Url::destroy($request->id);
            toastr()->success('URL excluída com sucesso!');
            return redirect()->route('url.index');
        } catch (\Error $error) {
            toastr()->success('Erro ao tentar excluir a URL.');
            return redirect()->route('inicio');
        }
    }

    private function getRequestDatas($url): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        $info = curl_getinfo($curl);
        $body_response = curl_exec($curl);
        curl_close($curl);
dd($info);
        return $info + ['body' => $body_response];;
    }
}
