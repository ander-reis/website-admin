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
        $noticiasCategorias = $this->repository->orderBy('id')->paginate();
        return view('admin.categorias.index', compact('noticiasCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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

            return redirect()->route('admin.categorias.index')->with('message', 'Categoria cadastrada com sucesso');
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
        $categorias = $this->repository->find($id);

        return view('admin.categorias.edit', compact('categorias'));
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
            return redirect()->to($data['redirects_to'])->with('message', 'Categoria editado com sucesso');
        } catch (\Exception $e) {
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível editar a categoria');
        }
    }
}
