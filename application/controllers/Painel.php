<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data['pacotes'] = $this->get('pacotes');
		$this->load->view('pagina/index.php',$data);
	}
	// Buscar cores
	public function getCores(){
		$cores = $this->db->query("SELECT * FROM cores")->result();
		return $cores;
	}

	// Sair da conta
	public function sair($redirect = null){
		if($redirect == false){
			session_destroy();
		}else{
			session_destroy();
			redirect(base_url());
		}
	}
	// Verificar se está com login feito
	public function isLogin(){
	    if( $this->session->userdata('logged_in') != null){
	        return true;
	    }else{
	        return false;
	    }
	}
	// Contacto
	public function contacto(){
	    $this->load->view('pagina/contact.php');
	}
	// Prognosticos
	public function prog(){
	    if($this->isLogin == true){
	        
	    }else{
	        $this->session->set_flashdata('registo', 'Precisa de efectuar o registo');
	        redirect(base_url('registo'));
	    }
	}
	// Mostrar/editar website
	public function website(){
		$data['contactos'] = $this->get("contactos");
		$data['pacotes'] = $this->get('pacotes');
		$this->load->view("back/head.php");
		$this->load->view("back/website.php",$data);
	}
	//Back apostas
	public function jogos(){
		$data['pacote'] = $this->get('pacotes');
		$data['pacotes'] = $this->get('pacotes');
		$data['jogos'] = $this->get('jogos');
		$data['lista_pacotes'] = $this->get('pacotes');
		$this->load->view("back/head.php");
		$this->load->view("back/jogos.php",$data);
	}
	// Login
	public function registar(){
	    $data['cores'] = $this->getCores(); 
	    $this->load->view('pagina/registo.php',$data);
	}
	// Registo
	public function login($erro = null){
		session_destroy();
		if($erro != null){
			$data['erro'] = null;
			$data['cores'] = $this->getCores(); 
	    	$this->load->view('pagina/login.php',$data);
		}else{
			$data['cores'] = $this->getCores();
			$data['erro'] = $erro;
	    	$this->load->view('pagina/login.php',$data);
		}
	   
	}
	public function boletim(){
		
		$k = 0;
		$id_jogo = null;
		$jogos = $this->input->post('selecionar');
		$boletim = $this->db->query("SELECT * FROM boletim")->result();
		
		if($boletim != null ){
			$id_boletim = $boletim[0]->id_boletim + 1;
			while (count($jogos) > $k) {
				if($id_jogo != null){
					$data['id_jogo'.$id_jogo] = $jogos[$k];
				}else{
					$data['id_jogo'] = $jogos[$k];
				}
				$id_jogo ++;
				$data['id_boletim'] = $id_boletim;
				$k++;
			}
		}else{
			$id_boletim = 1;
			while (count($jogos) > $k) {
				$data['id_boletim'] = $id_boletim;
				$data['id_jogo'] = $jogos[$k];
				$data['data'] = date("Y/m/d");
				$data['banca'] = $this->input->post('banca');
				$data['recomendacao'] = $this->input->post('rec');
				$data['betClic'] = $this->input->post('BetClic');
				$data['betano'] = $this->input->post('Betano');
				$data['x22BET'] = $this->input->post('22BET');
				$this->db->insert('boletim',$data);
				$k++;
			}
		}
		$data['id_pacote'] = $this->input->post('id_pacote');
		$data['data'] = date("Y/m/d");
		$data['banca'] = $this->input->post('banca');
		$data['recomendacao'] = $this->input->post('rec');
		$data['betClic'] = $this->input->post('BetClic');
		$data['betano'] = $this->input->post('Betano');
		$data['x22BET'] = $this->input->post('22BET');
		$this->db->insert('boletim',$data);
		$this->goPage("jogos");
	}
	public function registo(){
		$termos = $this->input->post('termos');
		$data = array(
	        'email' => $this->input->post('email'),
	        'password' => $this->input->post('password'),
	        'password2' => $this->input->post('password2')
		);
		if(strlen($data['password']) < 8){
			$this->session->set_flashdata('erro','Password necessita de pelo menos 8 carateres!');
			redirect(base_url('registo'));
		}
		if($data['password'] != $data['password2']){
			$this->session->set_flashdata('erro','Password errada tente novamente!');
			redirect(base_url('registo'));
		}
        if($this->criarUser($data) == true){
        	$this->session->set_flashdata('erro','');
        	redirect(base_url('login'),'refresh');
        }else{
        	redirect(base_url('registo'));
        }
	}
	// Inserir jogos
	public function inserirJogos(){
		$data = array(
			"casa" => $this->input->post('equipa_casa'),
			"fora" => $this->input->post('equipa_fora'),
			"id_pacote" => 0,
			"descricao" => $this->input->post('descricao')
		);
		if($this->db->insert('jogos',$data) == true){
			$this->goPage('jogos');
		}else{
			$this->goPage('');
		}
	}
	// Prognosticos
	public function prognosticos(){
		if($this->getProg() != null){
			$data['permissoes'] = $this->getProg();
		}else{
			$data['permissoes'] = 0;
		}
		$id = $this->idUser();
		$data['boletim'] = $this->db->query("SELECT * FROM boletim WHERE id_pacote = ".$data['permissoes'])->result();
		$data['user'] = $this->db->query("SELECT * FROM user WHERE id_user = '$id'")->result();
		$data['jogos'] = $this->get('jogos');
		$data['pacotes'] = $this->get('pacotes');
		$data['banca'] = $this->db->query("SELECT * FROM banca WHERE id_user = '$id'")->result();
	    $this->load->view('plataforma/head.php');
	    $this->load->view('plataforma/prognosticos.php',$data);
	    
	}
	// Mudar a banca
	public function mudarBanca(){
		$id_user = $this->idUser();
		$data['apostas'] = $_POST['selecionar'];
		$total = 0;
		$inserir['apostado'] = 0;
		$inserir['aguardando'] = 0;
		$inserir['balanco'] = 0;

		$user = $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'")->result();
		$banca = $this->db->query("SELECT * FROM banca where id_user = '$id_user'")->result();
		$k = 0;
		while(count($data) >= $k){
			if($data['apostas'][$k] == null){
				$data['apostas'][$k] = 0;
			}
			$query = $this->db->query("SELECT * FROM boletim WHERE id_boletim = ".$data['apostas'][$k])->result();

			if($query != null){
				if($k == 0){
					$aposta['id_boletim'] = $data['apostas'][$k];
					
				}else{
					$aposta['id_boletim'.$k] = $data['apostas'][$k];
				}

				foreach($query as $row){
					if($user[0]->casa_aposta == "betano"){
                        $odd = $row->betano;
                  	}elseif($user[0]->casa_aposta == "betClic"){
                        $odd = $row->betClic;
                  	}elseif($user[0]->casa_aposta == "22BET"){
                        $odd = $row->x22BET;
                  	}

   					if($k == 0){
   						$total_aposta = (int)$banca[0]->investimento*$row->banca/100;
   						$aposta['valor'] = $total_aposta;
   					}else{
   						$total_aposta = (int)$banca[0]->investimento*$row->banca/100;
   						$aposta['valor'.$k] = $total_aposta;
   					}
                  	$total += (int)$banca[0]->investimento*$row->banca/100;

					$inserir['apostado'] += $total;
					$inserir['aguardando'] += (int)$banca[0]->investimento*$odd;
				}
			}
			$inserir['balanco'] = (int)$banca[0]->investimento-$inserir['apostado'];
			$k++; 
		}
		
			$aposta['id_user'] = $id_user;
			$this->db->set($aposta);
			$this->db->insert('aposta');

			$inserir['investimento'] = $banca[0]->investimento;
			$this->db->set($inserir);
			$this->db->where('id_user',$id_user);
			$this->db->update('banca');

			$this->goPage('gestao');
	}
	// Apagar aposta
	public function cancelarAposta(){
		$banca = $this->get('banca','id_user',$this->idUser());
		$data['id_aposta'] = $this->input->post('id_aposta');


		$query = "DELETE FROM aposta WHERE id_aposta='".$this->input->post('id_aposta')."' AND id_user='".$this->idUser()."'";
		$this->db->query($query)->result();
	}
	public function mudarpassword($token){
		
		$query = $this->db->query("SELECT * FROM user WHERE token = '$token'")->result();
		if($query != null){
			redirect('painel/recuperar/'.$token);
		}else{
			echo "<a href=''> TOKEN INVALIDO !</a>";
		}
	}
	// Carregar view recuperação de password
	public function recuperar($token){
		$data['token'] = $token;
		$this->load->view('pagina/recuperar.php',$data);
	}
	public function updatePassword(){
		$data = array(
	        'password' => $this->input->post('password'),
	        'password2' => $this->input->post('password2')
		);
		$token = $this->input->post('token');
		if(strlen($data['password']) < 8){
			$this->session->set_flashdata('erro','Password necessita de pelo menos 8 carateres!');
			redirect('Painel/recuperar/'.$toke);
		}
		if($data['password'] != $data['password2']){
			$this->session->set_flashdata('erro','Password errada tente novamente!');
			redirect('Painel/recuperar/'.$token);
		}else{
			$query = $this->db->query("SELECT * FROM user WHERE token = '$token'")->result();
			if($query != null){
				$this->db->set('password',md5($data['password']));
				$this->db->where('token',$token);
				if($this->db->update('user') == true){
					redirect('login');
				}else{
					$this->session->set_flashdata('erro','Falha ao mudar password tente falar com a support');
					$this->goPage();
				}
			}
		}
		
		

	}
	// Recuperar password
	public function recuperarPassword(){
		$this->load->library('email');
		$this->load->library('encryption');

		$config['protocol']    = 'mail';
		$config['smtp_host']    = 'mail.tiagofreitasprog.website';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = '_mainaccount@tiagofreitasprog.website';
		$config['smtp_pass']    = 'Freitas123.';
		$config['charset']    = 'utf-8';
		$config['smtp_crypto'] = 'ssl';
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      

		$this->email->initialize($config);
		$email = $this->input->post('email');
		$recover = $this->db->query("SELECT * FROM user WHERE email = '$email'")->result();
		if($recover!= null){
			if($email != null){
		
				$token = uniqid();
				$id = $recover[0]->id_user;
				$this->db->set('token',$token);
				$this->db->where('id_user',$id);
				$this->db->update('user');

				$recover = $this->db->query("SELECT * FROM user WHERE email = '$email'")->result();

				$this->email->from('mail.tiagofreitasprog.website', 'Fenix Consulting');
				$this->email->to($email);
				$this->email->subject('Recuperação de email Fenix Consulting');
				$assunto = "Mude a sua password pelo nosso link caso não tenha pedido esta alteração apenas ignore ! LINK:".base_url('Painel/mudarpassword/'.$recover[0]->token);
				$this->email->message($assunto);
				if($this->email->send() == true){
					echo $this->email->print_debugger();
				}else{
					
					echo $this->email->print_debugger();
				}
			}else{
				echo "Erro";
			}
		}
		$this->session->set_flashdata('erro','Verifique seu email para recuperar a password');
		redirect('login');
	}

	// Buscar jogos e prognosticos
	public function getProg(){
		$id = $this->session->userdata('id');
		if($id != null){
			$query = $this->db->query("SELECT * FROM pacote_user WHERE id_user = '$id'")->result();
			if($query != null){
				$query = $this->db->query("SELECT * FROM `pacote_user` INNER JOIN pacotes on pacote_user.id_pacote = pacotes.id INNER JOIN user on user.id_user = pacote_user.id_user WHERE pacote_user.id_user = '$id'")->result();
				if($query[0]->fim < date("Y/m/d")){
					return $query[0]->id_pacote;
				}else{
					return null;
				}
			}else{
				return null;
			}
		}else{
			redirect('login');
		}
	}
	// Gestao banca
	public function gestao(){
		$id_pacote = $this->db->query("SELECT * FROM pacote_user WHERE id_user=".$this->idUser())->result();
        $data['banca'] = $this->get('banca','id_user',$this->idUser());
       
        $data['prognosticos'] = $this->db->query("SELECT * FROM aposta INNER JOIN boletim ON boletim.id_boletim = aposta.id_boletim WHERE aposta.id_user = '".$this->idUser()."' AND boletim.id_pacote = ".$id_pacote[0]->id_pacote)->result();
	    
	    $this->load->view('plataforma/head.php');
	    $this->load->view('plataforma/gestao.php',$data);
	}
	// Pacotes
	public function pacotes(){
	    $data['pacotes'] = $this->get('pacotes');
	    $this->load->view('plataforma/head.php');
	    $this->load->view('plataforma/pacotes.php',$data);
	}
	public function criarUser($data){
		$confirmar = $this->db->query("SELECT * FROM user WHERE email = '".$data['email']."'")->result();
		if($confirmar != null){
			$this->session->set_flashdata('erro','Email já existente!');
			return false;
		}
		unset($data['password2']);
		$data['password'] = md5($data['password']);
		$this->db->insert("user",$data);
		return true;
	}
	public function completarRegisto(){
	    $data = array(
	        "nome" => $this->input->post("name"),
	        "banca" => $this->input->post("banca"),
	        "casa_aposta" => $this->input->post("casa_aposta"),
	        "isActive" => "1",
	        "telefone" => $this->input->post("phno")
	    );
	    if($data['nome'] == null || $data['banca'] == null || $data['telefone'] == null){
	    	$this->session->set_flashdata('erro','Preencha todos os dados !');
	    	redirect('painel/form');
	    	return false;
	    }
	    $this->session->userdata('banca',$data['banca']);
	    $this->db->update('user', $data, array('id_user' => $this->session->userdata('id')));

	    if($this->isLogin() == true && $this->session->userdata('ativado') == 1){
            redirect('plataforma');
        }else{
        	$this->session->set_flashdata('erro','Falha ao entrar tente fazer o login novamente !');
        	redirect('login');
        }
	}
	// Inserir banca
	public function inserirBanca(){
	    $data = array(
	        "investimento" => $this->input->post('investimento'),
	        'id_user' => $this->idUser(),
	        "data" => $this->input->post('data')
	   );
	   $this->db->insert('banca',$data);
	   $this->goPage();
	}
	// Sobre nos
	public function sobre(){
		$this->load->view('pagina/about.php');
	}
	public function faq(){
		$this->load->view('plataforma/faq');
	}
	public function plataforma(){
		$id = $this->idUser();
		$this->getPacotes();
		$query = "SELECT banca FROM user WHERE email = '".$this->session->userdata('email')."'";
		$data['codigo'] = $this->verConvidados();
		$data['banca'] = $this->db->query($query)->result();
		$data['pacotes'] = $this->session->userdata('nome_pacote');
		$data['jogos'] = $this->get('jogos');
		$this->load->view("plataforma/head.php");
		$this->load->view("plataforma/index.php",$data);
	}
	public function user(){
		$id_user = $this->idUser();
		$data['user'] = $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'")->result();
		$this->load->view('plataforma/user.php',$data);
	}
	// Buscar id da session
	public function idUser(){
		$id_user = $this->session->userdata('id');
		if($id_user != null){
			return $id_user;
		}else{
			$this->sair('true');
		}
	}
	public function getPacotes(){
		$id_user = $this->session->userdata('id');
		if($id_user != null){

			$query = $this->db->query("SELECT * FROM pacote_user INNER JOIN pacotes on pacote_user.id_pacote = pacotes.id WHERE pacote_user.id_user = '$id_user'")->result();
			if($query != null){
				$this->session->set_userdata('nome_pacote',$query[0]->nome);
				$this->session->set_userdata('id_pacote',$query[0]->id_pacote);
			}
			
		}
	}
	//Notificações
	public function notificacao(){
		$id_user = $this->idUser();
		$query = $this->db->query("SELECT * FROM notificacao WHERE id_user = '$id_user'")->result();
		echo json_encode($query);
	}
	// Ver convidados
	public function verConvidados(){
		$id_user = $this->idUser();
		$query = $this->db->query("SELECT * FROM codigo WHERE id_user = '$id_user'")->result();
		if($query != null){
			$data['codigo'] = $query[0]->codigo;
		}else{
			$data['codigo'] = null;
		}
		return $data;
	}
	// Convidar amigos
	public function convidar(){
		$data = $this->verConvidados();
		$this->load->view("plataforma/head.php");
		$this->load->view("plataforma/convidar.php",$data);
	}
	public function addCode(){
		$data['codigo'] = $this->input->post('codigo');
		$id_user = $this->session->userdata('id');
		echo "id".$id_user;
		if($id_user != null){
			if($data['codigo'] != null){
				if($this->db->query("SELECT * FROM codigo WHERE codigo = '".$this->input->post('codigo')."'")->result() != null){
					$this->session->set_flashdata('erro','Codigo já existente');
					$this->goPage();
				}
				$data['id_user'] = $id_user;
				$this->db->insert("codigo",$data);
				$this->goPage();
			}
		}else{
			echo "<p>error</p>";
			$this->goPage('plataforma');
		}
	}
	public function entrar(){
        if($this->isLogin() == true && $this->session->userdata('ativado') == 1){
            redirect('plataforma');
        }else{
            $user = $this->input->post('user');
            if(empty($user)){
                $erro = "Falta preencher utilizador".$user;
                $this->session->set_flashdata('erro', $erro);
                redirect('login');
            }
            $password = $this->input->post('password');
            if($this->verificar($user,$password) == true){
                if($this->session->userdata('permissoes') == 2){
                    redirect(base_url("admin"));    
                }else{
                    if($this->session->userdata('ativado') == 0){
                        redirect(base_url("painel/form"));
                    }else{
                        redirect(base_url('plataforma'));
                    }
                }
            
            }else{
              	$erro = "Utilizador ou password errados!";
              	$this->session->set_flashdata('erro', $erro);
              	redirect('login');
            }
        }
        
    }
    public function count($table){
        $query = $this->db->query('SELECT * FROM '.$table);
        return $query->num_rows();
    }
    // Adicionar pacotes
    public function adicionarPacotes(){
    	$data = array(
    		"nome" => $this->input->post('nome'),
    		"preco" => $this->input->post('preco'),
    		"descricao" => $this->input->post('descricao')
    	);
    	$this->db->insert('pacotes',$data);
    	$this->goPage();
    }
    // para tras
    public function goPage($page = null){
    	if($page == null){
    		header('Location: ' . $_SERVER['HTTP_REFERER']);
    	}else{
    		redirect(base_url($page));
    	}
    }
    // Login por facebbok
    public function facebook(){
    	$this->sair(false);
		
		$fb = new Facebook\Facebook([
		 	'app_id' => '917883518914709',
		 	'app_secret' => '2951ee4029a3a2c6e6d0d958b90be148',
		 	'default_graph_version' => 'v2.5',
		]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email']; // optional
		try {
			if (isset($this->session->userdata['facebook_access_token'])) {
				$accessToken = $this->session->userdata['facebook_access_token'];
			} else {
	 		 	$accessToken = $helper->getAccessToken();
			}
		} catch(Facebook\Exceptions\facebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
		  	exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  	exit;
		}
		if (isset($accessToken)) {
			if (isset($this->session->userdata['facebook_access_token'])) {
			$fb->setDefaultAccessToken($this->session->userdata['facebook_access_token']);
		} else {
			// getting short-lived access token
			$this->session->userdata['facebook_access_token'] = (string) $accessToken;
		  // OAuth 2.0 client handler
			$oAuth2Client = $fb->getOAuth2Client();
			// Exchanges a short-lived access token for a long-lived one
			$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
			$this->session->userdata['facebook_access_token'] = (string) $longLivedAccessToken;
		// setting default access token to be used in script
			$fb->setDefaultAccessToken($this->session->userdata['facebook_access_token']);
		}
		// redirect the user to the profile page if it has "code" GET variable
		if (isset($_GET['code'])) {
			header('Location: profile.php');
		}
		// getting basic info about user
		try {
			$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
			$requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
			$picture = $requestPicture->getGraphUser();
			$profile = $profile_request->getGraphUser();
			$fbid = $profile->getProperty('id');           // To Get Facebook ID
			$fbfullname = $profile->getProperty('name');   // To Get Facebook full name
			$fbemail = $profile->getProperty('email');    //  To Get Facebook email
			$fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";
			# save the user nformation in session variable
			$this->session->userdata['fb_id'] = $fbid.'</br>';
			$this->session->userdata['fb_name'] = $fbfullname.'</br>';
			$this->session->userdata['fb_email'] = $fbemail.'</br>';
			$this->session->userdata['fb_pic'] = $fbpic.'</br>';
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			session_destroy();
			// redirecting user back to app login page
			header("Location: ./");
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		} else {
			// replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
			$loginUrl = $helper->getLoginUrl('https://tiagofreitasprog.website/fenix/', $permissions);
			
			redirect($loginUrl);
		}

    }
	public function admin(){
		$data['numero_visitas'] = $this->count("logos");
		$data['meses'] = $this->estasticas(1);
		$data['n_user'] = $this->count("user");
		$data['n_sub'] = $this->count('pacote_user');
		$data['prognosticos'] = $this->get('boletim');
		$this->load->view("back/head.php");
		$this->load->view("back/index.php",$data);
	}
	public function utilizador(){
		$data['utilizador'] = $this->get('user');
		$this->load->view("back/head.php");
		$this->load->view("back/utilizadores.php",$data);
	}
	public function verificar($user = null,$password = null){
		
		$password = md5($password);
		$query = $this->db->query("SELECT * FROM user WHERE email='$user' AND password = '$password'")->result();
		
		if($query != null){
		    $newdata = array(
		        'email'  => $user,
		        'username' => $query[0]->nome,
		        'id' => $query[0]->id_user, 
		        'permissoes'     => $query[0]->permissoes,
		        'ativado'   => $query[0]->isActive,
		        'logged_in' => TRUE
			);
        
		    $this->session->set_userdata($newdata);
		    return true;
		}else{
			return false;
		}
	}
	public function form(){
		$data['user'] = $this->session->userdata('username');
	    $this->load->view('back/form.php',$data);
	}
	// Estastisticas
	public function ip_info() {
    	if (isset($_SERVER['HTTP_CLIENT_IP'])){
		    $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
		}

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		    $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
		    $real_ip_adress = $_SERVER['REMOTE_ADDR'];
		}

		$cip = $real_ip_adress;
		$iptolocation = 'http://api.hostip.info/country.php?ip=' . $cip;
		$creatorlocation = file_get_contents($iptolocation);

	    $data['ip'] = $cip;
	    $data['pais'] = $creatorlocation;
	    $this->db->set($data);
	    $this->db->insert('logos');
	}
	public function estasticas($tipo = null){
		if($tipo == 1){
			$janeiro = 0;
			$fevereiro = 0;
			$marco = 0;
			$abril = 0;
			$maio = 0;
			$junho = 0;
			$julho = 0;
			$agosto = 0;
			$setembro = 0;
			$outubro = 0;
			$novembro = 0;
			$dezembro = 0;

			$data = $this->get("logos");
			foreach($data as $row){
				print_r($row->data);
				$month = date("m",strtotime($row->data));
				if($month == 1){
					$janeiro++;
				}else if($month == 2){
					$fevereiro++;
				}else if($month == 3){
					$marco++;
				}else if($month == 4){
					$abril++;
				}else if($month == 5){
					$maio++;
				}else if($month == 6){
					$junho++;
				}else if($month == 7){
					$julho++;
				}else if($month == 8){
					$agosto++;
				}else if($month == 9){
					$setembro++;
				}else if($month == 10){
					$outubro++;
				}else if($month == 11){
					$novembro++;
				}else if($month == 12){
					$dezembro++;
				}
			}
			$data = array(
				"janeiro" => $janeiro,
				"fevereiro" => $fevereiro,
				"marco" => $marco,
				"abril" => $abril,
				"maio" => $maio,
				"junho" => $junho,
				"julho" => $julho,
				"agosto" => $agosto,
				"setembro" => $setembro,
				"outubro" => $outubro,
				"novembro" => $novembro,
				"dezembro" => $dezembro
			);
			return $data;
		}
	}
	// Querys
	public function get($table,$id_nome = null,$id = null){
	    if($id != null){
	        $this->db->where($id_nome,$id);
	    }
        $query = $this->db->get($table);
        return $query->result();
    }

}
