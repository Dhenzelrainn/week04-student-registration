@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')

<section class="students-page">

    <div class="students-container">

        <div class="students-heading">

            <div>
                <span class="section-label">STUDENT DIRECTORY</span>

                <h1>
                    Registered
                    <span>students.</span>
                </h1>

                <p>
                    View all student records currently stored in the registration system.
                </p>
            </div>

            <a
                href="{{ route('students.create') }}"
                class="primary-button"
            >
                + Register Student
            </a>

        </div>


        <div class="students-card">

            <div class="table-header">

                <div>
                    <strong>Student Records</strong>

                    <span>
                        {{ $students->count() }}
                        {{ Str::plural('student', $students->count()) }}
                    </span>
                </div>

            </div>


            @if ($students->isEmpty())

                <div class="empty-state">

                    <div class="empty-icon">S</div>

                    <h2>No students registered yet.</h2>

                    <p>
                        Student records will appear here after a successful registration.
                    </p>

                    <a
                        href="{{ route('students.create') }}"
                        class="primary-button"
                    >
                        Register First Student
                    </a>

                </div>

            @else

                <div class="table-responsive">

                    <table class="students-table">

                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Student ID</th>
                                <th>Program</th>
                                <th>Year</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach ($students as $student)

                            <tr>

                                <td>
                                    <div class="table-student">

                                        <img
                                            src="{{ asset('storage/' . $student->profile_picture) }}"
                                            alt="{{ $student->full_name }}"
                                        >

                                        <div>
                                            <strong>{{ $student->full_name }}</strong>
                                            <span>{{ $student->gender }}</span>
                                        </div>

                                    </div>
                                </td>

                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->program }}</td>
                                <td>{{ $student->year_level }}</td>
                                <td>{{ $student->email }}</td>

                                <td>
                                    <a
                                        href="{{ route('students.show', $student) }}"
                                        class="view-link"
                                    >
                                        View →
                                    </a>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection
