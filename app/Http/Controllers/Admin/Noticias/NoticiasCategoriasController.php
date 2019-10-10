<?php

namespace App\Http\Controllers\Admin\Noticias;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticiasCategoriaCreateRequest;
use App\Http\Requests\NoticiasCategoriaUpdateRequest;
use App\Repositories\NoticiasCategoriaRepository;

/**
 * Class NoticiasCategoriasController.
 *
 * @package namespace App\Http\Controllers;
 */
class NoticiasCategoriasController extends Controller
{
    /**
     * @var NoticiasCategoriaRepository
     */
    protected $repository;


    /**
     * NoticiasCategoriasController constructor.
     *
     * @param NoticiasCategoriaRepository $repository
     */
    public function __construct(NoticiasCategoriaRepository $repository)
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
        $permission = true;

        $model = $this->repository->orderBy('ds_categoria')->paginate('15', ['id', 'ds_categoria']);

        if (\Gate::denies('noticias-categoria.view')) {
            toastr()->error("Acesso não Autorizado");
            return redirect()->route('admin.dashboard');
        }
        if (\Gate::denies('noticias-categoria.update')) {
            $permission = false;
        }

        return view('admin.noticias-categoria.index', compact('model', 'permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Gate::denies('noticias-categoria.create')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.noticias-categoria.index');
        }

        return view('admin.noticias-categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoticiasCategoriasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NoticiasCategoriaCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $this->repository->create($data);

            toastr()->success('Cadastrado com sucesso!');

            return redirect()->route('admin.noticias-categoria.index')->with('message', 'Categoria cadastrada com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-message', 'Não foi possível cadastrar a categoria' . $e->getMessage());
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
        if (\Gate::denies('noticias-categoria.update')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.noticias-categoria.index');
        }

        $categorias = $this->repository->find($id);

        return view('admin.noticias-categoria.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NoticiasCategoriasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NoticiasCategoriaUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $this->repository->update($data, $id);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->to($data['redirects_to'])->with('message', 'Categoria editado com sucesso');
        } catch (\Exception $e) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível editar a categoria');
        }
    }
}
