<?php

namespace App\Http\Controllers;

use App\Models\CarrierObjective;
use App\Models\TechnicalSkill;
use App\Models\ProfessionalExperience;
use App\Models\Education;
use App\Models\ProfessionalProject;
use App\Models\PublishedPaper;
use App\Models\ExternalExperience;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CVController extends Controller
{
    // Show the CV form
    public function create()
    {
        return view('cv.create');
    }

    // Store the CV data
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            // Users table validation
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',

            // Career Objectives validation
            'objective' => 'required|string|max:500',

            // Education validation
            'degree.*' => 'required|string|max:255',
            'institution_name.*' => 'required|string|max:255',
            'start_date.*' => 'required|date',
            'end_date.*' => 'required|date|after_or_equal:start_date.*',
            'grade.*' => 'required|string|max:10',

            // External Experience validation
            'experience_title.*' => 'required|string|max:255',
            'organization_name.*' => 'required|string|max:255',
            'start_date.*' => 'required|date',
            'end_date.*' => 'required|date|after_or_equal:start_date.*',
            'description.*' => 'required|string|max:1000',

            // Professional Experience validation
            'job_title.*' => 'required|string|max:255',
            'company_name.*' => 'required|string|max:255',
            'start_date.*' => 'required|date',
            'end_date.*' => 'required|date|after_or_equal:start_date.*',
            'job_description.*' => 'required|string|max:1000',

            // Professional Projects validation
            'project_name.*' => 'required|string|max:255',
            'project_description.*' => 'required|string|max:1000',

            // Published Papers validation (optional)
            'paper_title.*' => 'nullable|string|max:255',
            'journal_name.*' => 'nullable|string|max:255',
            'publication_date.*' => 'nullable|date',
            'paper_link.*' => 'nullable|url|max:255',

            // References validation
            'reference_name.*' => 'required|string|max:255',
            'reference_contact.*' => 'required|string|max:255',
            'relationship.*' => 'required|string|max:255',

            // Skills validation
            'skill_name.*' => 'required|string|max:255',
            'proficiency_level.*' => 'required|string|max:255',
        ],
        [
            // Custom error messages

            // Users table validation
            'name.required' => 'The name is required and cannot be empty.',
            'email.required' => 'Please provide an email address.',
            'email.email' => 'The email format is invalid.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'A password is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
            'phone.required' => 'Please provide a contact number.',
            'address.required' => 'Your address is required.',

            // Career Objectives validation
            'objective.required' => 'Please provide your career objective.',

            // Education validation
            'degree.*.required' => 'The degree field is required.',
            'grade.*.required' => 'The grade field is required.',

            'institution_name.*.required' => 'Please provide the institution name.',
            'start_date.*.required' => 'Please provide a start date.',
            'end_date.*.required' => 'Please provide an end date.',
            'end_date.*.after_or_equal' => 'The end date must be after or equal to the start date.',

            // External Experience validation
            'experience_title.*.required' => 'The experience title is required.',
            'organization_name.*.required' => 'Please provide the organization name.',
            'description.*.required' => 'Please provide a description of the experience.',

            // Professional Experience validation
            'job_title.*.required' => 'The job title is required.',
            'company_name.*.required' => 'Please provide the company name.',
            'job_description.*.required' => 'Please provide a description of the job.',

            // Professional Projects validation
            'project_name.*.required' => 'The project name is required.',
            'project_description.*.required' => 'Please provide a description of the project.',

            // Published Papers validation (optional)
            'paper_title.*.nullable' => 'The paper title is optional.',
            'journal_name.*.nullable' => 'The journal name is optional.',
            'paper_link.*.url' => 'The paper link must be a valid URL.',

            // References validation
            'reference_name.*.required' => 'Please provide the reference name.',
            'reference_contact.*.required' => 'Please provide the reference contact information.',
            'relationship.*.required' => 'Please specify the relationship with the reference.',

            // Skills validation
            'skill_name.*.required' => 'Please provide the skill name.',
            'proficiency_level.*.required' => 'Please provide the proficiency level.',
        ]);
        return redirect()->route('cv.create')->with('success', 'CV data saved successfully.');
    }
}

