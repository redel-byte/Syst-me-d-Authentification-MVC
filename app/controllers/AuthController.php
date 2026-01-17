<?php
// AuthController.php
// Student exercise: implement all auth actions listed below.


class AuthController extends Controller
{
    /**
     * Constructor
     * - Initialize User model
     * - Ensure session is started
     */
    public function __construct()
    {
        // TODO: instantiate user model
        // $this->userModel = new User();
        // TODO: call session_start() if sessions are not already started
        exit('TODO: Implement AuthController::__construct() to initialize model and session');
    }

    /**
     * Show login form
     * Student tasks:
     *  - Redirect to `/` if already logged in
     *  - Render view `auth/login` and pass `error` and `email` from session flash data
     */
    public function loginForm()
    {
        // IMPLEMENTATION REMOVED FOR WORKSHOP
        exit('TODO: Implement AuthController::loginForm() to render the login view');
    }

    /**
     * Process login (POST)
     * Student tasks (step-by-step):
     *  1. Verify request method is POST
     *  2. Validate `email` and `password` inputs
     *  3. Call `User::verify($email, $password)` to check credentials
     *  4. On success: set `$_SESSION["user_id"]` and `$_SESSION["email"]`, redirect to `/`
     *  5. On failure: set `$_SESSION['error']` and `$_SESSION['old_email']`, redirect back to `/login`
     */
    public function login()
    {
        // IMPLEMENTATION REMOVED FOR WORKSHOP
        exit('TODO: Implement AuthController::login() to handle login submission');
    }

    /**
     * Show registration form
     * Student tasks:
     *  - Redirect to `/` if already logged in
     *  - Render view `register` and pass flash data
     */
    public function registerForm()
    {
        // IMPLEMENTATION REMOVED FOR WORKSHOP
        exit('TODO: Implement AuthController::registerForm() to render the registration view');
    }

    /**
     * Process registration (POST)
     * Student tasks (step-by-step):
     *  1. Verify request method is POST
     *  2. Validate inputs (email format, password length >= 6, confirm match)
     *  3. Check `User::emailExists($email)` to prevent duplicates
     *  4. Call `User::create($email, $password)` (ensure password_hash in model)
     *  5. On success: optionally auto-login or set success flash and redirect to `/login`
     *  6. On failure: set error flash and redirect back to `/register`
     */
    public function register()
    {
        // IMPLEMENTATION REMOVED FOR WORKSHOP
        exit('TODO: Implement AuthController::register() to create a new user');
    }

    /**
     * Logout user
     * Student tasks:
     *  - Unset session variables and call session_destroy()
     *  - Redirect to `/login`
     */
    public function logout()
    {
        // IMPLEMENTATION REMOVED FOR WORKSHOP
        exit('TODO: Implement AuthController::logout() to log out the user');
    }

    /**
     * Home (protected)
     * Student tasks:
     *  - Ensure authentication with `requireAuth()` helper
     *  - Render `home` view and pass the `user` data from the session
     */
    public function home()
    {
        // IMPLEMENTATION REMOVED FOR WORKSHOP
        exit('TODO: Implement AuthController::home() to show protected content');
    }
}
