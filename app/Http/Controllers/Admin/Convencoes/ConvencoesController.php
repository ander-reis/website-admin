<?php

namespace App\Http\Controllers\Admin\Convencoes;


use App\Http\Controllers\Controller;
use App\Http\Requests\ConvencoesCreateRequest;
use App\Http\Requests\ConvencoesUpdateRequest;
use App\Models\Convencoes;
use App\Models\ConvencoesEntidade;
use App\Repositories\ConvencoesEntidadeRepository;
use App\Repositories\ConvencoesRepository;
use Illuminate\Support\Facades\Artisan;

/**
 * Class ConvencoesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ConvencoesController extends Controller
{
    /**
     * @var ConvencoesEntidadeRepository
     */
    private $convencoesEntidadeRepository;
    /**
     * @var ConvencoesRepository
     */
    private $convencoesRepository;

    /**
     * ConvencoesController constructor.
     * @param ConvencoesRepository $convencoesRepository
     * @param ConvencoesEntidadeRepository $convencoesEntidadeRepository
     */
    public function __construct(
        ConvencoesRepository $convencoesRepository,
        ConvencoesEntidadeRepository $convencoesEntidadeRepository
    ){
        $this->convencoesEntidadeRepository = $convencoesEntidadeRepository;
        $this->convencoesRepository = $convencoesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        /**
         * consulta entidade
         */
        $entidade = $this->convencoesEntidadeRepository->find($id);
        /**
         * consulta convencoes
         */
        $convencoes = $this->convencoesRepository->scopeQuery(function($query) use($id){
            return $query->orderBy('id_convencao','desc')
                ->where('fl_entidade', $id);
        })->paginate();

        return view('admin.convencoes.index', compact('entidade', 'convencoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Gate::denies('convencoes.create')){
            return redirect()->back()->with('error-message', 'Acesso não Autorizado');
        }

        return view('admin.convencoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConvencoesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConvencoesCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            if(array_key_exists('ds_titulo', $data)){
                $this->convencoesRepository->create($data);
                return redirect()->route('admin.convencao.index', ['convencao' => $data['fl_entidade']])
                    ->with('message', 'Cadastro realizado com sucesso');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error-message', 'Não foi possível realizar o cadastro');
        }
    }

    public function show(ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes)
    {
        if (\Gate::denies('convencoes.view')) {
            return redirect()->back()->with('error-message', 'Acesso não Autorizado');
        }

        $model = $convencoes;

        return view('admin.convencoes.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ConvencoesEntidade $convencoesEntidade, Convencoes $convencoes)
    {
        if(\Gate::denies('convencoes.update')){
            return redirect()->back()->with('error-message', 'Acesso não Autorizado');
        }

        $model = $convencoes;

        return view('admin.convencoes.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConvencoesUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConvencoesUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $this->convencoesRepository->update($data, $id);
            return redirect()->to($data['redirects_to'])->with('message', 'Convenção editado com sucesso');
        } catch (\Exception $e) {
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível editar a convenção');
        }
    }

    /**
     * Metodo responsavel download pdf
     *
     * @param $id
     * @return mixed
     */
    public function convencaoAsset(Convencoes $convencao)
    {
        Artisan::call('cache:clear');
        return response()->file($convencao->convencao_path);
    }

    /**
     * Metodo responsavel download pdf
     *
     * @param $id
     * @return mixed
     */
    public function aditamentoAsset(Convencoes $convencao)
    {
        Artisan::call('cache:clear');
        return response()->file($convencao->aditamento_path);
    }
}
