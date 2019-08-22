<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ApiNoticiasRequest;
use App\Models\Noticias;
use App\Repositories\NoticiasRepository;
use App\Transformers\NoticiasTransformer;

class NoticiasController extends Controller
{
    use Helpers;

    /**
     * @var NoticiasRepository
     */
    private $noticiasRepository;

    /**
     * NoticiasController constructor.
     * @param NoticiasRepository $noticiasRepository
     */
    public function __construct(NoticiasRepository $noticiasRepository)
    {
        $this->noticiasRepository = $noticiasRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = $this->noticiasRepository->all();
        return $this->item($noticias, new NoticiasTransformer());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiNoticiasRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['dt_noticia'] = convertDateTime($data['dt_noticia'], $data['hr_noticia']);
            unset($data['hr_noticia']);
            $result = $this->noticiasRepository->create($data);
            $response = [
                'message' => 'Cadastro criado com sucesso.',
                'data' => $result->toArray(),
            ];
            return response()->json($response);
        } catch (ModelNotFoundException $e) {
            $response = [
                'error' => 'Não foi possível criar o cadastro',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $noticias = $this->noticiasRepository->find($id);
            return $this->item($noticias, new NoticiasTransformer());
        } catch (ModelNotFoundException $exception) {
            $response = [
                'error' => 'Não existe a consulta solicitada',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiNoticiasRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['dt_noticia'] = convertDateTime($data['dt_noticia'], $data['hr_noticia']);
            unset($data['hr_noticia']);
            return $this->noticiasRepository->update($data, $id);
        } catch (ModelNotFoundException $e) {
            $response = [
                'error' => 'Não foi possível executar o update',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }
}
