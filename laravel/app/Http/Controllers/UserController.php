<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $user = $this->userService->all();

            return response()->json(data: $user, status: Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(data: "Error: " . $th->getMessage(), status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->create($request->all());

            return response()->json(data: $user, status: Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(data: "Error: " . $th->getMessage(), status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        try {
            $user = $this->userService->find($user);

            return response()->json(data: $user, status: Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(data: "Error: " . $th->getMessage(), status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        try {
            $user = $this->userService->update($user, $request->all());

            return response()->json(data: $user, status: Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(data: "Error: " . $th->getMessage(), status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $user = $this->userService->delete($user);

            return response()->json(data: $user, status: Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(data: "Error: " . $th->getMessage(), status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
