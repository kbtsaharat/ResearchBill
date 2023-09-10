<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;

class FormSubmissionController extends Controller
{
    public function showForm()
    {
        return view('upload');
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

        FormSubmission::create($data);

        // You can add any additional logic or redirects here

        // Redirect the user back to the original page
        return redirect()->route('form.submit')->with('success', 'Form submitted successfully!');
    }

    public function index()
    {
        $formSubmissions = FormSubmission::all(); // Fetch all form submissions from the database
        return view('project', compact('formSubmissions')); // Pass the $formSubmissions variable to the Blade template
    }
}
