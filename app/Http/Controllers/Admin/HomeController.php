<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Visitor;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Todas as actions serão baseadas na autenticação
    }

    public function index()
    {
        $visitsCount = 0;
        $onlineCount = 0;
        $pagesCount = 0;
        $usersCount = 0;

        $visitsCount = Visitor::count();

        $dateLimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineList = Visitor::select('ip')->where('date_access', '>=', $dateLimit)->groupBy('ip')->get();
        $onlineCount = count($onlineList);

        $pagesCount = Page::count();

        $usersCount = User::count();

        $pagePie = [
            'Teste 1' => 100,
            'Teste 2' => 200,
            'Teste 3' => 300,
        ];

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));

        return view('admin.home', [
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pagesCount' => $pagesCount,
            'usersCount' => $usersCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
        ]);
    }
}
