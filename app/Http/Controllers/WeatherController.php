<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
  /**
  * Entry point for weather forecast
  * @return object
  */
  public function index()
  {
    $data = array();
    $data['weather'] = config('locations.endpoint.weather.current');
    $data['locations'] = config('locations.city');

    $results['currentWeather'] = $this->getCurrentWeather($data['locations']);

    // print_r($results);

    return view('welcome',$results);
  }
  /**
  * Gets current weather for list of cities
  * Reindexes the returned JSON file for relevant details
  * @return object
  */
  protected function getCurrentWeather($cities){
    //Check if array is empty
    //loops through the cities to get current weather
    //Set endpoint and appid for request
    //api.openweathermap.org/data/2.5/weather?q=tokyo,jp&appid=1f59fe92e2b66ba0c85d4de28b225c7c
    $endpoint = config('locations.endpoint.weather.current');
    $appid = config('locations.endpoint.weather.key');

    //For now state code is for Japan only
    $stateCode = 'JP';

    //Set empty results array
    $weatherList = array();

    if(!empty($cities)){
      foreach($cities as $city){
        //Format endpoint Request
        $params['q'] = $city.','.$stateCode;
        $params['appid'] = $appid;
        //Units can be Kelvin as default, imperial or metric
        $params['units'] = 'metric';

        try{
          //Creates new GuzzleHttp Client
           $client = new Client();
           $result= $client->get($endpoint,['query' => $params]);

           if($result->getBody() !== null){
              $results = $result->getBody();
              $weatherResults = json_decode($results,true);
           }
        }catch(GuzzleException $e){

           return false;
        }
        //Include weather map image url
        $weatherResults['image'] = "http://openweathermap.org/img/wn/".$weatherResults['weather'][0]['icon']."@4x.png";
        $weatherList[] = $weatherResults;

      }
    }else{
      //Insert catch here
    }

    return $weatherList;

  }
  /**
  * Gets location recommendations
  * Reindexes the returned JSON file for relevant details
  * @return object
  */
  public function cityDetails($city){

    $endpoint = config('locations.endpoint.foursquare.url');
    $photoEndpoint = config('locations.endpoint.foursquare.photo');

    //Create an array for enpoint parameters
    $params = array();
    $params['client_secret'] = config('locations.endpoint.foursquare.clientSecret');
    $params['client_id'] = config('locations.endpoint.foursquare.clientId');
    $params['near'] = $city.",JP";
    $params['category'] = '4deefb944765f83613cdba6e';
    $params['limit'] = 20;
    $params['v'] = '20210324';

    try{
      //Creates new GuzzleHttp Client
       $client = new Client();
       $result= $client->get($endpoint,['query' => $params]);

       if($result->getBody() !== null){
          $results = $result->getBody();
          $results = json_decode($results,true);
          $locationResults = $results['response']['venues'];
          //Format location Results
          $venues = array();
          foreach($locationResults as $location){
            $venueDetails = array();

            $venueDetails['name'] = $location['name'];
            $address = NULL;
            foreach($location['location']['formattedAddress'] as $locationAddress){
              $address = $address.$locationAddress;

            }
            $venueDetails['address'] = $address;

            $venues[] = $venueDetails;

          }

       }else{
         //Catch no results for endpoint

       }



    }catch(GuzzleException $e){

       return false;
    }

    $details = array('city'=>$city,'venues'=>$venues);
    return view('cityDetails',$details);


  }
}
