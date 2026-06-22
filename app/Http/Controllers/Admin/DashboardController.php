<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Post, Testimonial, Lead};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'posts'  => Post::count(),
            'testis' => Testimonial::count(),
            'leads'  => Lead::count(),
            'ultimos'=> Lead::latest()->take(5)->get(),
        ]);
    }
}
