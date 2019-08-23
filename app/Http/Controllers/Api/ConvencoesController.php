<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConvencoesCreateRequest;
use App\Http\Requests\ConvencoesUpdateRequest;
use App\Repositories\ConvencoesRepository;
use App\Transformers\ConvencoesTransformer;


class ConvencoesController extends Controller
{
    /**
     * Trait usado para transformer
     */
    use Helpers;

    /**
     * @var ConvencoesRepository
     */
    private $convencoesRepository;

    /**
     * ConvencoesController constructor.
     * @param ConvencoesRepository $convencoesRepository
     */
    public function __construct(ConvencoesRepository $convencoesRepository)
    {
        $this->convencoesRepository = $convencoesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convencoes = $this->convencoesRepository->paginate();
        return $this->item($convencoes, new ConvencoesTransformer());
    }

    /**
     * Store a newly created resource in storage.
     * @param ConvencoesCreateRequest $request
     * @return array
     */
    public function store(ConvencoesCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            if(array_key_exists('ds_titulo', $data)){
                $result = $this->convencoesRepository->create($data);
            }

            $response = [
                'message' => 'Cadastro criado com sucesso.',
                'data'    => $result->toArray(),
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $convencao = $this->convencoesRepository->find($id);
            return $this->item($convencao, new ConvencoesTransformer());

        }catch (ModelNotFoundException $exception){
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConvencoesUpdateRequest $request, $id)
    {
        try{
            $data = $request->only(array_keys($request->all()));

            return $this->convencoesRepository->update($data, $id);
        }catch (ModelNotFoundException $e){
            $response = [
                'error' => 'Não foi possível executar o update',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }
}
