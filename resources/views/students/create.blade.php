@extends('layouts.app')

@section('title', 'Register Student')

@section('content')

<section class="registration-page">

    <div class="registration-layout">

        <aside class="registration-hero">

            <div class="hero-copy">

                <span class="hero-eyebrow">
                    WELCOME TO PINAGBAYANAN UNIVERSITY
                </span>

                <h1>
                    Start your
                    <br>
                    registration<span>.</span>
                </h1>

                <p>
                    Join a community of learners and future leaders.
                    Please provide accurate information to create your
                    student profile and begin your journey with us.
                </p>

            </div>


            <div class="hero-feature-stack">

                <article class="hero-feature-card">
                    <div class="hero-feature-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7 8a7 7 0 0 0-14 0" />
                            <path d="M17 10h4M19 8v4" />
                        </svg>
                    </div>

                    <div>
                        <strong>Accurate Information</strong>
                        <p>Provide correct details for a smooth registration experience.</p>
                    </div>
                </article>

                <article class="hero-feature-card">
                    <div class="hero-feature-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 3 5 6v5c0 4.6 2.9 8.1 7 10 4.1-1.9 7-5.4 7-10V6l-7-3Z" />
                            <path d="m9.5 12 1.7 1.7 3.7-4" />
                        </svg>
                    </div>

                    <div>
                        <strong>Secure Validation</strong>
                        <p>Your information is verified and protected before saving.</p>
                    </div>
                </article>

                <article class="hero-feature-card">
                    <div class="hero-feature-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="8" r="3.5" />
                            <path d="M5.5 20a6.5 6.5 0 0 1 13 0" />
                        </svg>
                    </div>

                    <div>
                        <strong>Student Profile</strong>
                        <p>Build your profile and keep your student details organized.</p>
                    </div>
                </article>

            </div>


            <img
                src="{{ asset('images/pu-campus-hero.png') }}"
                alt="Pinagbayanan University campus"
                class="hero-campus-image"
            >

        </aside>


        <div class="registration-panel">

            <div class="registration-card">

                <div class="form-card-header">

                    <div class="form-title-wrap">

                        <div class="form-title-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="3.5" />
                                <path d="M5.5 20a6.5 6.5 0 0 1 13 0" />
                                <path d="M18 11h4M20 9v4" />
                            </svg>
                        </div>

                        <div>
                            <div class="form-title-row">
                                <h2>Registration Form</h2>
                                <span class="form-header-badge">New</span>
                            </div>

                            <p>Fill out the form below to register as a new student.</p>
                        </div>

                    </div>

                </div>


                @if ($errors->any())

                    <div class="validation-summary">

                        <div class="validation-summary-icon">!</div>

                        <div>
                            <strong>Please check your information.</strong>

                            <p>Fix the following before registration can continue:</p>

                            <ul class="validation-error-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            @if ($errors->has('profile_picture'))
                                <p class="validation-file-note">
                                    Browsers clear selected files after a failed submission.
                                    Please select your profile picture again before resubmitting.
                                </p>
                            @endif
                        </div>

                    </div>

                @endif


                <form
                    action="{{ route('students.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="registration-form"
                >

                    @csrf


                    {{-- PERSONAL INFORMATION --}}

                    <div class="form-section">

                        <div class="form-section-heading">
                            <span class="section-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <circle cx="12" cy="8" r="3.5" />
                                    <path d="M5.5 20a6.5 6.5 0 0 1 13 0" />
                                </svg>
                            </span>

                            <h3>Personal Information</h3>
                        </div>


                        <div class="form-grid form-grid-3">

                            <div class="form-group">
                                <label for="first_name">
                                    First Name
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    required
                                    value="{{ old('first_name') }}"
                                    placeholder="Enter first name"
                                    class="{{ $errors->has('first_name') ? 'input-error' : '' }}"
                                >

                                @error('first_name')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="middle_name">
                                    Middle Name
                                    <em>Optional</em>
                                </label>

                                <input
                                    type="text"
                                    id="middle_name"
                                    name="middle_name"
                                    value="{{ old('middle_name') }}"
                                    placeholder="Enter middle name"
                                    class="{{ $errors->has('middle_name') ? 'input-error' : '' }}"
                                >

                                @error('middle_name')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="last_name">
                                    Last Name
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    required
                                    value="{{ old('last_name') }}"
                                    placeholder="Enter last name"
                                    class="{{ $errors->has('last_name') ? 'input-error' : '' }}"
                                >

                                @error('last_name')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="date_of_birth">
                                    Date of Birth
                                    <span>*</span>
                                </label>

                                <input
                                    type="date"
                                    id="date_of_birth"
                                    name="date_of_birth"
                                    required
                                    value="{{ old('date_of_birth') }}"
                                    max="{{ now()->toDateString() }}"
                                    class="{{ $errors->has('date_of_birth') ? 'input-error' : '' }}"
                                >

                                @error('date_of_birth')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="gender">
                                    Gender
                                    <span>*</span>
                                </label>

                                <select
                                    id="gender"
                                    name="gender"
                                    required
                                    class="{{ $errors->has('gender') ? 'input-error' : '' }}"
                                >
                                    <option value="">Select gender</option>
                                    <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                                    <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                                    <option value="Prefer not to say" @selected(old('gender') === 'Prefer not to say')>
                                        Prefer not to say
                                    </option>
                                </select>

                                @error('gender')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="student_id">
                                    Student ID
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="student_id"
                                    name="student_id"
                                    required
                                    value="{{ old('student_id') }}"
                                    placeholder="Example: 2026-00123"
                                    class="{{ $errors->has('student_id') ? 'input-error' : '' }}"
                                >

                                @error('student_id')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>


                    {{-- ACADEMIC INFORMATION --}}

                    <div class="form-section">

                        <div class="form-section-heading">
                            <span class="section-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="m3 9 9-5 9 5-9 5-9-5Z" />
                                    <path d="M7 12v4c3 2 7 2 10 0v-4" />
                                </svg>
                            </span>

                            <h3>Academic Information</h3>
                        </div>


                        <div class="form-grid">

                            <div class="form-group">
                                <label for="program">
                                    Program
                                    <span>*</span>
                                </label>

                                <select
                                    id="program"
                                    name="program"
                                    required
                                    class="{{ $errors->has('program') ? 'input-error' : '' }}"
                                >
                                    <option value="">Select program</option>

                                    <option
                                        value="BS Information Technology"
                                        @selected(old('program') === 'BS Information Technology')
                                    >
                                        BS Information Technology
                                    </option>

                                    <option
                                        value="BS Computer Science"
                                        @selected(old('program') === 'BS Computer Science')
                                    >
                                        BS Computer Science
                                    </option>

                                    <option
                                        value="BS Information Systems"
                                        @selected(old('program') === 'BS Information Systems')
                                    >
                                        BS Information Systems
                                    </option>

                                    <option
                                        value="BS Entertainment and Multimedia Computing"
                                        @selected(old('program') === 'BS Entertainment and Multimedia Computing')
                                    >
                                        BS Entertainment and Multimedia Computing
                                    </option>
                                </select>

                                @error('program')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="year_level">
                                    Year Level
                                    <span>*</span>
                                </label>

                                <select
                                    id="year_level"
                                    name="year_level"
                                    required
                                    class="{{ $errors->has('year_level') ? 'input-error' : '' }}"
                                >
                                    <option value="">Select year level</option>

                                    @foreach (['1st Year', '2nd Year', '3rd Year', '4th Year'] as $year)
                                        <option
                                            value="{{ $year }}"
                                            @selected(old('year_level') === $year)
                                        >
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('year_level')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>


                    {{-- CONTACT INFORMATION --}}

                    <div class="form-section">

                        <div class="form-section-heading">
                            <span class="section-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M7 4h3l1.5 4-2 1.5a15 15 0 0 0 5 5L16 12.5l4 1.5v3c0 1.1-.9 2-2 2C10.3 19 5 13.7 5 7c0-1.1.9-2 2-2Z" />
                                </svg>
                            </span>

                            <h3>Contact Information</h3>
                        </div>


                        <div class="form-grid">

                            <div class="form-group">
                                <label for="email">
                                    Email Address
                                    <span>*</span>
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    value="{{ old('email') }}"
                                    placeholder="student@example.com"
                                    class="{{ $errors->has('email') ? 'input-error' : '' }}"
                                >

                                @error('email')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="mobile_number">
                                    Mobile Number
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="mobile_number"
                                    name="mobile_number"
                                    required
                                    value="{{ old('mobile_number') }}"
                                    placeholder="09123456789"
                                    inputmode="numeric"
                                    maxlength="15"
                                    class="{{ $errors->has('mobile_number') ? 'input-error' : '' }}"
                                >

                                @error('mobile_number')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group form-group-full">
                                <label for="address">
                                    Complete Address
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    required
                                    value="{{ old('address') }}"
                                    placeholder="House No., Street, Barangay, City/Municipality, Province"
                                    class="{{ $errors->has('address') ? 'input-error' : '' }}"
                                >

                                @error('address')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>


                    {{-- PROFILE PICTURE --}}

                    <div class="form-section">

                        <div class="form-section-heading">
                            <span class="section-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <circle cx="9" cy="10" r="2" />
                                    <path d="m5 17 4-4 3 3 2-2 5 3" />
                                </svg>
                            </span>

                            <h3>Profile Picture</h3>
                        </div>


                        <div class="profile-upload-layout">

                            <label
                                for="profile_picture"
                                class="upload-box {{ $errors->has('profile_picture') ? 'upload-error' : '' }}"
                            >
                                <span class="upload-icon">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 16V4" />
                                        <path d="m7.5 8.5 4.5-4.5 4.5 4.5" />
                                        <path d="M5 14v4a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-4" />
                                    </svg>
                                </span>

                                <strong>Drag and drop or click to upload</strong>

                                <p id="fileName">
                                    JPG, JPEG, PNG · up to 15 MB
                                </p>

                                <span class="upload-button">
                                    Choose File
                                </span>
                            </label>


                            <input
                                type="file"
                                id="profile_picture"
                                name="profile_picture"
                                required
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="file-input"
                            >


                            <div class="profile-preview-group">

                                <span class="preview-label">Preview</span>

                                <div
                                    class="profile-preview"
                                    id="profilePreview"
                                >

                                    <div
                                        class="profile-placeholder"
                                        id="profilePlaceholder"
                                    >
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <circle cx="12" cy="8" r="3.5" />
                                            <path d="M5.5 20a6.5 6.5 0 0 1 13 0" />
                                        </svg>
                                    </div>

                                    <img
                                        src=""
                                        alt="Profile preview"
                                        id="profilePreviewImage"
                                        hidden
                                    >

                                </div>

                                <small>
                                    Clear, front-facing photo recommended.
                                </small>

                            </div>

                        </div>

                        @error('profile_picture')
                            <small class="error-message upload-error-message">
                                {{ $message }}
                            </small>
                        @enderror

                        <small
                            class="error-message upload-error-message"
                            id="clientFileError"
                            hidden
                        ></small>

                    </div>


                    <div class="form-footer">

                        <button
                            type="submit"
                            class="primary-button full-submit"
                        >
                            Register Student
                        </button>

                        <p>
                            By registering, you confirm that all information
                            provided is accurate.
                        </p>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection
