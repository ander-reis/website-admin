<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderCreateRequest;
use App\Http\Requests\SliderDeleteRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use App\Repositories\SliderRepository;

/**
 * Class SlidersController.
 *
 * @package namespace App\Http\Controllers;
 */
class SlidersController extends Controller
{
    /**
     * @var SliderRepository
     */
    protected $repository;


    /**
     * SlidersController constructor.
     *
     * @param SliderRepository $repository
     */
    public function __construct(SliderRepository $repository)
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
        $sliders = $this->repository->orderBy('id', 'asc')->paginate();

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SliderRepository $repository)
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SliderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SliderCreateRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            dd($data);
            if(array_key_exists('ds_imagem', $data)){
                $this->repository->create($data);
                return redirect()->route('admin.slider.index')->with('message', 'Cadastro realizado com sucesso');
            }
        } catch (\Exception $e) {
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
        $slider = $this->repository->find($id);

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SliderUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        try {
            $form = $request->only(array_keys($request->all()));

            $this->repository->update($form, $id);

            return redirect()->route('admin.slider.index')->with('message', 'Slide editado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-message', 'Não foi possível editar o Slide');
        }
    }


    public function destroy(SliderDeleteRequest $request, $id)
    {
        try{
            $id_slider = $request->only(array_keys($request->all()))['id_slider'];
            $this->repository->deleteSlider($id_slider);
            $request->session()->flash('message', 'Slider excluída com sucesso.');
            return redirect()->route('admin.slider.index')
                ->with('message', 'Slider excluído com sucesso');
        }catch (\Exception $e){
            return redirect()->back()->with('error-message', 'Não foi possível excluir o slider');
        }
    }

    /**
     * Metodo responsavel download imagem
     *
     * @param Slider $slider
     * @return mixed
     */
    public function thumbAsset(Slider $slider)
    {
        return response()->download($slider->slider_path);
    }

    /**
     * Metodo responsavel dowload imagem small
     *
     * @param Slider $slider
     * @return mixed
     */
    public function thumbSmallAsset(Slider $slider)
    {
        return response()->download($slider->slider_small_path);
    }
}
