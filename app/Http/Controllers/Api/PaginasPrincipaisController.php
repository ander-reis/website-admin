<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApiPaginasPrincipaisRequest;
use App\Repositories\PaginasPrincipaisRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

class PaginasPrincipaisController extends Controller
{
    /**
     * @var PaginasPrincipaisRepository
     */
    private $repository;

    /**
     * PaginasPrincipaisController constructor.
     * @param PaginasPrincipaisRepository $repository
     */
    public function __construct(PaginasPrincipaisRepository $repository)
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
        $paginas = $this->repository->all();

        return response()->json($paginas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApiPaginasPrincipaisRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiPaginasPrincipaisRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            /**
             * cria url
             */
            $url = removeSpecialChars($data['txt_titulo']);
            $data['url_pagina'] = customUrl($url);

            $result = $this->repository->create($data);
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
        } catch (QueryException $e) {
            $response = [
                'error' => 'Não foi possível realizar o cadastro: TÍTULO DUPLICADO',
                'status_code:' => 401
            ];
            return response()->json($response, 401);
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
        try {
            $pagina = $this->repository->find($id);
            return $pagina;
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
     * @param ApiPaginasPrincipaisRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiPaginasPrincipaisRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            /**
             * cria url
             */
            $url = removeSpecialChars($data['txt_titulo']);
            $data['url_pagina'] = customUrl($url);

            $result = $this->repository->update($data, $id);

            $response = [
                'message' => 'Cadastro alterado com sucesso.',
                'data' => $result->toArray(),
            ];
            return response()->json($response);
        } catch (ModelNotFoundException $e) {
            $response = [
                'error' => 'Não foi possível executar o update',
                'status_code:' => 422
            ];
            return response()->json($response, 422);
        } catch (QueryException $e) {
            $response = [
                'error' => 'Não foi possível alterar o cadastro: TÍTULO DUPLICADO',
                'status_code:' => 401
            ];
            return response()->json($response, 401);
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
