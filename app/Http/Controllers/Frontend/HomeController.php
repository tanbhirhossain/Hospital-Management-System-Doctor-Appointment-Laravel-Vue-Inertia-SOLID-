<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index(): Response
    {
        return Inertia::render('Frontend/Home');
        // Pass data from backend like this:
        // return Inertia::render('Frontend/Home', [
        //     'departments' => Department::active()->get(),
        //     'doctors'     => Doctor::featured()->get(),
        // ]);
    }
}
