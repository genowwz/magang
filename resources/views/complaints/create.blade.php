@extends('layouts.app')

@section('title', 'Submit Complaint')

@section('content')
    <div class="min-h-screen bg-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 animate-fade-in">
                <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl mb-4">Submit a Complaint</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Please provide detailed information about your complaint. We're here to help resolve your concerns quickly and efficiently.
                </p>
            </div>
            
            <div class="card p-8 lg:p-12 animate-slide-up">
                <div class="mb-8">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary-100 rounded-xl">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-semibold text-gray-900">Complaint Details</h2>
                            <p class="text-gray-600">All fields marked with * are required.</p>
                        </div>
                    </div>
                </div>

                    <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        @guest
                            <!-- Guest Information -->
                            <div class="bg-gradient-to-r from-primary-50 to-accent-50 border border-primary-200 rounded-2xl p-6 mb-8">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center w-10 h-10 bg-primary-100 rounded-xl">
                                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Your Contact Information</h3>
                                        <p class="text-gray-600 mb-6">Please provide your contact details so we can reach you about your complaint.</p>
                                        
                                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                            <div>
                                                <label for="guest_name" class="form-label">Full Name *</label>
                                                <input type="text" 
                                                       name="guest_name" 
                                                       id="guest_name" 
                                                       value="{{ old('guest_name') }}"
                                                       required
                                                       placeholder="Enter your full name"
                                                       class="form-input @error('guest_name') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror">
                                                @error('guest_name')
                                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                        </svg>
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="guest_email" class="form-label">Email Address *</label>
                                                <input type="email" 
                                                       name="guest_email" 
                                                       id="guest_email" 
                                                       value="{{ old('guest_email') }}"
                                                       required
                                                       placeholder="Enter your email address"
                                                       class="form-input @error('guest_email') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror">
                                                @error('guest_email')
                                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                        </svg>
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4 p-4 bg-white rounded-xl border border-primary-200">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-accent-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <p class="text-sm text-gray-700">
                                                    <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-700 transition-colors">Create an account</a> to track your complaints and earn community titles!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest

                        <!-- Complaint Details -->
                        <div class="space-y-8">
                            <div>
                                <label for="title" class="form-label">Complaint Title *</label>
                                <input type="text" 
                                       name="title" 
                                       id="title" 
                                       value="{{ old('title') }}"
                                       required
                                       placeholder="Brief description of your complaint"
                                       class="form-input @error('title') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror">
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="category" class="form-label">Category *</label>
                                    <select name="category" 
                                            id="category" 
                                            required
                                            class="form-input @error('category') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror">
                                        <option value="">Select a category</option>
                                        <option value="Service" {{ old('category') === 'Service' ? 'selected' : '' }}>Service</option>
                                        <option value="Product" {{ old('category') === 'Product' ? 'selected' : '' }}>Product</option>
                                        <option value="Delivery" {{ old('category') === 'Delivery' ? 'selected' : '' }}>Delivery</option>
                                        <option value="Billing" {{ old('category') === 'Billing' ? 'selected' : '' }}>Billing</option>
                                        <option value="Support" {{ old('category') === 'Support' ? 'selected' : '' }}>Support</option>
                                        <option value="Other" {{ old('category') === 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('category')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="priority" class="form-label">Priority *</label>
                                    <select name="priority" 
                                            id="priority" 
                                            required
                                            class="form-input @error('priority') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror">
                                        <option value="">Select priority</option>
                                        <option value="Low" {{ old('priority') === 'Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ old('priority') === 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ old('priority') === 'High' ? 'selected' : '' }}>High</option>
                                </select>
                                @error('priority')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="form-label">Detailed Description *</label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="6" 
                                      required
                                      placeholder="Please provide a detailed description of your complaint, including any relevant details, dates, and outcomes you're seeking."
                                      class="form-input resize-none @error('description') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- File Attachments -->
                        <div>
                            <label for="attachments" class="form-label">Attachments (Optional)</label>
                            <div class="mt-2 flex justify-center px-8 pt-8 pb-8 border-2 border-gray-200 border-dashed rounded-2xl hover:border-primary-300 hover:bg-primary-25 transition-all duration-300">
                                <div class="space-y-3 text-center">
                                    <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-2xl mx-auto">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                    <div class="flex justify-center text-base text-gray-600">
                                        <label for="attachments" class="relative cursor-pointer bg-white rounded-xl px-4 py-2 font-medium text-primary-600 hover:text-primary-700 hover:bg-primary-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500 transition-all duration-300 border border-primary-200">
                                            <span>Choose files</span>
                                            <input id="attachments" 
                                                   name="attachments[]" 
                                                   type="file" 
                                                   multiple 
                                                   accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                                   class="sr-only">
                                        </label>
                                        <p class="pl-2">or drag and drop</p>
                                    </div>
                                    <p class="text-sm text-gray-500">
                                        PNG, JPG, PDF, DOC up to 10MB each
                                    </p>
                                </div>
                            </div>
                            @error('attachments.*')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            
                            <!-- File preview area -->
                            <div id="file-preview" class="mt-6 hidden">
                                <h4 class="form-label mb-3">Selected files:</h4>
                                <div id="file-list" class="space-y-3"></div>
                            </div>
                        </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-8 mt-8 border-t border-gray-200">
                            <div class="text-sm text-gray-500 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Required fields
                            </div>
                            <div class="flex space-x-4">
                                <a href="{{ route('home') }}" class="btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn-primary">
                                    Submit Complaint
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // File upload preview with enhanced design
        document.getElementById('attachments').addEventListener('change', function(e) {
            const filePreview = document.getElementById('file-preview');
            const fileList = document.getElementById('file-list');
            const files = e.target.files;

            if (files.length > 0) {
                filePreview.classList.remove('hidden');
                fileList.innerHTML = '';

                Array.from(files).forEach((file, index) => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200 hover:border-primary-200 transition-colors duration-200';
                    
                    const fileExtension = file.name.split('.').pop().toLowerCase();
                    const fileTypeIcon = getFileTypeIcon(fileExtension);
                    
                    fileItem.innerHTML = `
                        <div class="flex items-center">
                            ${fileTypeIcon}
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">${file.name}</div>
                                <div class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                            </div>
                        </div>
                        <div class="flex items-center text-accent-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    `;
                    fileList.appendChild(fileItem);
                });
            } else {
                filePreview.classList.add('hidden');
            }
        });

        function getFileTypeIcon(extension) {
            const iconClass = "w-8 h-8 text-gray-400";
            
            switch(extension) {
                case 'pdf':
                    return `<svg class="${iconClass} text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                    </svg>`;
                case 'jpg':
                case 'jpeg':
                case 'png':
                    return `<svg class="${iconClass} text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>`;
                case 'doc':
                case 'docx':
                    return `<svg class="${iconClass} text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                    </svg>`;
                default:
                    return `<svg class="${iconClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>`;
            }
        }

        // Auto-select Medium priority if none selected
        document.addEventListener('DOMContentLoaded', function() {
            const prioritySelect = document.getElementById('priority');
            if (prioritySelect.value === '') {
                prioritySelect.value = 'Medium';
            }
        });

        // Add smooth transitions on form focus
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.classList.add('animate-slide-up');
            });
        });
    </script>
@endsection