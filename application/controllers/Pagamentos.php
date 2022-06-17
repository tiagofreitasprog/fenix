<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamentos extends CI_Controller {

	public function index(){
		
	}
	public function paypal(){
		$pacote = $this->input->post('id_pacote');
		echo "id=>".$pacote;
		$apiContext = new \PayPal\Rest\ApiContext(
	        new \PayPal\Auth\OAuthTokenCredential(
	            'AeyDJ_ZzdBkRj6FrxuQiTI7qrd493rqIpGpuLmyOdu4ZVOYkB3Qhek-W25UQ-fZtHWeaE8BccCO',     // ClientID
	            'EPmb0IOI2hG4QskS_Zs0zbUJt9FyNTy0BOSnztNGnBKMFvjD0YTbeGYn3GVndl226ep7k6P_oduQCP7Y'      // ClientSecret
	        )
		);

		$data = $this->getPacote($pacote);

		$amount = new \PayPal\Api\Amount();
		$amount->setTotal($data[0]->preco);
		$amount->setCurrency('EUR');

		$transaction = new \PayPal\Api\Transaction();
		$transaction->setAmount($amount);

		$redirectUrls = new \PayPal\Api\RedirectUrls();
		$redirectUrls->setReturnUrl(base_url('plataforma'))
		    ->setCancelUrl("https://example.com/your_cancel_url.html");

		$payment = new \PayPal\Api\Payment();
		$payment->setIntent('sale')
		    ->setPayer("Fenix consulting")
		    ->setTransactions(array($transaction))
		    ->setRedirectUrls($redirectUrls);

		try {
		    $payment->create($apiContext);
		    echo $payment;

		    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
		}
		catch (\PayPal\Exception\PayPalConnectionException $ex) {
		    // This will print the detailed information on the exception.
		    //REALLY HELPFUL FOR DEBUGGING
		    echo $ex->getData();
		}
	}
	public function getPacote($id_pacote){
		$query = $this->db->query("SELECT * FROM pacotes WHERE id = '$id_pacote'")->result();
		
		return $query;
	}
}