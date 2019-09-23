<?php

namespace App\Http\Controllers\Admin\OwlCarousel;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwlCarouselUpdateRequest;
use App\Repositories\OwlCarouselRepository;

/**
 * Class OwlCarouselsController.
 *
 * @package namespace App\Http\Controllers;
 */
class OwlCarouselController extends Controller
{
    /**
     * @var OwlCarouselRepository
     */
    protected $repository;

    /**
     * OwlCarouselsController constructor.
     *
     * @param OwlCarouselRepository $repository
     */
    public function __construct(OwlCarouselRepository $repository)
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
        $owlItems = $this->repository->orderBy('id', 'asc')->all();

        return view('admin.owl-carousel.index', compact('owlItems'));
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
        $owlCarousel = $this->repository->find($id);

        return view('admin.owl-carousel.edit', compact('owlCarousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OwlCarouselUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OwlCarouselUpdateRequest $request, $id)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            $this->repository->update($data, $id);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('admin.owl-carousel.index');
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro");

            return redirect()->back();
        }
    }
}
