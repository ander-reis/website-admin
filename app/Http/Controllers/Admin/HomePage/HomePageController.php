<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;

use App\Http\Requests\HomePageCreateRequest;
use App\Http\Requests\HomePageUpdateRequest;
use App\Repositories\HomePageRepository;

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
        try {
//            dd($request->all());
            $array[] = [];
            $data = $request->only(array_keys($request->all()));
            unset($data['_token']);

//            dd($data);

//            foreach ($data as $values) {
//                foreach ($values as $key => $item) {
//                    $array[] = array_add('ds_categoria', $item[$key]);
//                }
//            }

            $array2 = [
                'ds_categoria' => [
                    'teste1',
                    'teste2',
                    'teste3'
                ],
                'ds_titulo' => [
                    'valor1',
                    'valor2',
                    'valor3'
                ],
            ];

//            $array = array_add(['name' => 'Desk'], 'price', 100);
//            dd($array2);

            foreach ($array2 as $key => $item) {
                foreach ($item as $value) {
                    $array3[] = array_add(['ds_categoria' => $value], 'ds_titulo', $value);
                }
            }

            dd($array3);

//            $this->repository->create($item);
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
//
//            $homePage = $this->repository->create($request->all());
//
//            $response = [
//                'message' => 'HomePage created.',
//                'data'    => $homePage->toArray(),
//            ];
//
//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }

//            return redirect()->back()->with('message', $response['message']);
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
        $homePage = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $homePage,
            ]);
        }

        return view('homePages.show', compact('homePage'));
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
        $homePage = $this->repository->find($id);

        return view('homePages.edit', compact('homePage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HomePageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(HomePageUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $homePage = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'HomePage updated.',
                'data'    => $homePage->toArray(),
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
                'message' => 'HomePage deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'HomePage deleted.');
    }
}
