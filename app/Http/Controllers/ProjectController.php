<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function showForm()
    {
        $Projects = Project::all(); // Fetch all form submissions from the database
        return view('upload', compact('Projects')); // Pass the $Projects variable to the Blade template
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bill_date' => 'required|date',
            'project_name' => 'required|string|max:255',
            'project_type' => 'required|string',
            'description' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'file_path' => 'nullable|file|mimes:jpeg,png,pdf', // Add appropriate file formats
        ]);

        if ($request->hasFile('fileInput')) {
            $filePath = $request->file('fileInput')->store('uploads'); // Store the file in the "uploads" directory
            $data['file_path'] = $filePath;
        }

        // dd($data);

        Project::create($data);

        // You can add any additional logic or redirects here

        // Redirect the user back to the original page
        return redirect()->route('form.submit')->with('success', 'Form submitted successfully!');
    }

    public function index()
    {
        $Projects = Project::all(); // Fetch all form submissions from the database
        return view('project', compact('Projects')); // Pass the $Projects variable to the Blade template
    }
}
