<?php

namespace App\Http\Controllers\Admin\Noticias;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NoticiasCreateRequest;
use App\Http\Requests\NoticiasUpdateRequest;
use App\Repositories\NoticiasRepository;
use App\Validators\NoticiasValidator;

/**
 * Class NoticiasController.
 *
 * @package namespace App\Http\Controllers;
 */
class NoticiasController extends Controller
{
    /**
     * @var NoticiasRepository
     */
    protected $repository;

    /**
     * @var NoticiasValidator
     */
    protected $validator;

    /**
     * NoticiasController constructor.
     *
     * @param NoticiasRepository $repository
     * @param NoticiasValidator $validator
     */
    public function __construct(NoticiasRepository $repository, NoticiasValidator $validator)
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
        $noticias = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $noticias,
            ]);
        }

        return view('noticias.index', compact('noticias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoticiasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NoticiasCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $noticia = $this->repository->create($request->all());

            $response = [
                'message' => 'Noticias created.',
                'data'    => $noticia->toArray(),
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
        $noticia = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $noticia,
            ]);
        }

        return view('noticias.show', compact('noticia'));
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
        $noticia = $this->repository->find($id);

        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NoticiasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NoticiasUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $noticia = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Noticias updated.',
                'data'    => $noticia->toArray(),
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
                'message' => 'Noticias deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Noticias deleted.');
    }
}
