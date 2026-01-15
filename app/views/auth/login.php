<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentHub - Authentication</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }
        
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.7);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .btn {
            position: relative;
            overflow: hidden;
        }
        
        /* Toggle between forms */
        .form-container {
            transition: transform 0.5s ease-in-out;
        }
        
        .hidden-form {
            transform: translateX(100%);
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        
        .active-form {
            transform: translateX(0);
            opacity: 1;
            position: relative;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="gradient-bg py-4 px-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-purple-600 text-xl"></i>
                </div>
                <span class="text-white text-2xl font-bold">Talent<span class="text-yellow-300">Hub</span></span>
            </a>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-white hover:text-yellow-300 transition">Home</a>
                <a href="#" class="text-white hover:text-yellow-300 transition">Find Talent</a>
                <a href="#" class="text-white hover:text-yellow-300 transition">Find Jobs</a>
                <a href="#" class="text-white hover:text-yellow-300 transition">How It Works</a>
            </div>
            
            <!-- Auth Buttons (for logged out state) -->
            <div class="flex space-x-4">
                <button id="showLoginBtn" class="bg-white text-purple-700 font-semibold py-2 px-6 rounded-lg transition duration-300 hover:bg-gray-100">
                    Sign In
                </button>
                <button id="showSignupBtn" class="glass-effect text-white font-semibold py-2 px-6 rounded-lg transition duration-300 hover:bg-white hover:bg-opacity-20">
                    Sign Up
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    
    <!-- Main Authentication Container -->
    <div class="min-h-screen flex items-center justify-center px-4 py-12 gradient-bg">
        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between">
            <!-- Left Side - Branding & Info -->
            <div class="lg:w-1/2 mb-12 lg:mb-0 text-center lg:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 text-shadow leading-tight">
                    Welcome to <span class="text-yellow-300">TalentHub</span>
                </h1>
                
                <p class="text-xl text-gray-100 mb-8 max-w-lg mx-auto lg:mx-0">
                    Join thousands of professionals and companies who are already finding success on our platform.
                </p>
                
                <!-- Features List -->
                <div class="space-y-6 mb-10">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-check-circle text-yellow-300 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-white font-bold">Verified Profiles</h3>
                            <p class="text-gray-200">All users and companies are thoroughly verified</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-shield-alt text-yellow-300 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-white font-bold">Secure & Private</h3>
                            <p class="text-gray-200">Your data is protected with enterprise-grade security</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-bolt text-yellow-300 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-white font-bold">Quick Matching</h3>
                            <p class="text-gray-200">Find opportunities or talent in minutes</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial -->
                <div class="glass-effect p-6 rounded-xl max-w-md">
                    <p class="text-white italic mb-4">"TalentHub helped me find my dream job in just 2 weeks. The platform is intuitive and the matching is spot on!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-purple-700 font-bold mr-3">
                            SJ
                        </div>
                        <div>
                            <p class="text-white font-bold">Sarah Johnson</p>
                            <p class="text-gray-200 text-sm">UX Designer at TechCorp</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Forms Container -->
            <div class="lg:w-1/2 flex justify-center">
                <div class="w-full max-w-md relative overflow-hidden">
                    <!-- Login Form -->
                    <div id="loginForm" class="form-container active-form">
                        <div class="bg-white rounded-2xl shadow-2xl p-8">
                            <div class="text-center mb-8">
                                <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                                <p class="text-gray-600 mt-2">Sign in to your TalentHub account</p>
                            </div>
                            
                            <form id="loginFormElement">
                                <div class="space-y-6">
                                    <div>
                                        <label for="loginEmail" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-envelope text-gray-400"></i>
                                            </div>
                                            <input type="email" id="loginEmail" class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="you@example.com" required>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="loginPassword" class="block text-gray-700 font-medium mb-2">Password</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-lock text-gray-400"></i>
                                            </div>
                                            <input type="password" id="loginPassword" class="form-input w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="••••••••" required>
                                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" id="toggleLoginPassword">
                                                <i class="fas fa-eye text-gray-400"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="rememberMe" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                            <label for="rememberMe" class="ml-2 text-gray-700">Remember me</label>
                                        </div>
                                        <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Forgot password?</a>
                                    </div>
                                    
                                    <button type="submit" class="btn w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 pulse">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                                    </button>
                                </div>
                            </form>
                            
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <p class="text-center text-gray-600">Or sign in with</p>
                                <div class="flex justify-center space-x-4 mt-4">
                                    <button class="w-12 h-12 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-facebook-f text-lg"></i>
                                    </button>
                                    <button class="w-12 h-12 bg-red-100 hover:bg-red-200 text-red-600 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-google text-lg"></i>
                                    </button>
                                    <button class="w-12 h-12 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-linkedin-in text-lg"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mt-8 text-center">
                                <p class="text-gray-600">Don't have an account? 
                                    <button id="switchToSignup" class="text-purple-600 hover:text-purple-800 font-medium">Sign up here</button>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Signup Form -->
                    <div id="signupForm" class="form-container hidden-form">
                        <div class="bg-white rounded-2xl shadow-2xl p-8">
                            <div class="text-center mb-8">
                                <h2 class="text-3xl font-bold text-gray-800">Join TalentHub</h2>
                                <p class="text-gray-600 mt-2">Create your account in less than 2 minutes</p>
                            </div>
                            
                            <form id="signupFormElement">
                                <div class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="firstName" class="block text-gray-700 font-medium mb-2">First Name</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                                <input type="text" id="firstName" class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="John" required>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="lastName" class="block text-gray-700 font-medium mb-2">Last Name</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                                <input type="text" id="lastName" class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="Doe" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="signupEmail" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-envelope text-gray-400"></i>
                                            </div>
                                            <input type="email" id="signupEmail" class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="you@example.com" required>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="userType" class="block text-gray-700 font-medium mb-2">I am a</label>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <input type="radio" id="jobSeeker" name="userType" value="jobSeeker" class="hidden peer" checked>
                                                <label for="jobSeeker" class="flex items-center justify-center p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-purple-500 peer-checked:bg-purple-50 transition">
                                                    <i class="fas fa-user-tie text-gray-600 mr-2"></i>
                                                    <span>Job Seeker</span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="employer" name="userType" value="employer" class="hidden peer">
                                                <label for="employer" class="flex items-center justify-center p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-purple-500 peer-checked:bg-purple-50 transition">
                                                    <i class="fas fa-building text-gray-600 mr-2"></i>
                                                    <span>Employer</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="signupPassword" class="block text-gray-700 font-medium mb-2">Password</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-lock text-gray-400"></i>
                                            </div>
                                            <input type="password" id="signupPassword" class="form-input w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="••••••••" required>
                                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" id="toggleSignupPassword">
                                                <i class="fas fa-eye text-gray-400"></i>
                                            </button>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-2">Must be at least 8 characters with a number and uppercase letter</p>
                                    </div>
                                    
                                    <div>
                                        <label for="confirmPassword" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-lock text-gray-400"></i>
                                            </div>
                                            <input type="password" id="confirmPassword" class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition" placeholder="••••••••" required>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <input type="checkbox" id="terms" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded mt-1" required>
                                        <label for="terms" class="ml-2 text-gray-700">
                                            I agree to the 
                                            <a href="#" class="text-purple-600 hover:text-purple-800">Terms of Service</a> 
                                            and 
                                            <a href="#" class="text-purple-600 hover:text-purple-800">Privacy Policy</a>
                                        </label>
                                    </div>
                                    
                                    <button type="submit" class="btn w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 pulse">
                                        <i class="fas fa-user-plus mr-2"></i> Create Account
                                    </button>
                                </div>
                            </form>
                            
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <p class="text-center text-gray-600">Or sign up with</p>
                                <div class="flex justify-center space-x-4 mt-4">
                                    <button class="w-12 h-12 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-facebook-f text-lg"></i>
                                    </button>
                                    <button class="w-12 h-12 bg-red-100 hover:bg-red-200 text-red-600 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-google text-lg"></i>
                                    </button>
                                    <button class="w-12 h-12 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-linkedin-in text-lg"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mt-8 text-center">
                                <p class="text-gray-600">Already have an account? 
                                    <button id="switchToLogin" class="text-purple-600 hover:text-purple-800 font-medium">Sign in here</button>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Success Message (hidden by default) -->
                    <div id="successMessage" class="hidden">
                        <div class="bg-white rounded-2xl shadow-2xl p-8 text-center">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-check text-green-600 text-3xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">Account Created!</h2>
                            <p class="text-gray-600 mb-8">Your TalentHub account has been successfully created. Please check your email to verify your account.</p>
                            <button id="backToLogin" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                                Go to Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logged In Dashboard (hidden by default) -->
    <div id="loggedInDashboard" class="hidden min-h-screen bg-gray-50">
        <!-- Dashboard Navigation -->
        <nav class="gradient-bg py-4 px-6 shadow-lg">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                    <span class="text-white text-2xl font-bold">Talent<span class="text-yellow-300">Hub</span></span>
                </a>
                
                <!-- User Menu -->
                <div class="flex items-center space-x-6">
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="text-white text-right">
                            <p class="font-bold">John Doe</p>
                            <p class="text-sm text-gray-200">Frontend Developer</p>
                        </div>
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-purple-700 font-bold">
                            JD
                        </div>
                    </div>
                    
                    <!-- Logout Button -->
                    <button id="logoutBtn" class="bg-white text-purple-700 font-semibold py-2 px-6 rounded-lg transition duration-300 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </div>
            </div>
        </nav>
        
        <!-- Dashboard Content -->
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center mb-8">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mr-6">
                        <i class="fas fa-user-tie text-purple-600 text-3xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Welcome back, John!</h1>
                        <p class="text-gray-600">Here's what's happening with your TalentHub account today.</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-purple-50 p-6 rounded-lg border border-purple-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 text-sm">Profile Views</p>
                                <p class="text-2xl font-bold text-gray-800">1,248</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-eye text-purple-600"></i>
                            </div>
                        </div>
                        <p class="text-green-600 text-sm mt-2"><i class="fas fa-arrow-up mr-1"></i> 12% from last week</p>
                    </div>
                    
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 text-sm">Job Matches</p>
                                <p class="text-2xl font-bold text-gray-800">24</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-briefcase text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-green-600 text-sm mt-2"><i class="fas fa-arrow-up mr-1"></i> 3 new today</p>
                    </div>
                    
                    <div class="bg-green-50 p-6 rounded-lg border border-green-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-600 text-sm">Applications</p>
                                <p class="text-2xl font-bold text-gray-800">8</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-paper-plane text-green-600"></i>
                            </div>
                        </div>
                        <p class="text-green-600 text-sm mt-2">2 pending responses</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Activity</h2>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-bell text-purple-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">New job match: Senior UX Designer at TechCorp</p>
                                <p class="text-gray-500 text-sm">2 hours ago</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Your application was viewed by DesignStudio Inc.</p>
                                <p class="text-gray-500 text-sm">1 day ago</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Profile completeness increased to 92%</p>
                                <p class="text-gray-500 text-sm">2 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');
            const successMessage = document.getElementById('successMessage');
            const loggedInDashboard = document.getElementById('loggedInDashboard');
            const authContainer = document.querySelector('.gradient-bg');
            
            // Buttons
            const showLoginBtn = document.getElementById('showLoginBtn');
            const showSignupBtn = document.getElementById('showSignupBtn');
            const switchToSignupBtn = document.getElementById('switchToSignup');
            const switchToLoginBtn = document.getElementById('switchToLogin');
            const backToLoginBtn = document.getElementById('backToLogin');
            const logoutBtn = document.getElementById('logoutBtn');
            
            // Form elements
            const loginFormElement = document.getElementById('loginFormElement');
            const signupFormElement = document.getElementById('signupFormElement');
            const toggleLoginPassword = document.getElementById('toggleLoginPassword');
            const toggleSignupPassword = document.getElementById('toggleSignupPassword');
            
            // Initially show login form
            showLoginForm();
            
            // Event Listeners
            showLoginBtn.addEventListener('click', showLoginForm);
            showSignupBtn.addEventListener('click', showSignupForm);
            switchToSignupBtn.addEventListener('click', showSignupForm);
            switchToLoginBtn.addEventListener('click', showLoginForm);
            backToLoginBtn.addEventListener('click', showLoginForm);
            logoutBtn.addEventListener('click', logout);
            
            // Toggle password visibility
            toggleLoginPassword.addEventListener('click', function() {
                togglePasswordVisibility('loginPassword', this);
            });
            
            toggleSignupPassword.addEventListener('click', function() {
                togglePasswordVisibility('signupPassword', this);
            });
            
            // Form submissions
            loginFormElement.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('loginEmail').value;
                const password = document.getElementById('loginPassword').value;
                
                // Simple validation
                if (email && password) {
                    // In a real app, you would send this to your backend
                    console.log('Login attempt with:', { email, password });
                    
                    // For demo purposes, simulate successful login
                    simulateLogin();
                } else {
                    alert('Please fill in all fields');
                }
            });
            
            signupFormElement.addEventListener('submit', function(e) {
                e.preventDefault();
                const firstName = document.getElementById('firstName').value;
                const lastName = document.getElementById('lastName').value;
                const email = document.getElementById('signupEmail').value;
                const password = document.getElementById('signupPassword').value;
                const confirmPassword = document.getElementById('confirmPassword').value;
                const userType = document.querySelector('input[name="userType"]:checked').value;
                const terms = document.getElementById('terms').checked;
                
                // Simple validation
                if (!firstName || !lastName || !email || !password || !confirmPassword) {
                    alert('Please fill in all required fields');
                    return;
                }
                
                if (password !== confirmPassword) {
                    alert('Passwords do not match');
                    return;
                }
                
                if (!terms) {
                    alert('You must agree to the terms and conditions');
                    return;
                }
                
                // In a real app, you would send this to your backend
                console.log('Signup attempt with:', { firstName, lastName, email, password, userType });
                
                // Show success message
                showSuccessMessage();
            });
            
            // Function to show login form
            function showLoginForm() {
                loginForm.classList.remove('hidden-form');
                loginForm.classList.add('active-form');
                signupForm.classList.remove('active-form');
                signupForm.classList.add('hidden-form');
                successMessage.classList.add('hidden');
                loggedInDashboard.classList.add('hidden');
                authContainer.classList.remove('hidden');
            }
            
            // Function to show signup form
            function showSignupForm() {
                signupForm.classList.remove('hidden-form');
                signupForm.classList.add('active-form');
                loginForm.classList.remove('active-form');
                loginForm.classList.add('hidden-form');
                successMessage.classList.add('hidden');
            }
            
            // Function to show success message
            function showSuccessMessage() {
                successMessage.classList.remove('hidden');
                loginForm.classList.add('hidden-form');
                signupForm.classList.add('hidden-form');
            }
            
            // Function to simulate login
            function simulateLogin() {
                // Hide auth forms, show dashboard
                authContainer.classList.add('hidden');
                loggedInDashboard.classList.remove('hidden');
            }
            
            // Function to logout
            function logout() {
                // Show auth forms, hide dashboard
                authContainer.classList.remove('hidden');
                loggedInDashboard.classList.add('hidden');
                showLoginForm();
                
                // Reset forms
                loginFormElement.reset();
                signupFormElement.reset();
            }
            
            // Function to toggle password visibility
            function togglePasswordVisibility(passwordId, button) {
                const passwordInput = document.getElementById(passwordId);
                const icon = button.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }
            
            // Add ripple effect to buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    // Create ripple element
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size/2;
                    const y = e.clientY - rect.top - size/2;
                    
                    // Style ripple
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    // Remove existing ripples
                    const existingRipple = this.querySelector('.ripple');
                    if (existingRipple) {
                        existingRipple.remove();
                    }
                    
                    // Add ripple to button
                    this.appendChild(ripple);
                    
                    // Remove ripple after animation
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
</html>
