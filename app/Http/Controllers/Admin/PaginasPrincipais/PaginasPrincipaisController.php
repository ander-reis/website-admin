<?php

namespace App\Http\Controllers\Admin\PaginasPrincipais;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginasPrincipaisCreateRequest;
use App\Http\Requests\PaginasPrincipaisDeleteRequest;
use App\Http\Requests\PaginasPrincipaisUpdateRequest;
use App\Models\MenuItems;
use App\Repositories\PaginasPrincipaisRepository;

/**
 * Class PaginasPrincipaisController.
 *
 * @package namespace App\Http\Controllers;
 */
class PaginasPrincipaisController extends Controller
{
    /**
     * @var PaginasPrincipaisRepository
     */
    protected $repository;
    /**
     * @var MenuItems
     */
    private $menuItems;
    /**
     * @var Menu
     */
    private $menu;

    /**
     * PaginasPrincipaisController constructor.
     *
     * @param PaginasPrincipaisRepository $repository
     * @param MenuItems $menuItems
     */
    public function __construct(PaginasPrincipaisRepository $repository, MenuItems $menuItems)
    {
        $this->repository = $repository;
        $this->menuItems = $menuItems;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas = $this->repository->orderBy('id')->paginate();

        return view('admin.paginas-principais.index', compact('paginas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paginas-principais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaginasPrincipaisCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PaginasPrincipaisCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            /**
             * cria url
             */
            $url = removeSpecialChars($data['txt_titulo']);
            $data['url_pagina'] = customUrl($url);

            /**
             * cadastra pagina
             */
            $create_page = $this->repository->create($data);

            /**
             * cadastra menu
             */
            if($create_page){
                $page = [
                    'txt_titulo' => $data['txt_titulo'],
                    'url_pagina' => $data['url_pagina'],
                    'txt_classe' => 'paginas-principais.*',
                    'menu_custom' => $create_page->id,
                    'fl_status' => $data['fl_status']
                ];
                $this->menuItems->createLinkMenuPage($page);
            }

            return redirect()->route('admin.paginas.index')->with('message', 'Cadastro realizado com sucesso');
        } catch (\Exception $e) {
            /**
             * se houver título duplicado
             */
            if($e->getCode() == 23505){
                return redirect()->back()->with('error-message', 'Não foi possível realizar o cadastro: TÍTULO DUPLICADO');
            }
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
        $pagina = $this->repository->find($id);

        return view('admin.paginas-principais.edit', compact('pagina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PaginasPrincipaisUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PaginasPrincipaisUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            /**
             * cria url
             */
            $url = removeSpecialChars($data['txt_titulo']);
            $data['url_pagina'] = customUrl($url);

            $edit_page = $this->repository->update($data, $id);

            /**
             * editar menu
             */
            if($edit_page->wasChanged('txt_titulo') || $edit_page->wasChanged('fl_status')){
                $page = [
                    'txt_titulo' => $data['txt_titulo'],
                    'url_pagina' => $data['url_pagina'],
                    'txt_classe' => 'paginas-principais.*',
                    'fl_status' => $data['fl_status']
                ];
                $this->menuItems->editLinkMenuPage($page, $id);
            }

            return redirect()->to($data['redirects_to'])->with('message', 'Página editado com sucesso');
        } catch (\Exception $e) {
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível editar a página');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginasPrincipaisDeleteRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $delete_page = $this->repository->delete($data['id_pagina']);

            if($delete_page){
                $this->menuItems->deleteLinkPage($data['id_pagina']);
            }

            return redirect()->to($data['redirects_to'])->with('message', 'Página excluído com sucesso');
        } catch (\Exception $e){
            return redirect()->to($data['redirects_to'])->with('error-message', 'Não foi possível excluir a página');
        }
    }
}
