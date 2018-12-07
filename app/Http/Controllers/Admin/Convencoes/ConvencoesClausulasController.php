<?php

namespace App\Http\Controllers\Admin\Convencoes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\ConvencoesClausulasCreateRequest;
use App\Http\Requests\ConvencoesClausulasUpdateRequest;
use App\Http\Requests\ConvencoesClausulasDeleteRequest;
use App\Models\Convencoes;
use App\Repositories\ConvencoesClausulasRepository;
use App\Repositories\ConvencoesRepository;

/**
 * Class ConvencoesClausulasController.
 *
 * @package namespace App\Http\Controllers;
 */
class ConvencoesClausulasController extends Controller
{
    /**
     * @var ConvencoesClausulasRepository
     */
    private $clausulasRepository;
    /**
     * @var ConvencoesRepository
     */
    private $convencoesRepository;

    /**
     * ConvencoesClausulasController constructor.
     *
     * @param ConvencoesClausulasRepository $repository
     */
    public function __construct(
        ConvencoesClausulasRepository $clausulasRepository,
        ConvencoesRepository $convencoesRepository)
    {
        $this->clausulasRepository = $clausulasRepository;
        $this->convencoesRepository = $convencoesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $convencao = $this->convencoesRepository->find($id);
        $clausulas = $convencao->clausulas()->orderBy('num_clausula', 'asc')->paginate();

        return view('admin.clausulas.index', compact('clausulas', 'convencao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Convencoes $convencao)
    {
        return view('admin.clausulas.create', compact('convencao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConvencoesClausulasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConvencoesClausulasCreateRequest $request, Convencoes $convencao)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $this->clausulasRepository->create($data);


            return redirect()->route('admin.convencao.clausulas.index', ['convencao' => $convencao])
                ->with('message', 'Cadastro realizado com sucesso');
        } catch (\Exception $e) {
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
    public function edit(Convencoes $convencao, $id)
    {
        $clausulas = $this->clausulasRepository->find($id);

        return view('admin.clausulas.edit', compact('convencao', 'clausulas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConvencoesClausulasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConvencoesClausulasUpdateRequest $request, $id, $id_clausula)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['id_convencao'] = $id;

            $this->clausulasRepository->update($data, $id_clausula);

            return redirect()->route('admin.convencao.clausulas.index', ['convencao' => $data['id_convencao']])
                ->with('message', 'Editado realizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-message', 'Não foi possível editar a cláusula');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param ConvencoesClausulasDeleteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConvencoesClausulasDeleteRequest $request, $id)
    {
        try{
            $id_clausula = $request->only(array_keys($request->all()))['id_clausula'];
            $this->clausulasRepository->delete($id_clausula);
            $request->session()->flash('message', 'Categoria excluída com sucesso.');
            return redirect()->route('admin.convencao.clausulas.index', ['convencao' => $id])
                ->with('message', 'Cláusula excluído com sucesso');
        }catch (\Exception $e){
            return redirect()->back()->with('error-message', 'Não foi possível excluir a cláusula');
        }
    }
}
