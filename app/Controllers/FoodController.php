<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Food;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class FoodController
 *
 * This class handles operations related to food items, including displaying views, interacting with the API,
 * and performing CRUD operations.
 *
 * @package App\Controllers
 */
class FoodController extends BaseController
{
    private $foodModel;
    protected $session;
    protected $user;

    /**
     * FoodController constructor.
     *
     * Initializes the food model and session instance.
     */
    public function __construct()
    {
        $this->foodModel = new Food();
        $this->session = \Config\Services::session();
        $this->user = $this->session->get('user');
    }

    /**
     * Displays the info view with all food items.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The rendered view with food items or login message.
     */
    public function index()
    {
        if ($this->user != null) {
            $allFood = $this->foodModel->getAllFood();
            return view('info', ['message' => null, 'allFood' => $allFood]);
        } else {
            return view('login', ['message' => "To see the content, log in"]);
        }
    }

    /**
     * Displays the showDetail view for a specific food item.
     *
     * @return string The rendered showDetail view with the selected food item or login message.
     */
    public function show_detail()
    {
        if ($this->user != null) {
            $name = $this->request->getVar('food');
            $food = $this->foodModel->get_by_name($name);
            return view('showDetail', ['error' => null, 'food' => $food]);
        } else {
            return view('login', ['message' => "To see the content, log in"]);
        }
    }

    /**
     * Displays the newProduct view for adding a new food item.
     *
     * @return string The rendered newProduct view or login message.
     */
    public function new_product()
    {
        if ($this->user != null) {
            return view('newProduct', ['error' => null]);
        } else {
            return view('login', ['message' => "To see the content, log in"]);
        }
    }

    /**
     * Displays the update view for updating a food item.
     *
     * @return string The rendered update view with the selected food item or login message.
     */
    public function update_product()
    {
        if ($this->user != null) {
            $name = $this->request->getVar('food');
            $food = $this->foodModel->get_by_name($name);
            return view('update', ['error' => null, 'food' => $food]);
        } else {
            return view('login', ['message' => "To see the content, log in"]);
        }
    }

    /**
     * Validates the database, fetches food info from the API, and saves it to the database.
     */
    public function validate_db()
    {
        if ($this->foodModel->isTableEmpty()) {
            $food = $this->get_info();
            $this->save_food($food);
            return redirect()->to('/register');
        }
        return redirect()->to('/register');
    }

    /**
     * Retrieves food information from the API.
     *
     * @return array The array of food items retrieved from the API.
     */
    public function get_info()
    {
        $food = array();
        for ($letter = 'a'; $letter <= 'p'; $letter++) {
            $result = $this->get_all_food($letter);
            $food = array_merge($food, $result['meals']);
        }
        return $food;
    }

    /**
     * Fetches food items from the API based on the starting letter.
     *
     * @param string $letter The starting letter for food items.
     * @return mixed The response JSON from the API.
     */
    public function get_all_food($letter)
    {
        $client = new Client();
        $url = 'www.themealdb.com/api/json/v1/1/search.php?f=' . $letter;
        try {
            $response = $client->get($url);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return $e;
        }
    }

    /**
     * Saves food items to the database.
     *
     * @param array $food The array of food items to be saved.
     */
    public function save_food($food)
    {
        foreach ($food as $meal) {
            $object = [
                "name" => $meal['strMeal'],
                "location" => $meal['strArea'],
                "instruction" => $meal['strInstructions'],
                "image" => $meal['strMealThumb'],
                "status" => "On",
            ];
            $this->foodModel->saveFood($object);
        }
    }

    /**
     * Creates a new food item and redirects to the info view.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The info view with a success message and updated food list.
     */
    public function create_product()
    {
        $object = [
            "name" => $this->request->getVar('name'),
            "location" => $this->request->getVar('location'),
            "instruction" => $this->request->getVar('instruction'),
            "image" => $this->request->getVar('url'),
            "status" => "On",
        ];
        $this->foodModel->saveFood($object);
        $allFood = $this->foodModel->getAllFood();
        return view('info', ['message' => 'Added successfully', 'allFood' => $allFood]);
    }

    /**
     * Updates a food item and redirects to the showDetail view.
     *
     * @return string The showDetail view with an update message and the updated food item.
     */
    public function change_product()
    {
        $name = $this->request->getVar('food');
        $food = $this->foodModel->get_by_name($name);
        $food->name = $this->request->getVar('name');
        $food->location = $this->request->getVar('location');
        $food->instruction = $this->request->getVar('instruction');
        $food->image = $this->request->getVar('url');
        $this->foodModel->save($food);
        return view('showDetail', ['error' => 'Update Done', 'food' => $food]);
    }

    /**
     * Deletes a food item and redirects to the info view.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string The info view with a success message and updated food list.
     */
    public function delete_product()
    {
        $name = $this->request->getVar('foodName');
        $food = $this->foodModel->get_by_name($name);
        $this->foodModel->delete($food->id);
        $allFood = $this->foodModel->getAllFood();
        return view('info', ['message' => 'Deleted successfully', 'allFood' => $allFood]);
    }

    /**
     * Changes the status of a food item and redirects to the showDetail view.
     *
     * @return string The showDetail view with an update status message and the updated food item.
     */
    public function change_product_status()
    {
        $name = $this->request->getVar('foodName');
        $food = $this->foodModel->get_by_name($name);

        if ($food->status == "On") {
            $food->status = "Off";
        } else {
            $food->status = "On";
        }

        $this->foodModel->save($food);
        return view('showDetail', ['error' => 'Update Status Done', 'food' => $food]);
    }
}
