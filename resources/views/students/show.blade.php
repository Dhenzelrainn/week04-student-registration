@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

<section class="profile-page">

    <div class="profile-container">

        <div class="profile-page-heading">

            <span class="section-label">
                REGISTRATION COMPLETE
            </span>

            <h1>
                Student
                <span>profile.</span>
            </h1>

            <p>
                The student information has been successfully
                saved to the registration system.
            </p>

        </div>


        <div class="student-profile-card">

            <div class="profile-card-top">

                <div class="student-photo-wrapper">

                    <img
                        src="{{ asset('storage/' . $student->profile_picture) }}"
                        alt="{{ $student->full_name }}"
                        class="student-photo"
                    >

                </div>


                <div class="student-main-info">

                    <span class="student-status">
                        <span></span>
                        Registered Student
                    </span>

                    <h2>
                        {{ $student->full_name }}
                    </h2>

                    <p>
                        {{ $student->program }}
                    </p>

                    <div class="student-tags">

                        <span>
                            {{ $student->student_id }}
                        </span>

                        <span>
                            {{ $student->year_level }}
                        </span>

                    </div>

                </div>


                <div class="profile-success-mark">
                    ✓
                </div>

            </div>


            <div class="profile-divider"></div>


            <div class="student-details-grid">

                <div class="detail-item">
                    <span>
                        Student ID
                    </span>

                    <strong>
                        {{ $student->student_id }}
                    </strong>
                </div>


                <div class="detail-item">
                    <span>
                        Program
                    </span>

                    <strong>
                        {{ $student->program }}
                    </strong>
                </div>


                <div class="detail-item">
                    <span>
                        Year Level
                    </span>

                    <strong>
                        {{ $student->year_level }}
                    </strong>
                </div>


                <div class="detail-item">
                    <span>
                        Gender
                    </span>

                    <strong>
                        {{ $student->gender }}
                    </strong>
                </div>


                <div class="detail-item">
                    <span>
                        Date of Birth
                    </span>

                    <strong>
                        {{ $student->date_of_birth->format('F d, Y') }}
                    </strong>
                </div>


                <div class="detail-item">
                    <span>
                        Mobile Number
                    </span>

                    <strong>
                        {{ $student->mobile_number }}
                    </strong>
                </div>


                <div class="detail-item detail-item-full">
                    <span>
                        Email Address
                    </span>

                    <strong>
                        {{ $student->email }}
                    </strong>
                </div>


                <div class="detail-item detail-item-full">
                    <span>
                        Complete Address
                    </span>

                    <strong>
                        {{ $student->address }}
                    </strong>
                </div>

            </div>


            <div class="profile-card-actions">

                <a
                    href="{{ route('students.index') }}"
                    class="secondary-button"
                >
                    View Students
                </a>

                <a
                    href="{{ route('students.create') }}"
                    class="primary-button"
                >
                    Register Another Student
                    <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>

@endsection