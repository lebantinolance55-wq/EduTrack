@extends('layouts.app')

@section('title', 'About EduTrack')

@section('page-title', 'About EduTrack')

@section('content')

<div class="max-w-4xl">
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
        
        <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-sm font-medium">
            About the System
        </span>

        <h1 class="text-4xl font-bold text-gray-900 mt-4">
            {{ $name }}
        </h1>

        <p class="text-lg text-gray-500 mt-3">
            {{ $description }}
        </p>

        <div class="mt-8 grid md:grid-cols-3 gap-4">
            <div class="p-5 rounded-2xl bg-gray-50">
                <p class="text-sm text-gray-500">Purpose</p>
                <p class="font-semibold text-gray-900 mt-1">Student Management</p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50">
                <p class="text-sm text-gray-500">Platform</p>
                <p class="font-semibold text-gray-900 mt-1">Laravel</p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50">
                <p class="text-sm text-gray-500">Status</p>
                <p class="font-semibold text-green-600 mt-1">Active</p>
            </div>
        </div>

    </div>
</div>

@endsection