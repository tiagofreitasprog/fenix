class email extends CI_Model {

        public $from;
        public $to;
        public $cc;
        public $subject;
        public $token;
        public $message;

        public function token(){
                $token = random_bytes(20);
                return $token;
        }
        public function sendEmail($to,$cc,$subject,$message){
                $this->email->from($to, 'Fenix consulting');
                $this->email->to($to);
                
                if($cc != null){
                        $this->email->cc();
                }                        
                        
                $this->email->subject('Email Test');
                $this->email->message('Testing the email class.');

                
                if($this->email->send() == true){
                        return true;
                }else{
                        return false;
                }
        }
}