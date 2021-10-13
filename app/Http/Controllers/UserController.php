<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $_userService;

    public function __construct()
    {
        $this->_userService = new UserService();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        return $this->_userService->register($request);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    public function verifyEmail($token): JsonResponse
    {
        return $this->_userService->verifyEmail($token);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        return $this->_userService->logout($request);
    }

    public function resetEmail(Request $request)
    {
        return $this->_userService->resetEmail($request);
    }
}
