<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;

use App\Http\Requests\HomePageCreateRequest;
use App\Http\Requests\HomePageUpdateRequest;
use App\Repositories\HomePageRepository;
use phpDocumentor\Reflection\Types\Compound;

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
//        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
//        $homePages = $this->repository->all();
//
//        if (request()->wantsJson()) {
//
//            return response()->json([
//                'data' => $homePages,
//            ]);
//        }

        return view('admin.home-page.index');
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

        unset($data['_token']);
        unset($data['action']);

        switch ($action){
            case 'cadastrar':
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
                dd('cadastrar');
                break;
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
