<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {

	public function index(){
		$this->load->view("live/index.php");
	}
	public function getMatch(){
	    $curl = curl_init();

        curl_setopt_array($curl, [
        	CURLOPT_URL => "https://livescore-football.p.rapidapi.com/soccer/league-table?country_code=england&league_code=premier-league",
        	CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_FOLLOWLOCATION => true,
        	CURLOPT_ENCODING => "",
        	CURLOPT_MAXREDIRS => 10,
        	CURLOPT_TIMEOUT => 30,
        	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        	CURLOPT_CUSTOMREQUEST => "GET",
        	CURLOPT_HTTPHEADER => [
        		"x-rapidapi-host: livescore-football.p.rapidapi.com",
        		"x-rapidapi-key: ad36c65ceemshfb066e061f70db2p15b477jsn8f6cbdaf827f"
        	],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        	echo "cURL Error #:" . $err;
        } else {
        	echo $response;
        }
	}
}
