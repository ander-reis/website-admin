<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiNoticiasCategoriasRequest;
use App\Repositories\NoticiasCategoriaRepository;

class NoticiasCategoriasController extends Controller
{
    /**
     * @var NoticiasCategoriaRepository
     */
    private $noticiasCategoriaRepository;

    /**
     * NoticiasCategoriasController constructor.
     */
    public function __construct(NoticiasCategoriaRepository $noticiasCategoriaRepository)
    {
        $this->noticiasCategoriaRepository = $noticiasCategoriaRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->noticiasCategoriaRepository->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiNoticiasCategoriasRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $result = $this->noticiasCategoriaRepository->create($data);
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
            return $this->noticiasCategoriaRepository->find($id);
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
    public function update(Request $request, $id)
    {
        try{
            $data = $request->only(array_keys($request->all()));
            return $this->noticiasCategoriaRepository->update($data, $id);
        }catch (ModelNotFoundException $e){
            $response = [
                'error' => 'Não foi possível executar o update',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }
}
