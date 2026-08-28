<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display all registered students.
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly registered student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'student_id' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:students,student_id',
                ],

                'first_name' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[\pL\s\-]+$/u',
                ],

                'middle_name' => [
                    'nullable',
                    'string',
                    'max:100',
                    'regex:/^[\pL\s\-]+$/u',
                ],

                'last_name' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[\pL\s\-]+$/u',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:students,email',
                ],

                'mobile_number' => [
                    'required',
                    'numeric',
                    'digits_between:10,15',
                ],

                'date_of_birth' => [
                    'required',
                    'date',
                    'before_or_equal:today',
                ],

                'gender' => [
                    'required',
                    'in:Male,Female,Prefer not to say',
                ],

                'program' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'year_level' => [
                    'required',
                    'in:1st Year,2nd Year,3rd Year,4th Year',
                ],

                'address' => [
                    'required',
                    'string',
                    'max:500',
                ],

                'profile_picture' => [
                    'required',
                    'image',
                    'mimes:jpg,jpeg,png',
                    'max:2048',
                ],
            ],
            [
                'student_id.required' => 'Student ID is required.',
                'student_id.unique' => 'This Student ID is already registered.',

                'first_name.required' => 'First name is required.',
                'first_name.regex' => 'First name must contain letters only.',

                'middle_name.regex' => 'Middle name must contain letters only.',

                'last_name.required' => 'Last name is required.',
                'last_name.regex' => 'Last name must contain letters only.',

                'email.required' => 'Email address is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already registered.',

                'mobile_number.required' => 'Mobile number is required.',
                'mobile_number.numeric' => 'Mobile number must contain numbers only.',
                'mobile_number.digits_between' => 'Mobile number must contain 10 to 15 digits.',

                'date_of_birth.required' => 'Date of birth is required.',
                'date_of_birth.before_or_equal' => 'Date of birth cannot be in the future.',

                'gender.required' => 'Please select a gender.',

                'program.required' => 'Please select a program.',

                'year_level.required' => 'Please select a year level.',

                'address.required' => 'Address is required.',

                'profile_picture.required' => 'Profile picture is required.',
                'profile_picture.image' => 'The uploaded file must be an image.',
                'profile_picture.mimes' => 'Profile picture must be JPG, JPEG, or PNG.',
                'profile_picture.max' => 'Profile picture must not exceed 2 MB.',
            ]
        );

        $profilePath = $request
            ->file('profile_picture')
            ->store('student-profiles', 'public');

        $validated['profile_picture'] = $profilePath;

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student)
            ->with(
                'success',
                'Student registered successfully!'
            );
    }

    /**
     * Display a registered student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}