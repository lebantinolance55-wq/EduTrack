@extends('layouts.app')

@section('title', 'Edit Student')

@section('page-title', 'Edit Student')

@section('content')

<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header -->
    <div>

        <a href="{{ route('students.index') }}"
           class="inline-flex items-center gap-2 text-sm text-gray-500
                  hover:text-indigo-600 mb-4">

            <i data-lucide="arrow-left" class="w-4 h-4"></i>

            Back to Students

        </a>

        <h1 class="text-2xl font-bold text-gray-900">
            Edit Student
        </h1>

        <p class="text-gray-500 mt-1">
            Update the student's information.
        </p>

    </div>


    <!-- Validation Errors -->
    @if($errors->any())

        <div class="bg-red-50 border border-red-200 rounded-xl p-4">

            <div class="flex gap-3">

                <i data-lucide="alert-circle"
                   class="w-5 h-5 text-red-600">
                </i>

                <div>

                    <p class="font-medium text-red-700">
                        Please fix the following errors:
                    </p>

                    <ul class="mt-2 text-sm text-red-600 list-disc list-inside">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    <!-- Form -->
    <form action="{{ route('students.update', $student) }}"
          method="POST"
          class="bg-white rounded-2xl border border-gray-100
                 shadow-sm p-6 space-y-6">

        @csrf
        @method('PUT')


        <!-- Student ID -->
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Student ID
            </label>

            <input
                type="text"
                name="student_id"
                value="{{ old('student_id', $student->student_id) }}"
                class="w-full px-4 py-3 rounded-xl border
                       @error('student_id') border-red-400 @else border-gray-200 @enderror
                       focus:outline-none focus:ring-2
                       focus:ring-indigo-500/20 focus:border-indigo-500"
            >

            @error('student_id')
                <p class="text-sm text-red-600 mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- Name -->
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Full Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $student->name) }}"
                class="w-full px-4 py-3 rounded-xl border
                       @error('name') border-red-400 @else border-gray-200 @enderror
                       focus:outline-none focus:ring-2
                       focus:ring-indigo-500/20 focus:border-indigo-500"
            >

            @error('name')
                <p class="text-sm text-red-600 mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- Email -->
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $student->email) }}"
                class="w-full px-4 py-3 rounded-xl border
                       @error('email') border-red-400 @else border-gray-200 @enderror
                       focus:outline-none focus:ring-2
                       focus:ring-indigo-500/20 focus:border-indigo-500"
            >

            @error('email')
                <p class="text-sm text-red-600 mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- Course -->
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Course
            </label>

            <input
                type="text"
                name="course"
                value="{{ old('course', $student->course) }}"
                class="w-full px-4 py-3 rounded-xl border
                       @error('course') border-red-400 @else border-gray-200 @enderror
                       focus:outline-none focus:ring-2
                       focus:ring-indigo-500/20 focus:border-indigo-500"
            >

            @error('course')
                <p class="text-sm text-red-600 mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4
                    border-t border-gray-100">

            <a href="{{ route('students.index') }}"
               class="px-5 py-3 rounded-xl border border-gray-200
                      text-gray-600 text-center text-sm font-medium
                      hover:bg-gray-50 transition">

                Cancel

            </a>

            <button
                type="submit"
                class="px-5 py-3 rounded-xl bg-indigo-600
                       text-white text-sm font-medium
                       hover:bg-indigo-700 transition">

                Update Student

            </button>

        </div>

    </form>

</div>

@endsection