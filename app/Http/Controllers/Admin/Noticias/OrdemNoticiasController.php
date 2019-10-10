<?php

namespace App\Http\Controllers\Admin\Noticias;

use App\Http\Controllers\Controller;
use App\Models\Noticias;
use App\Models\OrdemNoticias;
use Illuminate\Http\Request;
use App\Repositories\OrdemNoticiasRepository;

/**
 * Class OrdemNoticiasController.
 *
 * @package namespace App\Http\Controllers;
 */
class OrdemNoticiasController extends Controller
{
    /**
     * @var OrdemNoticiasRepository
     */
    protected $repository;
    /**
     * @var Noticias
     */
    private $noticiasRepository;

    /**
     * OrdemNoticiasController constructor.
     *
     * @param OrdemNoticiasRepository $repository
     * @param Noticias $noticiasRepository
     */
    public function __construct(OrdemNoticiasRepository $repository, Noticias $noticiasRepository)
    {
        $this->repository = $repository;
        $this->noticiasRepository = $noticiasRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::denies('ordem-noticias.view')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.dashboard');
    }

        /**
         * noticias collection
         */
        $noticias = $this->noticiasRepository->orderBy('id', 'desc')->take(52)->get(['id', 'ds_resumo', 'dt_cadastro', 'fl_status']);

        /**
         * ordemNoticias collection
         */
        $ordemNoticias = $this->ordemNoticiaSelect();

        if (!is_null($ordemNoticias)) {
            /**
             * map para marcar quais noticias estão na ordem
             */
            $noticias->map(function($item, $key) use($ordemNoticias) {
                foreach ($ordemNoticias as $ordem){
                    if($item['id'] == $ordem->id){
                        $item['class'] = 'cell-selected';
                    }
                }

            });
        }
        return view('admin.ordem-noticias.index', compact('noticias', 'ordemNoticias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        if (\Gate::denies('ordem-noticias.create')) {

            toastr()->error("Acesso não Autorizado");

            return redirect()->route('admin.ordem-noticias.index');
        }

        /**
         * truncate tabela antes do insert
         */
        OrdemNoticias::truncate();

        /**
         * recupera data request
         */
        $data = json_decode($request->all()['json']);

        /**
         * insert tabela
         */
        foreach ($data as $item) {
            $this->repository->firstOrCreate((array) $item);
        }

        /**
         * return json data
         */
        return response()->json('success', 200);
    }

    /**
     * Método retorna noticias cadastrada em ordemNoticias
     *
     * @return array
     */
    private function ordemNoticiaSelect()
    {
        $noticias = null;
        $list = $this->repository->all(['id_noticia']);

        foreach ($list as $item) {
            $noticias[] = $this->noticiasRepository->find($item->id_noticia, ['id', 'ds_resumo', 'dt_cadastro', 'fl_status']);
        }

        return $noticias;
    }
}
