<?php

namespace App\Http\Controllers\Admin\Intro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\IntroCreateRequest;
use App\Http\Requests\IntroUpdateRequest;
use App\Repositories\IntroRepository;

/**
 * Class IntrosController.
 *
 * @package namespace App\Http\Controllers;
 */
class IntrosController extends Controller
{
    /**
     * @var IntroRepository
     */
    protected $repository;

    /**
     * IntrosController constructor.
     *
     * @param IntroRepository $repository
     */
    public function __construct(IntroRepository $repository)
    {
        $this->repository = $repository;
        //$this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $intros = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $intros,
            ]);
        }

        return view('admin.intro.index', compact('intros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IntroCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(IntroCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $intro = $this->repository->create($request->all());

            $response = [
                'message' => 'Intro created.',
                'data'    => $intro->toArray(),
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
        $intro = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $intro,
            ]);
        }

        return view('admin.intro.show', compact('intro'));
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
        $intro = $this->repository->find($id);

        return view('admin.intro.edit', compact('intro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IntroUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(IntroUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $intro = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Intro updated.',
                'data'    => $intro->toArray(),
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
                'message' => 'Intro deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Intro deleted.');
    }
}
