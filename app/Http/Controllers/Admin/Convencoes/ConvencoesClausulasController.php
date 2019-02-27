<?php

namespace App\Http\Controllers\Admin\Convencoes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\ConvencoesClausulasCreateRequest;
use App\Http\Requests\ConvencoesClausulasUpdateRequest;
use App\Http\Requests\ConvencoesClausulasDeleteRequest;
use App\Models\Convencoes;
use App\Models\ConvencoesClausulas;
use App\Models\ConvencoesEntidade;
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
    public function index(ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes)
    {
        $clausulas = $convencoes->clausulas()->orderBy('num_clausula', 'asc')->paginate();

        return view('admin.clausulas.index', compact('clausulas', 'convencoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($convencoes_entidade, Convencoes $convencoes)
    {
        if (\Gate::denies('convencoes.create')) {
            return redirect()->back()->with('error-message', 'Acesso não Autorizado');
        }

        return view('admin.clausulas.create', compact('convencoes'));
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
    public function store(ConvencoesClausulasCreateRequest $request, Convencoes $convencoes)
    {
        dd($convencoes);
        try {
            $data = $request->only(array_keys($request->all()));

            $this->clausulasRepository->create($data);

            return redirect()->route('admin.convencao.clausulas.index', [
                'convencoes_entidade' => $convencoes->fl_entidade,
                'convencoes' => $convencoes->id_convencao
            ])->with('message', 'Cadastro realizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-message', 'Não foi possível realizar o cadastro' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes, ConvencoesClausulas $clausula)
    {
        if (\Gate::denies('convencoes.update')) {
            return redirect()->back()->with('error-message', 'Acesso não Autorizado');
        }

        return view('admin.clausulas.edit', compact('convencoes', 'clausula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConvencoesClausulasUpdateRequest $request
     * @param  string $id
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
        try {
            if (\Gate::denies('convencoes.delete')) {
                return redirect()->back()->with('error-message', 'Acesso não Autorizado');
            }

            $id_clausula = $request->only(array_keys($request->all()))['id_clausula'];
            $this->clausulasRepository->delete($id_clausula);
            return redirect()->route('admin.convencao.clausulas.index', ['convencao' => $id])
                ->with('message', 'Cláusula excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-message', 'Não foi possível excluir a cláusula');
        }
    }
}
