<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function courses()
    {
        return [
            [
                'code' => 'BSCpE',
                'name' => 'BS Computer Engineering',
                'department' => 'Engineering & Technology',
                'duration' => '4 Years',
                'icon' => 'cpu',
                'description' => 'A program focused on computer hardware, software, electronics, networking, and embedded systems.',
                'subjects' => [
                    'Programming Fundamentals',
                    'Computer Programming',
                    'Digital Logic Design',
                    'Data Structures and Algorithms',
                    'Computer Networks',
                    'Microprocessors and Microcontrollers',
                    'Operating Systems',
                    'Computer Architecture',
                    'Electronics Engineering',
                    'Embedded Systems',
                    'Computer Engineering Design',
                    'Thesis / Capstone Project',
                ],
            ],

            [
                'code' => 'BSIT',
                'name' => 'BS Information Technology',
                'department' => 'Information Technology',
                'duration' => '4 Years',
                'icon' => 'monitor',
                'description' => 'A program focused on software development, databases, networking, web technologies, and information systems.',
                'subjects' => [
                    'Introduction to Computing',
                    'Computer Programming',
                    'Web Development',
                    'Database Management',
                    'Data Structures',
                    'Networking Fundamentals',
                    'Systems Analysis and Design',
                    'Information Management',
                    'Cybersecurity Fundamentals',
                    'Mobile Application Development',
                    'IT Project Management',
                    'Capstone Project',
                ],
            ],

            [
                'code' => 'BSHM',
                'name' => 'BS Hospitality Management',
                'department' => 'Hospitality & Tourism',
                'duration' => '4 Years',
                'icon' => 'hotel',
                'description' => 'A program designed to develop skills in hospitality operations, food service, tourism, events, and guest relations.',
                'subjects' => [
                    'Introduction to Hospitality Management',
                    'Food and Beverage Operations',
                    'Front Office Operations',
                    'Housekeeping Operations',
                    'Food Safety and Sanitation',
                    'Hospitality Marketing',
                    'Tourism Management',
                    'Event Management',
                    'Hospitality Accounting',
                    'Customer Service Management',
                    'Entrepreneurship',
                    'Hospitality Internship',
                ],
            ],

            [
                'code' => 'BSOA',
                'name' => 'BS Office Administration',
                'department' => 'Business & Administration',
                'duration' => '4 Years',
                'icon' => 'briefcase-business',
                'description' => 'A program focused on office operations, administrative services, business communication, and workplace technology.',
                'subjects' => [
                    'Office Procedures',
                    'Business Communication',
                    'Records Management',
                    'Office Productivity Tools',
                    'Administrative Office Management',
                    'Business Correspondence',
                    'Human Resource Management',
                    'Business Finance',
                    'Entrepreneurship',
                    'Customer Relations',
                    'Event and Meeting Management',
                    'Office Administration Internship',
                ],
            ],
        ];
    }

    public function index()
    {
        $courses = $this->courses();

        return view('courses.index', compact('courses'));
    }

    public function show($code)
    {
        $courses = collect($this->courses());

        $course = $courses->firstWhere('code', $code);

        abort_if(!$course, 404);

        return view('courses.show', compact('course'));
    }
}