<?php

namespace App\Http\Controllers\Admin\PaginasPrincipais;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginasPrincipaisUpdateRequest;
use App\Repositories\PaginasPrincipaisRepository;

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
        if (\Gate::denies('paginas-principais.view')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.dashboard');
        }

        $data = $this->repository->orderBy('txt_titulo')->get();

        return view('admin.paginas-principais.index', compact('data'));
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
        $model = $this->repository->find($id);
        return view('admin.paginas-principais.edit', compact('model'));
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
            if (\Gate::denies('paginas-principais.update')) {

                toastr()->error("Acesso não Autorizado");

                return redirect()->route('admin.paginas-principais.index');
            }

            $data = $request->only(array_keys($request->all()));

            $this->repository->update($data, $id);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('admin.paginas-principais.index');
        } catch (\Exception $e) {
            toastr()->error("Não foi possível alterar o cadastro");
            return redirect()->route('admin.paginas-principais.index');
        }
    }
}
