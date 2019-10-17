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
        $permission_update = true;
        $permission_destroy = true;

        $clausulas = $convencoes->clausulas()
            ->orderBy('num_clausula', 'asc')
            ->paginate(15, ['id_clausula', 'ds_titulo', 'num_clausula', 'fl_status']);

        if (\Gate::denies('clausulas.view')) {
            toastr()->error("Acesso não Autorizado");
            return redirect()->route('admin.dashboard');
        }
        if (\Gate::denies('clausulas.update')) {
            $permission_update = false;
        }
        if (\Gate::denies('clausulas.delete')) {
            $permission_destroy = false;
        }

        return view('admin.clausulas.index', compact('clausulas', 'convencoes', 'permission_update', 'permission_destroy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($convencoes_entidade, Convencoes $convencoes)
    {
        if (\Gate::denies('clausulas.create')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->back();
        }

        return view('admin.clausulas.create', compact('convencoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConvencoesClausulasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConvencoesClausulasCreateRequest $request, ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['id_convencao'] = $convencoes->id_convencao;

            $this->clausulasRepository->create($data);

            toastr()->success('Cadastrado com sucesso!');

            return redirect()->route('admin.convencao.clausulas.index', [
                'convencoes_entidade' => $convencoesEntidade->id,
                'convencoes' => $convencoes->id_convencao
            ]);
        } catch (\Exception $e) {

            toastr()->error("Não foi possível realizar o cadastro");

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes, ConvencoesClausulas $clausula)
    {
        if (\Gate::denies('clausulas.update')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->back();
        }

        return view('admin.clausulas.edit', compact('convencoesEntidade', 'convencoes', 'clausula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConvencoesClausulasUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConvencoesClausulasUpdateRequest $request, ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes, ConvencoesClausulas $clausula)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $this->clausulasRepository->update($data, $clausula->id_clausula);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('admin.convencao.clausulas.index', [
                'convencoes_entidade' => $convencoesEntidade->id,
                'convencoes' => $convencoes->id_convencao
            ]);
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro");

            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param ConvencoesClausulasDeleteRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConvencoesClausulasDeleteRequest $request, $convencoes_entidade, $id_convencao)
    {
        try {
            if (\Gate::denies('convencoes.delete')) {
                return redirect()->back()->with('error-message', 'Acesso não Autorizado');
            }

            $id_clausula = $request->only(array_keys($request->all()))['id_clausula'];

            $this->clausulasRepository->delete($id_clausula);

            toastr()->success('Cadastro excluído com sucesso!');

            return redirect()->route('admin.convencao.clausulas.index', [
                'convencoes_entidade' => $convencoes_entidade,
                'convencoes' => $id_convencao
            ]);
        } catch (\Exception $e) {

            toastr()->error("Não foi possível excluir o cadastro");

            return redirect()->back();
        }
    }
}
