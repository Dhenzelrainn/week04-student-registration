@extends('layouts.app')

@section('title', 'Register Student')

@section('content')

<section class="registration-page">

    <div class="registration-container">

        <div class="registration-intro">

            <span class="section-label">
                01 — STUDENT REGISTRATION
            </span>

            <h1>
                Start your
                <span>registration.</span>
            </h1>

            <p class="intro-description">
                Complete the form with accurate student information.
                Required fields must be filled out before submitting
                the registration.
            </p>

            <div class="intro-features">

                <div class="intro-feature">
                    <span>01</span>

                    <div>
                        <strong>Accurate Information</strong>
                        <p>
                            Provide complete and correct student details.
                        </p>
                    </div>
                </div>

                <div class="intro-feature">
                    <span>02</span>

                    <div>
                        <strong>Secure Validation</strong>
                        <p>
                            Submitted information is validated before
                            being stored.
                        </p>
                    </div>
                </div>

                <div class="intro-feature">
                    <span>03</span>

                    <div>
                        <strong>Student Profile</strong>
                        <p>
                            View the complete profile after registration.
                        </p>
                    </div>
                </div>

            </div>

        </div>


        <div class="registration-card">

            <div class="form-card-header">

                <div>
                    <span class="form-eyebrow">
                        Registration Form
                    </span>

                    <h2>
                        Student Information
                    </h2>

                    <p>
                        Fields marked with
                        <strong>*</strong>
                        are required.
                    </p>
                </div>

                <div class="form-header-badge">
                    NEW
                </div>

            </div>


            @if ($errors->any())

                <div class="validation-summary">

                    <div class="validation-summary-icon">
                        !
                    </div>

                    <div>
                        <strong>
                            Please check your information.
                        </strong>

                        <p>
                            Fix the following before registration can continue:
                        </p>

                        <ul class="validation-error-list" style="margin: 8px 0 0 18px; padding: 0;">
                            @foreach ($errors->all() as $error)
                                <li style="margin-bottom: 4px; font-size: 11px; line-height: 1.5;">{{ $error }}</li>
                            @endforeach
                        </ul>

                        @if ($errors->has('profile_picture'))
                            <p class="validation-file-note" style="margin-top: 10px; font-size: 10px; line-height: 1.5;">
                                Note: For security, browsers clear selected files after a failed submission.
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

                        <span class="section-number">
                            01
                        </span>

                        <div>
                            <h3>
                                Personal Information
                            </h3>

                            <p>
                                Basic information about the student.
                            </p>
                        </div>

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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
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
                                <option value="">
                                    Select gender
                                </option>

                                <option
                                    value="Male"
                                    @selected(old('gender') === 'Male')
                                >
                                    Male
                                </option>

                                <option
                                    value="Female"
                                    @selected(old('gender') === 'Female')
                                >
                                    Female
                                </option>

                                <option
                                    value="Prefer not to say"
                                    @selected(old('gender') === 'Prefer not to say')
                                >
                                    Prefer not to say
                                </option>

                            </select>

                            @error('gender')
                                <small class="error-message">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ACADEMIC INFORMATION --}}

                <div class="form-section">

                    <div class="form-section-heading">

                        <span class="section-number">
                            02
                        </span>

                        <div>
                            <h3>
                                Academic Information
                            </h3>

                            <p>
                                Student identification and academic details.
                            </p>
                        </div>

                    </div>


                    <div class="form-grid">

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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


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

                                <option value="">
                                    Select program
                                </option>

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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
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

                                <option value="">
                                    Select year level
                                </option>

                                @foreach (
                                    [
                                        '1st Year',
                                        '2nd Year',
                                        '3rd Year',
                                        '4th Year'
                                    ] as $year
                                )

                                    <option
                                        value="{{ $year }}"
                                        @selected(old('year_level') === $year)
                                    >
                                        {{ $year }}
                                    </option>

                                @endforeach

                            </select>

                            @error('year_level')
                                <small class="error-message">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- CONTACT INFORMATION --}}

                <div class="form-section">

                    <div class="form-section-heading">

                        <span class="section-number">
                            03
                        </span>

                        <div>
                            <h3>
                                Contact Information
                            </h3>

                            <p>
                                Contact details and current address.
                            </p>
                        </div>

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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
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
                                <small class="error-message">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        <div class="form-group form-group-full">

                            <label for="address">
                                Complete Address
                                <span>*</span>
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                required
                                rows="4"
                                placeholder="House number, street, barangay, city/municipality, province"
                                class="{{ $errors->has('address') ? 'input-error' : '' }}"
                            >{{ old('address') }}</textarea>

                            @error('address')
                                <small class="error-message">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- PROFILE PICTURE --}}

                <div class="form-section">

                    <div class="form-section-heading">

                        <span class="section-number">
                            04
                        </span>

                        <div>
                            <h3>
                                Profile Picture
                            </h3>

                            <p>
                                Upload a clear image of the student.
                            </p>
                        </div>

                    </div>


                    <div class="profile-upload-layout">

                        <div
                            class="profile-preview"
                            id="profilePreview"
                        >
                            <div
                                class="profile-placeholder"
                                id="profilePlaceholder"
                            >
                                <span class="upload-camera-icon">
                                    +
                                </span>

                                <small>
                                    Preview
                                </small>
                            </div>

                            <img
                                src=""
                                alt="Profile preview"
                                id="profilePreviewImage"
                                hidden
                            >
                        </div>


                        <div class="upload-content">

                            <label
                                for="profile_picture"
                                class="upload-box {{ $errors->has('profile_picture') ? 'upload-error' : '' }}"
                            >

                                <span class="upload-icon">
                                    ↑
                                </span>

                                <div>
                                    <strong>
                                        Upload profile picture
                                    </strong>

                                    <p id="fileName">
                                        Select a JPG, JPEG, or PNG image.
                                    </p>

                                    <small>
                                        Maximum file size: 5 MB
                                    </small>
                                </div>

                                <span class="upload-button">
                                    Select Image
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

                            @error('profile_picture')
                                <small class="error-message">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- SUBMIT --}}

                <div class="form-footer">

                    <p>
                        By registering, you confirm that all
                        information provided is accurate.
                    </p>

                    <button
                        type="submit"
                        class="primary-button"
                    >
                        Register Student

                        <span>
                            →
                        </span>
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection