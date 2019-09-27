<?php

namespace App\Http\Controllers\Admin\Intro;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroCreateRequest;
use App\Http\Requests\IntroDeleteRequest;
use App\Http\Requests\IntroUpdateRequest;
use App\models\Intro;
use App\Repositories\IntroRepository;

/**
 * Class IntrosController.
 *
 * @package namespace App\Http\Controllers;
 */
class IntrosController extends Controller
{
    /**
     * @var IntroRepository
     */
    protected $repository;

    /**
     * IntrosController constructor.
     *
     * @param IntroRepository $repository
     */
    public function __construct(IntroRepository $repository)
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
        $intros = $this->repository->orderBy('id', 'asc')->paginate();

        return view('admin.intro.index', compact('intros'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IntroRepository $repository)
    {
        if (\Gate::denies('intro.create')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.intro.index');
        }

        return view('admin.intro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IntroCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(IntroCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            //if (array_key_exists('ds_imagem', $data)) {
                $this->repository->create($data);

                toastr()->success('Cadastrado com sucesso!');

                return redirect()->route('admin.intro.index');
            //}
        } catch (\Exception $e) {

            dd($e);

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
        if (\Gate::denies('intro.update')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.intro.index');
        }

        $intro = $this->repository->find($id);

        return view('admin.intro.edit', compact('intro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IntroUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(IntroUpdateRequest $request, $id)
    {
        try {

            $form = $request->only(array_keys($request->all()));

            $this->repository->update($form, $id);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('admin.intro.index');
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro");

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntroDeleteRequest $request, $id)
    {
        try {
            $id_intro = $request->only(array_keys($request->all()))['id_intro'];
            $this->repository->deleteIntro($id_intro);

            toastr()->success('Cadastro excluído com sucesso!');

            return redirect()->route('admin.intro.index');

        } catch (\Exception $e) {
            toastr()->error("Não foi possível excluir o cadastro");

            return redirect()->back();
        }
    }

    /**
     * Metodo responsavel download imagem
     *
     * @param Intro $intro
     * @return mixed
     */
    public function thumbDesktopAsset(Intro $intro)
    {
        return response()->download($intro->intro_desktop_path);
    }

    public function thumbMobileAsset(Intro $intro)
    {
        return response()->download($intro->intro_mobile_path);
    }

    /**
     * Metodo responsavel dowload imagem small
     *
     * @param Intro $intro
     * @return mixed
     */
    public function thumbSmallAsset(Intro $intro)
    {
        return response()->download($intro->intro_desktop_small_path);
    }
}
