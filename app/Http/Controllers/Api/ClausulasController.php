<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApiConvencoesClausulasDeleteRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiConvencoesClausulasCreateRequest;
use App\Http\Requests\ApiConvencoesClausulasUpdateRequest;
use App\Repositories\ConvencoesClausulasRepository;

class ClausulasController extends Controller
{
    /**
     * @var ConvencoesClausulasRepository
     */
    private $repository;

    /**
     * ClausulasController constructor.
     */
    public function __construct(ConvencoesClausulasRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->repository->all();
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiConvencoesClausulasCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $result = $this->repository->create($data);
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
            $response = $this->repository->find($id);
            return response()->json($response);
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
    public function update(ApiConvencoesClausulasUpdateRequest $request, $id)
    {
        try{
            $data = $request->only(array_keys($request->all()));
            $result = $this->repository->update($data, $id);
            $response = [
                'message' => 'Cadastro editado com sucesso.',
                'data'    => $result->toArray(),
            ];
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response = [
                'error' => 'Não foi possível executar o update',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->repository->delete($id);
            $response = [
                'message' => 'Cadastro excluído com sucesso.',
                'data'    => $id,
            ];
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response = [
                'error' => 'Não foi possível executar a exclusão',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        }
    }
}
