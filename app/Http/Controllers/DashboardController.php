<?php

// DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $earningsMonthly = 40000; // Sample monthly earnings
        $earningsAnnual = 215000; // Sample annual earnings
        $pendingRequests = 18;    // Sample pending requests count

        // Fetch chart data (replace these with actual queries)
        $areaChartData = [
            ['month' => 'January', 'value' => 0],
            ['month' => 'February', 'value' => 100],
            ['month' => 'March', 'value' => 50],
            ['month' => 'April', 'value' => 200],
            ['month' => 'May', 'value' => 150],
            ['month' => 'June', 'value' => 300],
            // ... add more data points
        ];

        $pieChartData = [
            ['label' => 'Direct', 'value' => 30, 'color' => '#FF5733'],
            ['label' => 'Social', 'value' => 45, 'color' => '#33FFC1'],
            ['label' => 'Referral', 'value' => 25, 'color' => '#3369FF'],
        ];

        $barChartData = [
            ['label' => 'Category 1', 'value' => 1000],
            ['label' => 'Category 2', 'value' => 4000],
            ['label' => 'Category 3', 'value' => 7000],
            // ... add more data points
        ];

        return view('dashboard', compact('earningsMonthly', 'earningsAnnual', 'pendingRequests', 'areaChartData', 'pieChartData', 'barChartData'));
    }
}
