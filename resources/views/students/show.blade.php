@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

<section class="profile-page">

    <div class="profile-container">

        <div class="profile-page-heading">

            <span class="profile-complete-label">
                REGISTRATION COMPLETE
                <span></span>
            </span>

            <h1>
                Student <span>profile.</span>
            </h1>

            <p>
                The student information has been successfully saved
                to the registration system.
            </p>

        </div>


        <div class="profile-layout">

            <aside class="profile-photo-card">

                <div class="profile-photo-frame">

                    <img
                        src="{{ asset('storage/' . $student->profile_picture) }}"
                        alt="{{ $student->full_name }}"
                        class="profile-photo"
                    >

                    <div class="profile-photo-check">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m7 12 3 3 7-7"></path>
                        </svg>
                    </div>

                </div>


                <div class="registered-badge">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m7 12 3 3 7-7"></path>
                    </svg>

                    REGISTERED

                </div>


                <div class="verified-copy">

                    <strong>
                        Verified Student
                    </strong>

                    <p>
                        Your registration is complete
                        and verified.
                    </p>

                </div>


                <div class="profile-seal" aria-hidden="true">

                    <span class="seal-left">❧</span>

                    <div class="seal-center">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 3 5 6v5c0 4.6 2.9 8.1 7 10 4.1-1.9 7-5.4 7-10V6l-7-3Z"></path>
                            <path d="m9 12 2 2 4-5"></path>
                        </svg>
                    </div>

                    <span class="seal-right">❧</span>

                </div>

            </aside>


            <article class="student-profile-card">

                <div class="profile-card-top">

                    <div class="student-main-info">

                        <h2>
                            {{ $student->full_name }}
                        </h2>

                        <div class="profile-program">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="m3 9 9-5 9 5-9 5-9-5Z"></path>
                                <path d="M7 12v4c3 2 7 2 10 0v-4"></path>
                            </svg>

                            <span>
                                {{ $student->program }}
                            </span>

                        </div>


                        <div class="student-tags">

                            <div class="student-tag">

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                                    <path d="M9 7h6M9 11h6M9 15h4"></path>
                                </svg>

                                <div>
                                    <strong>
                                        {{ $student->student_id }}
                                    </strong>

                                    <small>
                                        Student ID
                                    </small>
                                </div>

                            </div>


                            <div class="student-tag">

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <circle cx="12" cy="8" r="3"></circle>
                                    <path d="M6 20a6 6 0 0 1 12 0"></path>
                                </svg>

                                <div>
                                    <strong>
                                        {{ $student->year_level }}
                                    </strong>

                                    <small>
                                        Year Level
                                    </small>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="profile-success-mark">

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m7 12 3 3 7-7"></path>
                        </svg>

                    </div>

                </div>


                <div class="profile-divider"></div>


                <div class="student-details-grid">

                    <div class="detail-item">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                                <path d="M9 7h6M9 11h6M9 15h4"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Student ID</span>
                            <strong>{{ $student->student_id }}</strong>
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="4" y="5" width="16" height="15" rx="2"></rect>
                                <path d="M8 3v4M16 3v4M4 9h16"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Program</span>
                            <strong>{{ $student->program }}</strong>
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                                <path d="M9 7h6M9 11h6M9 15h6"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Year Level</span>
                            <strong>{{ $student->year_level }}</strong>
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="3.5"></circle>
                                <path d="M5.5 20a6.5 6.5 0 0 1 13 0"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Gender</span>
                            <strong>{{ $student->gender }}</strong>
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="5" width="18" height="16" rx="2"></rect>
                                <path d="M8 3v4M16 3v4M3 10h18"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Date of Birth</span>
                            <strong>{{ $student->date_of_birth->format('F d, Y') }}</strong>
                        </div>

                    </div>


                    <div class="detail-item">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M7 4h3l1.5 4-2 1.5a15 15 0 0 0 5 5L16 12.5l4 1.5v3c0 1.1-.9 2-2 2C10.3 19 5 13.7 5 7c0-1.1.9-2 2-2Z"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Mobile Number</span>
                            <strong>{{ $student->mobile_number }}</strong>
                        </div>

                    </div>


                    <div class="detail-item detail-item-full">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                <path d="m4 7 8 6 8-6"></path>
                            </svg>
                        </div>

                        <div>
                            <span>Email Address</span>
                            <strong>{{ $student->email }}</strong>
                        </div>

                    </div>


                    <div class="detail-item detail-item-full">

                        <div class="detail-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="2.5"></circle>
                            </svg>
                        </div>

                        <div>
                            <span>Complete Address</span>
                            <strong>{{ $student->address }}</strong>
                        </div>

                    </div>

                </div>


                <div class="profile-card-actions">

                    <a
                        href="{{ route('students.index') }}"
                        class="profile-secondary-button"
                    >

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="9" cy="8" r="3"></circle>
                            <circle cx="17" cy="9" r="2.5"></circle>
                            <path d="M3 20a6 6 0 0 1 12 0M14 15a5 5 0 0 1 7 5"></path>
                        </svg>

                        View Students

                    </a>


                    <a
                        href="{{ route('students.create') }}"
                        class="profile-primary-button"
                    >

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="9" cy="8" r="3"></circle>
                            <path d="M3 20a6 6 0 0 1 12 0"></path>
                            <path d="M18 10v6M15 13h6"></path>
                        </svg>

                        Register Another Student

                    </a>

                </div>

            </article>

        </div>

    </div>

</section>

@endsection
