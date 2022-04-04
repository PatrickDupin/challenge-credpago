<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlsFormRequest;
use App\Models\Url;
use Carbon\Carbon;
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

            toastr()->success("URL cadastrada com sucesso!");
            return redirect()->route('url.index');
        } catch (\Error $error) {
            toastr()->success('Erro ao tentar incluir a URL.');
            return redirect()->route('inicio');
        }
    }

    public function update($urlId)
    {
        try {
            $url = Url::where('id',$urlId)->first();
            $dados = $this->getRequestDatas($url->url);

            $url->update([
                'status_code' => $dados['http_code'],
                'response'    => $dados['body'],
                'created_at' => Carbon::now()
            ]);

            toastr()->success('URL atualizada com sucesso!');
            return redirect()->route('url.index');
        } catch (\Error $error) {
            toastr()->error('Erro ao tentar atualizar a URL.');
            return redirect()->route('inicio');
        }
    }

    public function destroy($idUrl)
    {
        try {
            Url::destroy($idUrl);
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

        $body_response = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);

        return $info + ['body' => $body_response];
    }
}
