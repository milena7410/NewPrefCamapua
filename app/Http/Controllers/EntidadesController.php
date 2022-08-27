<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Http\Request;

use PrefCamapua\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use PrefCamapua\Http\Requests\EntidadeCreateRequest;
use PrefCamapua\Http\Requests\EntidadeUpdateRequest;
use PrefCamapua\Repositories\EntidadeRepository;
use PrefCamapua\Validators\EntidadeValidator;

/**
 * Class EntidadesController.
 *
 * @package namespace PrefCamapua\Http\Controllers;
 */
class EntidadesController extends Controller
{
    /**
     * @var EntidadeRepository
     */
    protected $repository;

    /**
     * @var EntidadeValidator
     */
    protected $validator;

    /**
     * EntidadesController constructor.
     *
     * @param EntidadeRepository $repository
     * @param EntidadeValidator $validator
     */
    public function __construct(EntidadeRepository $repository, EntidadeValidator $validator)
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
        $entidades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $entidades,
            ]);
        }

        return view('entidades.index', compact('entidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EntidadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EntidadeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $entidade = $this->repository->create($request->all());

            $response = [
                'message' => 'Entidade created.',
                'data'    => $entidade->toArray(),
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
        $entidade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $entidade,
            ]);
        }

        return view('entidades.show', compact('entidade'));
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
        $entidade = $this->repository->find($id);

        return view('entidades.edit', compact('entidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EntidadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EntidadeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $entidade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Entidade updated.',
                'data'    => $entidade->toArray(),
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
                'message' => 'Entidade deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Entidade deleted.');
    }
}
