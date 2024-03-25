<?php

namespace App\Http\Controllers;

use App\Models\Consomable;
use App\Models\Imobilisable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
{
    $assets = ['chart', 'animation'];
    $consomables = Consomable::all();
    $totalConsomable = $consomables->count();
    $totaImobilisable = Imobilisable::count();
    
    // Calculate the total consomables where suivre_sucrete is greater than or equal to quantite
    $totalSuivre_sucrete = $consomables->filter(function ($consomable) {
        return $consomable->suivre_sucrete >= $consomable->quantite;
    })->count();
    $Suivre_sucreteConsomable=$totalSuivre_sucrete;
    $Suivre_sucreteImobilisable=Imobilisable::whereColumn('quantite', '<=', 'suivre_sucrete')->count();
    // Count the immobilisables where quantite is less than or equal to suivre_sucrete
    $totalSuivre_sucrete += Imobilisable::whereColumn('quantite', '<=', 'suivre_sucrete')->count();

    // Fetch counts by month for consomables
    $consomable_counts = Consomable::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(*) as count')
    )->groupBy(DB::raw('MONTH(created_at)'))
        ->get();

    // Fetch counts by month for immobilisables
    $imobilisable_counts = Imobilisable::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(*) as count')
    )->groupBy(DB::raw('MONTH(created_at)'))
        ->get();

    // Initialize an array to store counts by month
    $counts_by_month = [];
    for ($month = 1; $month <= 12; $month++) {
        // Find consomable count for the current month
        $consomable_count = $consomable_counts->where('month', $month)->first();
        // Find immobilisable count for the current month
        $imobilisable_count = $imobilisable_counts->where('month', $month)->first();

        // Store counts in the array
        $counts_by_month[$month] = [
            'consomable' => $consomable_count ? $consomable_count->count : 0,
            'imobilisable' => $imobilisable_count ? $imobilisable_count->count : 0,
        ];
    }

    return view('dashboards.dashboard', compact('assets', 'totalConsomable', 'counts_by_month', 'totaImobilisable', 'Suivre_sucreteConsomable','totalSuivre_sucrete','Suivre_sucreteImobilisable'));
}


    /*
     * Pages Routs
     */

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }


    /*
     * Widget Routs
     */
    public function widgetbasic(Request $request)
    {
        return view('widget.widget-basic');
    }
    public function widgetchart(Request $request)
    {
        $assets = ['chart'];
        return view('widget.widget-chart', compact('assets'));
    }



    /*
     * Auth Routs
     */
    public function signin(Request $request)
    {
        return view('auth.login');
    }



  
    /*
     * uisheet Page Routs
     */
    public function uisheet(Request $request)
    {
        return view('uisheet');
    }

    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }

    /*
     * Table Page Routs
     */
    public function datatable(Request $request)
    {
        return view('table.datatable');
    }
}
