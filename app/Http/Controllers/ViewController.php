<?php
/**
 * Created by Malik Abiola.
 * Date: 07/02/2017
 * Time: 14:54
 * IDE: PhpStorm
 */

namespace App\Http\Controllers;


use App\Services\GithubService;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    private $githubService;

    public function __construct(GithubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index(Request $request)
    {
        return view('devs', $this->githubService->getDevs($request->get('page', 1)));
    }
}
