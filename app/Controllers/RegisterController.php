<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;
use App\Models\Food;

/**
 * Class RegisterController
 *
 * This class handles user registration and profile updating operations.
 *
 * @package App\Controllers
 */
class RegisterController extends BaseController
{
    /**
     * The session instance for managing user sessions.
     *
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * The Client model instance for interacting with the client data.
     *
     * @var \App\Models\Client
     */
    private $clientModel;

    /**
     * The Food model instance for interacting with food data.
     *
     * @var \App\Models\Food
     */
    private $foodModel;

    /**
     * RegisterController constructor.
     *
     * Initializes the session and model instances.
     */
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientModel = new Client();
        $this->foodModel = new Food();
    }

    /**
     * Displays the registration form.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The rendered view with optional message.
     */
    public function index()
    {
        return view('register', ['message' => null]);
    }

    /**
     * Creates a new client account.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The login view with success message on account creation.
     */
    public function createClient()
    {
        $client = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'birthdate' => $this->request->getPost('birthdate'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $this->clientModel->insert($client);
        return view('login', ['message' => 'Account created successfully']);
    }

    /**
     * Updates the user profile information.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The info view with success message on profile update.
     */
    public function updateUser()
    {
        $clientModel = new Client();
        $client = $this->session->get('user');
        $client->name = $this->request->getPost('name');
        $client->username = $this->request->getPost('username');
        $client->birthdate = $this->request->getPost('birthdate');
        $client->phone = $this->request->getPost('phone');
        $client->email = $this->request->getPost('email');
        $clientModel->save($client);
        $allFood = $this->foodModel->getAllFood();
        return view('info', ['message' => 'Update successful', 'allFood' => $allFood]);
    }
}

