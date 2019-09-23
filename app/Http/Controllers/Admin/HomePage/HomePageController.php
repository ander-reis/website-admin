<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;

use App\Http\Requests\HomePageCreateRequest;
use App\Models\HomePage;
use App\Repositories\HomePageRepository;

/**
 * Class HomePagesController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomePageController extends Controller
{
    /**
     * @var HomePageRepository
     */
    protected $repository;

    /**
     * HomePagesController constructor.
     *
     * @param HomePageRepository $repository
     */
    public function __construct(HomePageRepository $repository)
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
        $data = $this->repository->all();

        return view('admin.home-page.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HomePageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(HomePageCreateRequest $request)
    {
        $data = $request->only(array_keys($request->input()));
        $action = $request->input('action');

        switch ($action){
            /**
             * truncate tabela antes do insert
             */
            case 'cadastrar':
                try{
                    HomePage::truncate();

                    $data = $request->only(array_keys($request->input()));

                    unset($data['_token']);
                    unset($data['action']);

                    foreach ($data as $key => $value) {
                        for ($i = 0; $i < count($value); $i++) {
                            $noticias[$i]['ds_categoria'] = isset($data['ds_categoria'][$i]) ? $data['ds_categoria'][$i] : null;
                            $noticias[$i]['ds_titulo'] = isset($data['ds_titulo'][$i]) ? $data['ds_titulo'][$i] : null;
                            $noticias[$i]['ds_link'] = isset($data['ds_link'][$i]) ? $data['ds_link'][$i] : null;
                            $noticias[$i]['ds_texto_noticia'] = isset($data['ds_texto_noticia'][$i]) ? $data['ds_texto_noticia'][$i] : null;
                        }
                    }

                    foreach ($noticias as $noticia) {
                        $this->repository->create($noticia);
                    }

                    toastr()->success('Cadastrado com sucesso!');

                    return redirect()->back();

                    break;
                }catch (\Exception $e){
                    toastr()->error("Não foi possível realizar o cadastro");
                    break;
                }
            case 'preview':

                $data = $request->only(array_keys($request->input()));
                unset($data['_token']);

                foreach ($data as $key => $value) {
                    for ($i = 0; $i < count($data['ds_categoria']); $i++) {
                        $noticias[$i]['ds_categoria'] = $data['ds_categoria'][$i];
                        $noticias[$i]['ds_titulo'] = $data['ds_titulo'][$i];
                        //$noticias[$i]['ds_link'] = $data['ds_link'][$i];
                    }
                }

                foreach ($noticias as $noticia) {
                    //$this->repository->create($noticia);
                }

                return view('admin.home-page.preview', compact('noticias'));
                break;
        }
        try {
//            return redirect()->route('admin.home-page.preview', ['data']);
        } catch (\Exception $e) {
//            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }

    }


    public function preview(HomePageCreateRequest $request)
    {
        $data = $request->only(array_keys($request->all()));
        dd($data);
        return view('admin.home-page.preview', compact('data'));
    }
}
