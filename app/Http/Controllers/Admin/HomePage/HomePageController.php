<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;

use App\Models\HomePage;
use App\Models\Slider;
use App\Repositories\HomePageRepository;
use Illuminate\Http\Request;

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
    public function store(Request $request)
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
                            $noticias[$i]['ds_categoria'] = isset($data['ds_categoria'][$i]) ? $data['ds_categoria'][$i] : '';
                            $noticias[$i]['ds_titulo'] = isset($data['ds_titulo'][$i]) ? $data['ds_titulo'][$i] : '';
                            $noticias[$i]['ds_link'] = isset($data['ds_link'][$i]) ? $data['ds_link'][$i] : '';
                            $noticias[$i]['ds_texto_noticia'] = isset($data['ds_texto_noticia'][$i]) ? $data['ds_texto_noticia'][$i] : '';
                        }
                    }

                    foreach ($noticias as $noticia) {
                        $this->repository->create($noticia);
                    }

                    toastr()->success('Cadastrado alterado com sucesso!');

                    return redirect()->back();

                    break;
                }catch (\Exception $e){
                    toastr()->error("Não foi possível realizar o cadastro");
                    break;
                }
            case 'preview':

                $data = $request->only(array_keys($request->input()));
//                dd($data);
                $imagem = $data['ds_imagem'];

                unset($data['_token']);
                unset($data['action']);
                unset($data['ds_imagem']);

                foreach ($data as $key => $value) {
                    for ($i = 0; $i < count($value); $i++) {
                        $noticias[$i]['ds_categoria'] = isset($data['ds_categoria'][$i]) ? $data['ds_categoria'][$i] : '';
                        $noticias[$i]['ds_titulo'] = isset($data['ds_titulo'][$i]) ? $data['ds_titulo'][$i] : '';
                        $noticias[$i]['ds_link'] = isset($data['ds_link'][$i]) ? $data['ds_link'][$i] : '';
                        if($key == 'ds_texto_noticia'){
                            $noticias[$i]['ds_texto_noticia'] = isset($data['ds_texto_noticia'][$i]) ? $data['ds_texto_noticia'][$i] : '';
                        }

                    }
                }
                dd($noticias);
                // sliders
                $sliders = Slider::where('fl_ativo', 1)->get();

                return view('admin.home-page.preview', compact('noticias', 'sliders', 'imagem'));
        }
    }
}
