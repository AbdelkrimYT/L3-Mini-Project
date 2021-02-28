<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ApiController extends Controller
{
    public function index()
    {
        $result = App\Flight::paginate(20);;
        foreach($result as $data)
        {
            unset($data['status']);
            unset($data['created_at']);
            unset($data['updated_at']);

            $data['price'] = $data->price;
            unset($data['price_id']);
            unset($data['price']['id']);
            unset($data['price']['name']);
            unset($data['price']['created_at']);
            unset($data['price']['updated_at']);
            
            $data['airport_takeoff'] = $data->airport_takeoff;
            unset($data['take_off_airport_id']);
            unset($data['airport_takeoff']['id']);
            unset($data['airport_takeoff']['created_at']);
            unset($data['airport_takeoff']['updated_at']);

            $data['airport_landing'] = $data->airport_landing;
            unset($data['landing_airport_id']);
            unset($data['airport_landing']['id']);
            unset($data['airport_landing']['created_at']);
            unset($data['airport_landing']['updated_at']);

            $data['airplane'] = $data->airplane;
            unset($data['airplane_id']);
            unset($data['airplane']['id']);
            unset($data['airplane']['model_id']);
            unset($data['airplane']['created_at']);
            unset($data['airplane']['updated_at']);
        }
        return $result; 
    }
}
