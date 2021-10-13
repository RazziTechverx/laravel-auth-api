<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Mail\UserVerification;
use App\Repositories\UserRepo;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class UserService extends BaseService
{
    /**
     * @var UserRepo
     */
    private $_userRepo;

    public function __construct()
    {
        $this->_userRepo = new UserRepo();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if($validator->fails()) {
            return $this->response([], $validator->errors(), 'ERROR', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (!$user = $this->_userRepo->findByClause(['email' => $request->email])->first()) {
            return $this->response([],'Email not exist', 'ERROR');
        }

        $data['name'] = $user->name;

        $assignToken = Helper::STR_RANDOM(60);

        $user->email_token = $assignToken;
        $user->expiry_time = Carbon::now()->addHours(2);
        $user->save();
        $data['url'] = env('WEB_URL').'verify/'.$assignToken;

        Mail::to($request->email)->send(new UserVerification($data));

        return $this->response([],'Verification Email sent. Please Verify your Email!');
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    public function verifyEmail($token): JsonResponse
    {
        $user = $this->_userRepo->findByClause(['email_token' => $token])->first();
        if ($user && $user->expiry_time->gte(Carbon::now())) {
            $data['token'] =  $user->createToken('login-token')->accessToken;
            $user->token =  $data['token'];
            $user->email_verified = true;
            $user->save();

            return $this->response($data,'Email is verified!');
        }
        return $this->response([],'Link is expired!', 'ERROR');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        if ($request->user()) {
            $request->user()->token()->revoke();
            return $this->response([], 'Logout Successfully');
        }
        return $this->response([], 'Something went wrong');
    }

    public function resetEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
        ]);
        if($validator->fails()) {
            return $this->response([], $validator->errors(), 'ERROR', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user = $request->user();
        $user->email = $request->email;
        $user->save();

        return $this->response([],'Email has been reset successfully!');
    }

}
