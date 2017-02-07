<?php
/**
 * Created by Malik Abiola.
 * Date: 07/02/2017
 * Time: 14:54
 * IDE: PhpStorm
 */

namespace App\Http\Controllers;


use App\Services\GithubService;

class ViewController extends Controller
{
    private $githubService;

    public function __construct(GithubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index()
    {
        $devs = [
            "devs" => $this->githubService->getDevs()
        ];

        return view('devs', $devs);
    }
}
