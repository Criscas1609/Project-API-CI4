<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Food;
use App\Services\FoodService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class FoodController extends BaseController
{

    private $foodModel;

    public function __construct()
    {
        $this->foodModel = new Food();
    }

    public function index()
    {
        $allFood = $this->foodModel->getAllFood();
        return view('info', ['message' => null, 'allFood' => $allFood]);
    }

    public function validate_db(){
        if($this->foodModel->isTableEmpty()){
        $food = $this->get_info();
        $this->save_food($food);
        }
    }

    public function get_all_food($letter)
    {
        $client = new Client();
        $url = 'www.themealdb.com/api/json/v1/1/search.php?f='. $letter;
        try{
            $response = $client->get($url);
            return json_decode($response->getBody(), true);
        }catch(GuzzleException $e){
            //TODO: handle exception
            return $e;
        }
    }

    public function get_info(){
        $food = array();
        for ($letter = 'a'; $letter <= 'p'; $letter++) {
            $result = $this->get_all_food($letter);
            $food = array_merge($food, $result['meals']);
        }
        return $food;
    }

    public function save_food($food){
        foreach($food as $meal){
            $object = [
                "name" => $meal['strMeal'],
                "location" => $meal['strArea'],
                "instruction" => $meal['strInstructions'],
                "image" => $meal['strMealThumb'],
            ];
            $this->foodModel->saveFood($object);
        }
        
        
    }
}
