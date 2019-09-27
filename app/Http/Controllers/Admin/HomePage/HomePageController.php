<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;

use App\Models\HomePage;
use App\Models\HomePageTemp;
use App\Models\Slider;
use App\Repositories\HomePageRepository;
use App\Repositories\HomePageTempRepository;
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
    protected $homePageRepository;
    /**
     * @var HomePageTempRepository
     */
    private $homePageTempRepository;

    /**
     * HomePagesController constructor.
     *
     * @param HomePageRepository $homePageRepository
     * @param HomePageTempRepository $homePageTempRepository
     */
    public function __construct(HomePageRepository $homePageRepository, HomePageTempRepository $homePageTempRepository)
    {
        $this->homePageRepository = $homePageRepository;
        $this->homePageTempRepository = $homePageTempRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::denies('home-page.view')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.dashboard');
        }


        $data = $this->homePageRepository->all();

        return view('admin.home-page.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
//        $data = $request->only(array_keys($request->input()));
        $data = $request->all();
        $action = $request->input('action');

        switch ($action) {
            /**
             * truncate tabela antes do insert
             */
            case 'cadastrar':
                try {
                    HomePage::truncate();

                    $revistaGiz = $this->formatDataImagem($data);

                    $noticias = $this->formatDataNoticia($data);

                    // cadastrar data noticias
                    foreach ($noticias as $noticia) {
                        $this->homePageRepository->create($noticia);
                    }

                    // cadastra data revista giz temp
                    if (array_key_exists('ds_imagem', $revistaGiz)) {
                        $this->homePageRepository->create($revistaGiz);
                    }

                    toastr()->success('Cadastrado alterado com sucesso!');

                    return redirect()->back();

                    break;
                } catch (\Exception $e) {
                    toastr()->error("Não foi possível realizar o cadastro" . $e->getMessage());
                    break;
                }
            case 'preview':
                HomePageTemp::truncate();

                $revistaGiz = $this->formatDataImagem($data);

                $noticias = $this->formatDataNoticia($data);

                // cadastra data noticias temp
                foreach ($noticias as $noticia) {
                    $this->homePageTempRepository->create($noticia);
                }

                // cadastra data revista giz temp
                if (array_key_exists('ds_imagem', $revistaGiz)) {
                    $this->homePageTempRepository->create($revistaGiz);
                }

                // return data model
                $noticias_temp = $this->homePageTempRepository->all();

                // sliders
                $sliders = Slider::where('fl_ativo', 1)->get();

                return view('admin.home-page.preview', compact('noticias_temp', 'sliders', 'revistaGiz'));
        }
    }

    /**
     * Trata daata array criar noticias
     * @param array $data
     * @return mixed
     */
    private function formatDataNoticia(Array $data)
    {
        unset($data['_token']);
        unset($data['action']);
        unset($data['ds_imagem']);
        unset($data['ds_giz']);

        foreach ($data as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                $noticias[$i]['ds_categoria'] = isset($data['ds_categoria'][$i]) ? $data['ds_categoria'][$i] : '';
                $noticias[$i]['ds_titulo'] = isset($data['ds_titulo'][$i]) ? $data['ds_titulo'][$i] : '';
                $noticias[$i]['ds_link'] = isset($data['ds_link'][$i]) ? $data['ds_link'][$i] : '';
                $noticias[$i]['ds_texto_noticia'] = isset($data['ds_texto_noticia'][$i]) ? $data['ds_texto_noticia'][$i] : '';
            }
        }

        return $noticias;
    }

    /**
     * Trata data array criar imagem
     * @param array $data
     * @return array
     */
    public function formatDataImagem(Array $data)
    {
        return [
            'ds_imagem' => $data['ds_imagem'],
            'ds_link' => $data['ds_giz'][0],
            'ds_titulo' => $data['ds_giz'][1],
            'ds_texto_noticia' => $data['ds_giz'][2]
        ];
    }
}
