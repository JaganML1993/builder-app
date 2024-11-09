<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CaseStudy;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $admins = User::with('roles')->get();
   
        return view('admin.index',compact('admins'));
    }

    public function dashboard(Request $request)
{
    $startDate = $request->query('start_date');
    $endDate = $request->query('end_date');

    $query = function ($query) use ($startDate, $endDate) {
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('created_at', '<=', $endDate);
        }
    };

    $services_count = Service::where($query)->count();
    $services_published = Service::where('published', 1)->where($query)->count();
    $services_pending = Service::where('published', 0)->where($query)->count();
    $services_draft = Service::where('published', 2)->where($query)->count();

    $case_studies_count = CaseStudy::where($query)->count();
    $case_published = CaseStudy::where('published', 1)->where($query)->count();
    
    $articles_count = Article::where($query)->count();
    $articles_published = Article::where('published', 1)->where($query)->count();

    $published_counts = Service::selectRaw('COUNT(*) as count, MONTHNAME(created_at) as month')
        ->where('published', 1)
        ->where($query)
        ->groupBy('month')
        ->orderByRaw('MIN(created_at) ASC')
        ->get();

    $months = $published_counts->pluck('month');
    $counts = $published_counts->pluck('count');

    return view('dashboard', compact(
        'services_count', 'services_published', 'services_pending', 'services_draft',
        'case_studies_count', 'case_published', 'articles_count', 'articles_published',
        'months', 'counts'
    ));
}
   
}
