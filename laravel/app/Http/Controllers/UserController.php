<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
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
    public function create(UserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->create($request->all());

            return response()->json(data: $user, status: Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(data: "Error: " . $th->getMessage(), status: Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }
}
