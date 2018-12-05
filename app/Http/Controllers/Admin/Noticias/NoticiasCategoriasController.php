<?php

namespace App\Http\Controllers\Admin\Noticias;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NoticiasCategoriaCreateRequest;
use App\Http\Requests\NoticiasCategoriaUpdateRequest;
use App\Repositories\NoticiasCategoriaRepository;
use App\Validators\NoticiasCategoriaValidator;

/**
 * Class NoticiasCategoriasController.
 *
 * @package namespace App\Http\Controllers;
 */
class NoticiasCategoriasController extends Controller
{
    /**
     * @var NoticiasCategoriaRepository
     */
    protected $repository;

    /**
     * @var NoticiasCategoriaValidator
     */
    protected $validator;

    /**
     * NoticiasCategoriasController constructor.
     *
     * @param NoticiasCategoriaRepository $repository
     * @param NoticiasCategoriaValidator $validator
     */
    public function __construct(NoticiasCategoriaRepository $repository, NoticiasCategoriaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $noticiasCategorias = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $noticiasCategorias,
            ]);
        }

        return view('noticiasCategorias.index', compact('noticiasCategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoticiasCategoriaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NoticiasCategoriaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $noticiasCategorium = $this->repository->create($request->all());

            $response = [
                'message' => 'NoticiasCategoria created.',
                'data'    => $noticiasCategorium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticiasCategorium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $noticiasCategorium,
            ]);
        }

        return view('noticiasCategorias.show', compact('noticiasCategorium'));
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
        $noticiasCategorium = $this->repository->find($id);

        return view('noticiasCategorias.edit', compact('noticiasCategorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NoticiasCategoriaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NoticiasCategoriaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $noticiasCategorium = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'NoticiasCategoria updated.',
                'data'    => $noticiasCategorium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'NoticiasCategoria deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'NoticiasCategoria deleted.');
    }
}
