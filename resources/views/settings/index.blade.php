@extends('layouts.app')

@section('title', 'Settings - EduTrack')

@section('header', 'Settings')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    {{-- Page Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
        <p class="mt-1 text-sm text-gray-500">
            Manage your application preferences and system settings.
        </p>
    </div>

    {{-- General Settings --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                    <i data-lucide="settings" class="w-5 h-5 text-blue-600"></i>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-900">General</h2>
                    <p class="text-sm text-gray-500">
                        Basic application preferences
                    </p>
                </div>
            </div>
        </div>

        <div class="divide-y divide-gray-100">

            <div class="px-6 py-5 flex items-center justify-between">
                <div>
                    <p class="font-medium text-gray-900">Application Name</p>
                    <p class="text-sm text-gray-500">
                        The name displayed throughout the system
                    </p>
                </div>

                <span class="text-sm font-medium text-gray-700">
                    EduTrack
                </span>
            </div>

            <div class="px-6 py-5 flex items-center justify-between">
                <div>
                    <p class="font-medium text-gray-900">Language</p>
                    <p class="text-sm text-gray-500">
                        Choose your preferred language
                    </p>
                </div>

                <select
                    class="border border-gray-200 rounded-lg px-3 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>English</option>
                    <option>Filipino</option>
                </select>
            </div>

            <div class="px-6 py-5 flex items-center justify-between">
                <div>
                    <p class="font-medium text-gray-900">Timezone</p>
                    <p class="text-sm text-gray-500">
                        Timezone used by the application
                    </p>
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Asia/Manila
                </span>
            </div>

        </div>
    </div>


    {{-- Appearance --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
                    <i data-lucide="palette" class="w-5 h-5 text-purple-600"></i>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-900">Appearance</h2>
                    <p class="text-sm text-gray-500">
                        Customize how EduTrack looks
                    </p>
                </div>

            </div>
        </div>

        <div class="px-6 py-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="font-medium text-gray-900">Theme</p>
                    <p class="text-sm text-gray-500">
                        Choose the appearance of the application
                    </p>
                </div>

                <select
                    id="themeSelect"
                    class="border border-gray-200 rounded-lg px-3 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                </select>

            </div>

        </div>
    </div>


    {{-- Notifications --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center">
                    <i data-lucide="bell" class="w-5 h-5 text-yellow-600"></i>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-900">Notifications</h2>
                    <p class="text-sm text-gray-500">
                        Manage system notifications
                    </p>
                </div>

            </div>

        </div>

        <div class="divide-y divide-gray-100">

            <div class="px-6 py-5 flex items-center justify-between">

                <div>
                    <p class="font-medium text-gray-900">
                        System Notifications
                    </p>

                    <p class="text-sm text-gray-500">
                        Receive important system updates
                    </p>
                </div>

                <label class="relative inline-flex items-center cursor-pointer">

                    <input
                        type="checkbox"
                        class="sr-only peer"
                        checked>

                    <div class="w-11 h-6 bg-gray-200 rounded-full
                                peer peer-checked:bg-blue-600
                                after:content-['']
                                after:absolute
                                after:top-[2px]
                                after:left-[2px]
                                after:bg-white
                                after:border-gray-300
                                after:border
                                after:rounded-full
                                after:h-5
                                after:w-5
                                after:transition-all
                                peer-checked:after:translate-x-full">
                    </div>

                </label>

            </div>

        </div>
    </div>


    {{-- Security --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-5 h-5 text-green-600"></i>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-900">Security</h2>
                    <p class="text-sm text-gray-500">
                        Security and session preferences
                    </p>
                </div>

            </div>

        </div>

        <div class="divide-y divide-gray-100">

            <div class="px-6 py-5 flex items-center justify-between">

                <div>
                    <p class="font-medium text-gray-900">
                        Two-Factor Authentication
                    </p>

                    <p class="text-sm text-gray-500">
                        Add an additional layer of account security
                    </p>
                </div>

                <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-medium">
                    Not configured
                </span>

            </div>

            <div class="px-6 py-5 flex items-center justify-between">

                <div>
                    <p class="font-medium text-gray-900">
                        Session Timeout
                    </p>

                    <p class="text-sm text-gray-500">
                        Automatically end inactive sessions
                    </p>
                </div>

                <select
                    class="border border-gray-200 rounded-lg px-3 py-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option>30 minutes</option>
                    <option>1 hour</option>
                    <option>2 hours</option>
                    <option>Never</option>

                </select>

            </div>

        </div>
    </div>


    {{-- About --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">
                    <i data-lucide="info" class="w-5 h-5 text-gray-600"></i>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-900">About EduTrack</h2>
                    <p class="text-sm text-gray-500">
                        Application information
                    </p>
                </div>

            </div>

        </div>

        <div class="px-6 py-5 space-y-4">

            <div class="flex justify-between">
                <span class="text-sm text-gray-500">Application</span>
                <span class="text-sm font-medium text-gray-900">
                    EduTrack
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-sm text-gray-500">Version</span>
                <span class="text-sm font-medium text-gray-900">
                    1.0.0
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-sm text-gray-500">System</span>
                <span class="text-sm font-medium text-gray-900">
                    Student Information Management System
                </span>
            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const themeSelect = document.getElementById('themeSelect');

    themeSelect.addEventListener('change', function () {
        if (this.value === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
</script>
@endpush