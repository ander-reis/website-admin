<?php

namespace App\Http\Controllers\Admin\PaginasPrincipais;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginasPrincipaisCreateRequest;
use App\Http\Requests\PaginasPrincipaisDeleteRequest;
use App\Http\Requests\PaginasPrincipaisUpdateRequest;
use App\Models\MenuItems;
use App\Repositories\PaginasPrincipaisRepository;
use Carbon\Carbon;

/**
 * Class PaginasPrincipaisController.
 *
 * @package namespace App\Http\Controllers;
 */
class PaginasPrincipaisController extends Controller
{
    /**
     * @var PaginasPrincipaisRepository
     */
    protected $repository;

    /**
     * PaginasPrincipaisController constructor.
     *
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
        $paginas = $this->repository->orderBy('id_pagina')->paginate();

        return view('admin.paginas-principais.index', compact('paginas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paginas-principais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaginasPrincipaisCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PaginasPrincipaisCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            /**
             * cria url
             */
            $url = removeSpecialChars($data['txt_titulo']);
            $data['url_pagina'] = customUrl($url);

            /**
             * cadastra pagina
             */
            $this->repository->create($data);

            return redirect()->route('admin.paginas.index')->with('message', 'Cadastro realizado com sucesso');
        } catch (\Exception $e) {
            /**
             * se houver título duplicado
             */
            if($e->getCode() == 23505){
                return redirect()->back()->with('error-message', 'Não foi possível realizar o cadastro: TÍTULO DUPLICADO');
            }
            return redirect()->back()->with('error-message', 'Não foi possível realizar o cadastro');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagina = $this->repository->find($id);

        return view('admin.paginas-principais.edit', compact('pagina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PaginasPrincipaisUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     */
    public function update(PaginasPrincipaisUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            /**
             * cria url
             */
            $url = removeSpecialChars($data['txt_titulo']);
            $data['url_pagina'] = customUrl($url);

            $this->repository->update($data, $id);

            return redirect()->to($data['redirects_to'])->with('message', 'Página editado com sucesso');
        } catch (\Exception $e) {
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível editar a página');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginasPrincipaisDeleteRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $this->repository->delete($data['id_pagina']);

            return redirect()->to($data['redirects_to'])->with('message', 'Página excluído com sucesso');
        } catch (\Exception $e){
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível excluir a página');
        }
    }
}
