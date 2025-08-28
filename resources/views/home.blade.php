@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-primary-50 via-white to-accent-50 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-white bg-opacity-90"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
            <div class="text-center animate-fade-in">
                <h1 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-6xl md:text-7xl">
                    <span class="block">Your Voice</span>
                    <span class="block text-primary-600">Matters Here</span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600 leading-relaxed">
                    Submit your complaints easily and track their progress. We're committed to resolving your concerns quickly and efficiently with our modern, transparent platform.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center animate-slide-up">
                    <a href="{{ route('complaints.create') }}" class="btn-primary text-lg px-8 py-4">
                        Submit Complaint
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="btn-secondary text-lg px-8 py-4">
                            Login to Track
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 sm:text-5xl">
                    Our Track Record
                </h2>
                <p class="mt-4 max-w-3xl mx-auto text-xl text-gray-600 leading-relaxed">
                    See how we've been helping resolve complaints with transparency and efficiency
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card card-hover p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 rounded-2xl mb-6">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-primary-600 mb-2">{{ $totalComplaints }}</div>
                    <div class="text-lg font-medium text-gray-900 mb-2">Total Complaints</div>
                    <p class="text-gray-600">Submitted through our platform</p>
                </div>
                
                <div class="card card-hover p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-accent-100 rounded-2xl mb-6">
                        <svg class="w-8 h-8 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-accent-600 mb-2">{{ $resolvedComplaints }}</div>
                    <div class="text-lg font-medium text-gray-900 mb-2">Successfully Resolved</div>
                    <p class="text-gray-600">With satisfactory outcomes</p>
                </div>
                
                <div class="card card-hover p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 rounded-2xl mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-orange-600 mb-2">{{ $pendingComplaints }}</div>
                    <div class="text-lg font-medium text-gray-900 mb-2">Under Review</div>
                    <p class="text-gray-600">Being actively processed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-sm font-semibold text-primary-600 tracking-wide uppercase mb-3">Features</h2>
                <h3 class="text-4xl font-bold text-gray-900 sm:text-5xl mb-4">
                    Why Choose Our Platform?
                </h3>
                <p class="max-w-3xl mx-auto text-xl text-gray-600 leading-relaxed">
                    We provide a comprehensive solution for managing and resolving complaints efficiently with modern tools and transparent processes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card card-hover p-8">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-14 h-14 bg-primary-100 rounded-2xl">
                                <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-3">Easy Submission</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Submit complaints quickly with our intuitive form. Upload documents and categorize your issues effortlessly with our streamlined process.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-hover p-8">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-14 h-14 bg-accent-100 rounded-2xl">
                                <svg class="w-7 h-7 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-3">Real-time Tracking</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Track the status of your complaints in real-time. Get instant updates when your complaint moves through different resolution stages.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-hover p-8">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-14 h-14 bg-purple-100 rounded-2xl">
                                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-3">User Recognition</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Earn titles based on your participation and engagement. From Newcomer to Veteran Complainer, your voice grows stronger with experience.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-hover p-8">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-14 h-14 bg-blue-100 rounded-2xl">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-3">Smart Notifications</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Stay informed with intelligent email notifications when your complaint status changes or when important updates are made to your case.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative bg-gradient-to-r from-primary-600 to-primary-700 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-primary-600 mix-blend-multiply"></div>
        </div>
        <div class="relative max-w-4xl mx-auto text-center py-20 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white sm:text-5xl mb-6">
                Ready to submit your complaint?
            </h2>
            <p class="text-xl text-primary-100 mb-8 leading-relaxed max-w-2xl mx-auto">
                Join thousands of users who have successfully resolved their concerns through our transparent and efficient platform.
            </p>
            <a href="{{ route('complaints.create') }}" 
               class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium rounded-xl text-primary-600 bg-white hover:bg-gray-50 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                Get Started Now
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
@endsection