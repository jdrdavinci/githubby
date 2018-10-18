<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\GuzzleUtil;

/**
 * Class GitHubController
 * @package App\Http\Controllers
 */
class GitHubController extends Controller
{
    /**
     * Show details of authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser() {
        $user = Auth::user();

        return response()->json($user);
    }

    /**
     * Show repositories of authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserRepositories() {
        $user = Auth::user();

        $response = GuzzleUtil::doRequest('user/repos');

        return view('github.repositories.list',
            ['repositories' => json_decode($response, true)]);
    }
}
