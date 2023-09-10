<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchBudget;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
{
    public function showResearch()
    {
        $projectLeaderName = Auth::user()->name;
        $dataFromDatabase = ResearchBudget::all();
        $teamMembers = User::where('id', '!=', Auth::user()->id)->get();

        return view('research', [
            'projectLeaderName' => $projectLeaderName,
            'dataFromDatabase' => $dataFromDatabase,
            'teamMembers' => $teamMembers,
        ]);
    }
}
