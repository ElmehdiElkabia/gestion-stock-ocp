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
        $totalConsomable = Consomable::count();
        $totaImobilisable = Imobilisable::count();
        $totalCommandeConsomable = Consomable::count('numero_commande');
        // suivre_sucrete
        $totalCommandeImobilisable = Imobilisable::count('numero_commande');
        $totalCommandeSuivre_sucrete =  Consomable::whereColumn('suivre_sucrete', 'quantite')->count() +
            Imobilisable::whereColumn('suivre_sucrete', 'quantite')->count();
        $consomable_counts = Consomable::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        $imobilisable_counts = Imobilisable::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Combine counts into a single array
        $counts_by_month = [];
        for ($month = 1; $month <= 12; $month++) {
            $consomable_count = $consomable_counts->where('month', $month)->first();
            $imobilisable_count = $imobilisable_counts->where('month', $month)->first();

            $counts_by_month[$month] = [
                'consomable' => $consomable_count ? $consomable_count->count : 0,
                'imobilisable' => $imobilisable_count ? $imobilisable_count->count : 0,
            ];
        }
        return view('dashboards.dashboard', compact('assets', 'totalConsomable', 'counts_by_month','totaImobilisable', 'totalCommandeConsomable', 'totalCommandeImobilisable', 'totalCommandeSuivre_sucrete'));
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
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }
    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
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
