<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponses;

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (!auth()->attempt($request->only("email", "password"))) {
            return $this->sendErrorResponse("Invalid credentials.");
        }

        /** @var User $user */
        $user = User::firstWhere("email", $request->get("email"));

        $data = [
            "token" => $user->createToken("Api Token for " . $user->email)->plainTextToken,
        ];

        return $this->sendSuccessResponse($data);
    }
}
