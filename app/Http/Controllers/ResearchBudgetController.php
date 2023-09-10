<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchBudget;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResearchBudgetController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'itemList' => 'required|string',
            'amount' => 'required|numeric',
            'researchCategory' => 'required|string',
            'budgetInstallments' => 'required|integer',
            'teamMembers' => 'array', // Make sure it's an array
        ]);

        // Store the research budget data
        $researchBudget = ResearchBudget::create($data);

        // Attach selected team members to the research budget
        if ($request->has('teamMembers')) {
            $researchBudget->teamMembers()->attach($data['teamMembers']);
        }

        // Retrieve the list of all team members except the project leader
        $teamMembers = User::where('id', '!=', Auth::user()->id)->get();

        // Retrieve the selected team members from the request
        $selectedTeamMembers = User::whereIn('id', $request->input('teamMembers', []))->get();


        return redirect()->route('research')->with([
            'teamMembers' => $teamMembers,
            'selectedTeamMembers' => $selectedTeamMembers,
            'success' => 'Budget saved successfully!'
        ]);
    }


    public function showResearch(Request $request)
    {
        // Retrieve the project leader's name
        $projectLeaderName = Auth::user()->name;

        // Retrieve the existing data from the database
        $dataFromDatabase = ResearchBudget::all();

        // Retrieve the list of all team members except the project leader
        $teamMembers = User::where('id', '!=', Auth::user()->id)->get();

        // Retrieve the selected team members from the request
        $selectedTeamMembers = User::whereIn('id', $request->input('teamMembers', []))->get();

        return view('research', [
            'projectLeaderName' => $projectLeaderName,
            'dataFromDatabase' => $dataFromDatabase,
            'teamMembers' => $teamMembers,
            'selectedTeamMembers' => $selectedTeamMembers,
        ]);
    }

    public function delete(Request $request, $ids)
    {
        $idsArray = explode(',', $ids);

        foreach ($idsArray as $id) {
            // Delete the research budget record by its ID
            ResearchBudget::destroy($id);
        }

        return response()->json(['success' => true]);
    }
}
