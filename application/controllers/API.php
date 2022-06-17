<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

require_once BASEPATH.'core/CodeIgniter.php';
use \hristonev\sport\src\SportMonks\API\HTTPClient;
class API extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		
	}
	public function index(){
		echo "teste";


		// Default values. Can be initialized without arguments.
		$scheme = 'https';
		$hostname = 'sportmonks.com';
		$subDomain = 'soccer';
		$port = 443;

		// Auth.
		$token = '2ww9z4hak5WQn3vr7Do36yPu2YtAvUhhrhuPvXWK8kVCDMr7i58aQxurYEr4}';
		
		$client = new \hristonev\sport\src\SportMonks\API\HTTPClient();
		// or
		//$client = new SportMonksAPI($scheme, $hostname, $subDomain, $port);

		// Set auth.
		$client->setAuth(Auth::BASIC, [
		    'token' => $token
		]);
		$data = [];
		do{
		    $data = array_merge($data, $client->countries()->findAll());
		}while($client->countries()->nextPage());
		print_r($data);
	}
}