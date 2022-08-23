<?php

namespace App\Http\Controllers\Dados;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Dados\Dashboard;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    protected $model = Dashboard::class;
    protected $breadcrumbs = [
        ['name' => "Dashboard"],
        ['link' => "/dados/dashboard", 'name' => "Dashboard"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;

        $dataView = compact('breadcrumbs');
        return view('modules/dados/dashboard/index', $dataView);
    }

}
