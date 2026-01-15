<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentHub Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .sidebar.collapsed {
            width: 70px;
        }
        
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        
        .main-content {
            transition: all 0.3s ease;
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
        
        .notification-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background-color: #f56565;
            border-radius: 50%;
        }
        
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background-color: #e2e8f0;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.5s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Dashboard Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar bg-white w-64 shadow-lg flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <span class="text-gray-800 text-xl font-bold">Talent<span class="text-purple-600">Hub</span></span>
                </div>
            </div>
            
            <!-- User Profile -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-700 font-bold">
                            JD
                        </div>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">John Doe</p>
                        <p class="text-sm text-gray-500">Frontend Developer</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <div class="flex-1 p-4 overflow-y-auto">
                <nav class="space-y-1">
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-purple-50 text-purple-700">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        <span class="sidebar-text font-medium">Dashboard</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-briefcase w-5"></i>
                        <span class="sidebar-text">Job Matches</span>
                        <span class="ml-auto bg-purple-100 text-purple-700 text-xs font-bold px-2 py-1 rounded-full sidebar-text">24</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user-tie w-5"></i>
                        <span class="sidebar-text">My Profile</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-file-alt w-5"></i>
                        <span class="sidebar-text">Applications</span>
                        <span class="ml-auto bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-full sidebar-text">8</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-building w-5"></i>
                        <span class="sidebar-text">Companies</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-chart-line w-5"></i>
                        <span class="sidebar-text">Analytics</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-cog w-5"></i>
                        <span class="sidebar-text">Settings</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-question-circle w-5"></i>
                        <span class="sidebar-text">Help & Support</span>
                    </a>
                </nav>
                
                <!-- Upgrade Banner -->
                <div class="mt-8 p-4 gradient-bg rounded-lg">
                    <h3 class="text-white font-bold mb-2 sidebar-text">Upgrade to Pro</h3>
                    <p class="text-white text-sm mb-3 sidebar-text">Get access to premium features</p>
                    <button class="btn w-full bg-white text-purple-700 font-semibold py-2 rounded-lg text-sm sidebar-text">
                        Upgrade Now
                    </button>
                </div>
            </div>
            
            <!-- Logout Button -->
            <div class="p-4 border-t border-gray-200">
                <button id="logoutBtn" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 w-full">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span class="sidebar-text">Logout</span>
                </button>
            </div>
            
            <!-- Collapse Button -->
            <button id="sidebarToggle" class="absolute -right-3 top-20 bg-white border border-gray-300 rounded-full w-6 h-6 flex items-center justify-center shadow-md">
                <i class="fas fa-chevron-left text-gray-600 text-xs"></i>
            </button>
        </div>
        
        <!-- Main Content -->
        <div id="mainContent" class="main-content flex-1 overflow-y-auto">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm px-6 py-4">
                <div class="flex justify-between items-center">
                    <!-- Search Bar -->
                    <div class="flex-1 max-w-2xl">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500" placeholder="Search jobs, candidates, companies...">
                        </div>
                    </div>
                    
                    <!-- Right Side Actions -->
                    <div class="flex items-center space-x-6">
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="relative p-2 text-gray-600 hover:text-purple-600">
                                <i class="fas fa-bell text-xl"></i>
                                <div class="notification-dot"></div>
                            </button>
                        </div>
                        
                        <!-- Messages -->
                        <div class="relative">
                            <button class="relative p-2 text-gray-600 hover:text-purple-600">
                                <i class="fas fa-envelope text-xl"></i>
                                <div class="notification-dot"></div>
                            </button>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="relative">
                            <button id="quickActionsBtn" class="flex items-center space-x-2 p-2 text-gray-600 hover:text-purple-600">
                                <i class="fas fa-plus-circle text-xl"></i>
                                <span class="hidden md:inline">Quick Actions</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome back, John!</h1>
                    <p class="text-gray-600">Here's what's happening with your TalentHub account today.</p>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm">Profile Views</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">1,248</p>
                                <p class="text-green-600 text-sm mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% from last week
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-eye text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm">Job Matches</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">24</p>
                                <p class="text-green-600 text-sm mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i> 3 new today
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm">Applications</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">8</p>
                                <p class="text-yellow-600 text-sm mt-2">2 pending responses</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-paper-plane text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm">Profile Strength</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">92%</p>
                                <div class="mt-3">
                                    <div class="progress-bar">
                                        <div class="progress-fill bg-purple-600" style="width: 92%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-line text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Charts & Job Matches Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Chart Container -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-md p-6 h-full">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-bold text-gray-800">Profile Performance</h2>
                                <div class="flex space-x-2">
                                    <button class="text-sm px-3 py-1 rounded-lg bg-purple-100 text-purple-700">Weekly</button>
                                    <button class="text-sm px-3 py-1 rounded-lg text-gray-600 hover:bg-gray-100">Monthly</button>
                                    <button class="text-sm px-3 py-1 rounded-lg text-gray-600 hover:bg-gray-100">Yearly</button>
                                </div>
                            </div>
                            <div class="h-80">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Job Matches -->
                    <div class="bg-white rounded-xl shadow-md p-6 h-full">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-800">Recent Job Matches</h2>
                            <a href="#" class="text-purple-600 hover:text-purple-800 text-sm font-medium">View All</a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-gray-800">Senior UX Designer</h3>
                                        <p class="text-gray-600 text-sm">TechCorp • San Francisco</p>
                                    </div>
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded">New</span>
                                </div>
                                <div class="flex items-center mt-3">
                                    <div class="flex items-center text-yellow-500 mr-4">
                                        <i class="fas fa-star"></i>
                                        <span class="ml-1 text-sm text-gray-700">4.8</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <i class="fas fa-clock"></i>
                                        <span class="ml-1 text-sm">Full-time</span>
                                    </div>
                                </div>
                                <button class="btn w-full mt-4 bg-purple-50 text-purple-700 hover:bg-purple-100 font-medium py-2 rounded-lg transition">
                                    View Details
                                </button>
                            </div>
                            
                            <div class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-gray-800">Frontend Developer</h3>
                                        <p class="text-gray-600 text-sm">DesignStudio • Remote</p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <div class="flex items-center text-yellow-500 mr-4">
                                        <i class="fas fa-star"></i>
                                        <span class="ml-1 text-sm text-gray-700">4.9</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <i class="fas fa-clock"></i>
                                        <span class="ml-1 text-sm">Contract</span>
                                    </div>
                                </div>
                                <button class="btn w-full mt-4 bg-purple-50 text-purple-700 hover:bg-purple-100 font-medium py-2 rounded-lg transition">
                                    View Details
                                </button>
                            </div>
                            
                            <div class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-gray-800">Product Manager</h3>
                                        <p class="text-gray-600 text-sm">InnovateLabs • New York</p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <div class="flex items-center text-yellow-500 mr-4">
                                        <i class="fas fa-star"></i>
                                        <span class="ml-1 text-sm text-gray-700">4.7</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <i class="fas fa-clock"></i>
                                        <span class="ml-1 text-sm">Full-time</span>
                                    </div>
                                </div>
                                <button class="btn w-full mt-4 bg-purple-50 text-purple-700 hover:bg-purple-100 font-medium py-2 rounded-lg transition">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Applications & Recent Activity Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Applications -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-800">Recent Applications</h2>
                            <a href="#" class="text-purple-600 hover:text-purple-800 text-sm font-medium">View All</a>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 text-gray-600 font-medium">Company</th>
                                        <th class="text-left py-3 text-gray-600 font-medium">Position</th>
                                        <th class="text-left py-3 text-gray-600 font-medium">Status</th>
                                        <th class="text-left py-3 text-gray-600 font-medium">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-blue-100 rounded flex items-center justify-center text-blue-700 font-bold mr-3">
                                                    T
                                                </div>
                                                <span>TechCorp</span>
                                            </div>
                                        </td>
                                        <td class="py-4">Senior UX Designer</td>
                                        <td class="py-4">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded">In Review</span>
                                        </td>
                                        <td class="py-4 text-gray-500">2 days ago</td>
                                    </tr>
                                    
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-green-100 rounded flex items-center justify-center text-green-700 font-bold mr-3">
                                                    D
                                                </div>
                                                <span>DesignStudio</span>
                                            </div>
                                        </td>
                                        <td class="py-4">Frontend Developer</td>
                                        <td class="py-4">
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded">Interview</span>
                                        </td>
                                        <td class="py-4 text-gray-500">5 days ago</td>
                                    </tr>
                                    
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-purple-100 rounded flex items-center justify-center text-purple-700 font-bold mr-3">
                                                    I
                                                </div>
                                                <span>InnovateLabs</span>
                                            </div>
                                        </td>
                                        <td class="py-4">Product Manager</td>
                                        <td class="py-4">
                                            <span class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded">Rejected</span>
                                        </td>
                                        <td class="py-4 text-gray-500">1 week ago</td>
                                    </tr>
                                    
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-yellow-100 rounded flex items-center justify-center text-yellow-700 font-bold mr-3">
                                                    S
                                                </div>
                                                <span>StartUpX</span>
                                            </div>
                                        </td>
                                        <td class="py-4">Full Stack Dev</td>
                                        <td class="py-4">
                                            <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded">Accepted</span>
                                        </td>
                                        <td class="py-4 text-gray-500">2 weeks ago</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Recent Activity & To-Dos -->
                    <div class="space-y-6">
                        <!-- Recent Activity -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-bold text-gray-800">Recent Activity</h2>
                                <a href="#" class="text-purple-600 hover:text-purple-800 text-sm font-medium">View All</a>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-bell text-purple-600"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">New job match: Senior UX Designer at TechCorp</p>
                                        <p class="text-gray-500 text-sm">2 hours ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-envelope text-blue-600"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Your application was viewed by DesignStudio Inc.</p>
                                        <p class="text-gray-500 text-sm">1 day ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check-circle text-green-600"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Profile completeness increased to 92%</p>
                                        <p class="text-gray-500 text-sm">2 days ago</p>
                                    </div>
                                </div>
                                
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user-plus text-yellow-600"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">You connected with Sarah Johnson (UX Lead)</p>
                                        <p class="text-gray-500 text-sm">3 days ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick To-Dos -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-bold text-gray-800">Quick To-Dos</h2>
                                <span class="text-gray-500 text-sm">2 remaining</span>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="todo1" class="h-5 w-5 text-purple-600 rounded">
                                    <label for="todo1" class="ml-3 text-gray-700">Update your portfolio with new projects</label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input type="checkbox" id="todo2" class="h-5 w-5 text-purple-600 rounded">
                                    <label for="todo2" class="ml-3 text-gray-700">Complete skill assessment tests</label>
                                </div>
                                
                                <div class="flex items-center opacity-50">
                                    <input type="checkbox" id="todo3" class="h-5 w-5 text-purple-600 rounded" checked>
                                    <label for="todo3" class="ml-3 text-gray-700 line-through">Add references to your profile</label>
                                </div>
                                
                                <div class="flex items-center opacity-50">
                                    <input type="checkbox" id="todo4" class="h-5 w-5 text-purple-600 rounded" checked>
                                    <label for="todo4" class="ml-3 text-gray-700 line-through">Verify your email address</label>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <div class="flex">
                                    <input type="text" class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:border-purple-500" placeholder="Add new to-do...">
                                    <button class="bg-purple-600 text-white px-4 py-2 rounded-r-lg hover:bg-purple-700 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Upgrade Banner -->
                <div class="mt-8 gradient-bg rounded-xl shadow-md p-8">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="mb-6 md:mb-0">
                            <h2 class="text-2xl font-bold text-white mb-2">Unlock Premium Features</h2>
                            <p class="text-white text-opacity-90">Get 5x more profile views, priority support, and advanced analytics.</p>
                        </div>
                        <button class="btn bg-white text-purple-700 hover:bg-gray-100 font-semibold py-3 px-8 rounded-lg transition pulse">
                            Upgrade to Pro <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </main>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-6 py-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-500 text-sm mb-4 md:mb-0">
                        © 2023 TalentHub. All rights reserved.
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-500 hover:text-purple-600 text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-500 hover:text-purple-600 text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-500 hover:text-purple-600 text-sm">Help Center</a>
                        <a href="#" class="text-gray-500 hover:text-purple-600 text-sm">Contact Us</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <!-- Quick Actions Dropdown (Hidden by default) -->
    <div id="quickActionsDropdown" class="hidden absolute right-6 top-20 bg-white rounded-xl shadow-lg border border-gray-200 w-64 z-10">
        <div class="p-4">
            <h3 class="font-bold text-gray-800 mb-4">Quick Actions</h3>
            <div class="space-y-2">
                <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-plus-circle text-purple-600 mr-3"></i>
                    <span>Post a New Job</span>
                </a>
                <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-search text-blue-600 mr-3"></i>
                    <span>Search Candidates</span>
                </a>
                <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-file-export text-green-600 mr-3"></i>
                    <span>Export Resume</span>
                </a>
                <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-cog text-gray-600 mr-3"></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const logoutBtn = document.getElementById('logoutBtn');
            const quickActionsBtn = document.getElementById('quickActionsBtn');
            const quickActionsDropdown = document.getElementById('quickActionsDropdown');
            
            // Toggle sidebar
            let sidebarCollapsed = false;
            
            sidebarToggle.addEventListener('click', function() {
                sidebarCollapsed = !sidebarCollapsed;
                
                if (sidebarCollapsed) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('md:ml-16');
                    sidebarToggle.querySelector('i').classList.remove('fa-chevron-left');
                    sidebarToggle.querySelector('i').classList.add('fa-chevron-right');
                } else {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('md:ml-16');
                    sidebarToggle.querySelector('i').classList.remove('fa-chevron-right');
                    sidebarToggle.querySelector('i').classList.add('fa-chevron-left');
                }
            });
            
            // Toggle quick actions dropdown
            quickActionsBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                quickActionsDropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!quickActionsDropdown.contains(e.target) && !quickActionsBtn.contains(e.target)) {
                    quickActionsDropdown.classList.add('hidden');
                }
            });
            
            // Logout button
            logoutBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    // In a real app, this would redirect to logout endpoint
                    alert('You have been logged out. Redirecting to login page...');
                    // window.location.href = '/login.html';
                }
            });
            
            // Add ripple effect to buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    createRippleEffect(this, e);
                });
            });
            
            // To-do list functionality
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const label = this.nextElementSibling;
                    if (this.checked) {
                        label.classList.add('line-through');
                        this.parentElement.classList.add('opacity-50');
                    } else {
                        label.classList.remove('line-through');
                        this.parentElement.classList.remove('opacity-50');
                    }
                });
            });
            
            // Initialize chart
            const ctx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Profile Views',
                        data: [650, 810, 920, 1050, 1248, 1100, 1350],
                        borderColor: '#764ba2',
                        backgroundColor: 'rgba(118, 75, 162, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }, {
                        label: 'Job Matches',
                        data: [12, 15, 18, 20, 24, 22, 28],
                        borderColor: '#667eea',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Create ripple effect function
            function createRippleEffect(button, event) {
                const ripple = document.createElement('span');
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = event.clientX - rect.left - size/2;
                const y = event.clientY - rect.top - size/2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                const existingRipple = button.querySelector('.ripple');
                if (existingRipple) {
                    existingRipple.remove();
                }
                
                button.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            }
            
            // Simulate some interactive functionality
            console.log('TalentHub Dashboard loaded successfully!');
            
            // Auto-update stats every 10 seconds (demo)
            setInterval(() => {
                // This is just a demo - in a real app, you would fetch from an API
                const profileViews = document.querySelector('.text-2xl.font-bold.text-gray-800');
                if (profileViews && Math.random() > 0.7) {
                    const current = parseInt(profileViews.textContent.replace(/,/g, ''));
                    const newValue = current + Math.floor(Math.random() * 10);
                    profileViews.textContent = newValue.toLocaleString();
                }
            }, 10000);
        });
    </script>
</body>
</html>
