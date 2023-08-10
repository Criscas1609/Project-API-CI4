<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;

/**
 * Class LoginController
 *
 * This class handles user login, validation, and logout operations.
 *
 * @package App\Controllers
 */
class LoginController extends BaseController
{
    /**
     * The session instance for managing user sessions.
     *
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * LoginController constructor.
     *
     * Initializes the session instance.
     */
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    /**
     * Displays the login form.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The rendered view with optional message.
     */
    public function index()
    {
        return view('login', ['message' => null]);
    }

    /**
     * Validates user login information.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The registration view with a message if user not found or
     *                                                    the info view if login is successful.
     */
    public function validateInfo()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $clientModel = new Client();
        $user = $clientModel->where('username', $username)->first();

        if (!$user) {
            return view('/register', ['message' => 'User not found, please create an account']);
        }

        if ($user && password_verify($password, $user->password)) {
            $this->session->set('user', $user);

            return redirect()->to('/info');
        } else {
            return view('/register');
        }
    }

    /**
     * Retrieves user information for profile update.
     *
     * @return string The updateUser view with user information.
     */
    public function getInfo()
    {
        $user = $this->session->get('user');
        return view('updateUser', ['user' => $user]);
    }

    /**
     * Logs out the user and destroys the session.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse Redirects to the login page.
     */
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
