<?php

namespace App\Http\Controllers\Admin\BoletimCadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoletimCadastroCreateRequest;
use App\Http\Requests\BoletimCadastroUpdateRequest;
use App\Repositories\BoletimCadastroRepository;

/**
 * Class BoletimCadastroController.
 *
 * @package namespace App\Http\Controllers;
 */
class BoletimCadastroController extends Controller
{
    /**
     * @var BoletimCadastroRepository
     */
    protected $repository;

    /**
     * BoletimCadastroController constructor.
     *
     * @param BoletimCadastroRepository $repository
     * @param BoletimCadastroValidator $validator
     */
    public function __construct(BoletimCadastroRepository $repository)
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
        $model = $this->repository->orderBy('id_boletim', 'desc')->paginate(15, ['id', 'id_boletim', 'dt_boletim', 'ds_destaque', 'ds_link']);

        if (\Gate::denies('boletim-cadastro.view')) {
            toastr()->error("Acesso não Autorizado");
            return redirect()->route('admin.dashboard');
        }
        if (\Gate::denies('boletim-cadastro.update')) {
            $not_update = true;
            return view('admin.boletim-cadastro.index', compact('model', 'not_update'));
        }

        return view('admin.boletim-cadastro.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Gate::denies('boletim-cadastro.create')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.boletim-cadastro.index');
        }

        return view('admin.boletim-cadastro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BoletimCadastroCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BoletimCadastroCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            toastr()->success('Cadastrado com sucesso!');

            $this->repository->create($data);

            return redirect()->route('admin.boletim-cadastro.index');
        } catch (\Exception $e) {
            toastr()->error("Não foi possível realizar o cadastro");
            return redirect()->back();
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
        if (\Gate::denies('boletim-cadastro.update')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.dashboard');
        }

        $model = $this->repository->find($id);

        return view('admin.boletim-cadastro.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BoletimCadastroUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BoletimCadastroUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            toastr()->success('Cadastro alterado com sucesso!');

            $this->repository->update($data, $id);

            return redirect()->to($data['redirects_to']);
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro");

            return redirect()->to($data['redirects_to']);
        }
    }
}
