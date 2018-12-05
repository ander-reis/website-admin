<?php

namespace App\Http\Controllers\Admin\Noticias;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticiasCreateRequest;
use App\Http\Requests\NoticiasUpdateRequest;
use App\Repositories\NoticiasRepository;

/**
 * Class NoticiasController.
 *
 * @package namespace App\Http\Controllers;
 */
class NoticiasController extends Controller
{
    /**
     * @var NoticiasRepository
     */
    protected $repository;

    /**
     * NoticiasController constructor.
     *
     * @param NoticiasRepository $repository
     */
    public function __construct(NoticiasRepository $repository)
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
        $noticias = $this->repository->orderBy('id', 'desc')->paginate();

        return view('admin.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoticiasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NoticiasCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['dt_noticia'] = Noticias::convertDateTime($data['dt_noticia'], $data['hr_noticia']);
            $this->repository->create($data);
            return redirect()->route('admin.noticias.index')->with('message', 'Cadastro realizado com sucesso');
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
    public function edit($id)
    {
        $noticias = $this->repository->find($id);

        return view('admin.noticias.edit', compact('noticias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NoticiasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NoticiasUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['dt_noticia'] = Noticias::convertDateTime($data['dt_noticia'], $data['hr_noticia']);
            unset($data['hr_noticia']);
            $this->repository->update($data, $id);

            //return redirect()->route('admin.noticias.index')->with('message', 'Notícia editada com sucesso');
            return redirect()->to($data['redirects_to'])->with('message', 'Notícia editado com sucesso');
        } catch (\Exception $e) {
            //return redirect()->back()->with('error-message', 'Não foi possível editar a notícia');
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível editar a notícia');
        }
    }
}
