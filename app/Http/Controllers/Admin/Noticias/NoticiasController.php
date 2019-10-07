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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $noticias = $this->repository->orderBy('id', 'desc')->paginate('15');
        return view('admin.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Gate::denies('noticias.create')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.noticias.index');
        }

        return view('admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NoticiasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NoticiasCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['dt_noticia'] = convertDateTime($data['dt_noticia'], $data['hr_noticia']);

            $data['fl_oculta'] = ($data['fl_status'] == 1 ? 'N' : 'S');
            $data['ds_palavra_chave'] = (!is_null($data['ds_palavra_chave']) ? $data['ds_palavra_chave'] : '');
            unset($data['hr_noticia']);

            $insert = $this->repository->create($data);
            $data['id_noticia'] = $insert->id;

            $noticia['id_noticia'] = $insert->id;

            $this->repository->update($noticia, $insert->id);

            toastr()->success('Cadastrado com sucesso!');

            return redirect()->route('admin.noticias.index');
        } catch (\Exception $e) {

            toastr()->error("Não foi possível realizar o cadastro");

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (\Gate::denies('noticias.view')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.noticias.index');
        }

        $model = $this->repository->find($id);

        return view('admin.noticias.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        if (\Gate::denies('noticias.update')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.noticias.index');
        }

        $noticias = $this->repository->find($id);

        return view('admin.noticias.edit', compact('noticias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NoticiasUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NoticiasUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $data['dt_noticia'] = convertDateTime($data['dt_noticia'], $data['hr_noticia']);
            $data['fl_oculta'] = ($data['fl_status'] == 1 ? 'N' : 'S');
            $data['ds_palavra_chave'] = (!is_null($data['ds_palavra_chave']) ? $data['ds_palavra_chave'] : '');
            unset($data['hr_noticia']);
            $this->repository->update($data, $id);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('admin.noticias.index');
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro");

            return redirect()->to($data['redirects_to']);
        }
    }
}
