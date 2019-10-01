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
        $data = $request->all();
        $action = $request->input('action');

        switch ($action) {
                /**
             * truncate tabela antes do insert
             */
            case 'cadastrar':
                try {

                    //verifica se está sendo cadastro img da revistagiz
                    $img_giz = $request->all('ds_imagem');

                    if (is_null($img_giz['ds_imagem'])) { //se não tiver, captura o nome da imagem
                        $img_giz = HomePage::select('ds_imagem')->where('id', '=', 8)->get();
                        $data['ds_imagem'] = $img_giz[0]['ds_imagem'];
                    }

                    HomePage::truncate();

                    $revistaGiz = $this->formatDataImagem($data);

                    $noticias = $this->formatDataNoticia($data);

                    // cadastra data noticias temp
                    foreach ($noticias as $noticia) {
                        $this->homePageRepository->create($noticia);
                    }

                    // cadastra data revista giz temp
                    $this->homePageRepository->create($revistaGiz);

                    toastr()->success('Cadastrado alterado com sucesso!');

                    return redirect()->back();

                    break;
                } catch (\Exception $e) {
                    toastr()->error("Não foi possível realizar o cadastro" . $e->getMessage());
                    break;
                }
            case 'preview':
                //verifica se está sendo cadastro img da revistagiz
                $img_giz = $request->all('ds_imagem');

                if (is_null($img_giz['ds_imagem'])) { //se não tiver, captura o nome da imagem
                    $img_giz = HomePageTemp::select('ds_imagem')->where('id', '=', 8)->get();
                    $data['ds_imagem'] = $img_giz[0]['ds_imagem'];
                }

                HomePageTemp::truncate();

                $revistaGiz = $this->formatDataImagem($data);

                $noticias = $this->formatDataNoticia($data);

                // cadastra data noticias temp
                foreach ($noticias as $noticia) {
                    $this->homePageTempRepository->create($noticia);
                }

                // cadastra data revista giz temp
                $this->homePageTempRepository->create($revistaGiz);

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
    private function formatDataNoticia(array $data)
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
    public function formatDataImagem(array $data)
    {

        if (isset($data['ds_imagem'])) {
            return [

                'ds_categoria' => '',
                'ds_link' => $data['ds_giz'][0],
                'ds_titulo' => $data['ds_giz'][1],
                'ds_texto_noticia' => $data['ds_giz'][2],
                'ds_imagem' => $data['ds_imagem']
            ];
        } else {
            return [
                'ds_categoria' => '',
                'ds_link' => $data['ds_giz'][0],
                'ds_titulo' => $data['ds_giz'][1],
                'ds_texto_noticia' => $data['ds_giz'][2]
            ];
        }
    }
}
