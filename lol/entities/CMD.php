<?PHP
class CMD{
	private $id_cmd;
	private $nom;
	private $prenom;
	private $email;
	private $num;
	private $adresse;
	private $date_ev;
	private $date_prise;
	function __construct($id_cmd,$nom,$prenom,$email,$num,$adresse,$date_ev,$date_prise){
		$this->id_cmd=$id_cmd;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->num=$num;
		$this->adresse=$adresse;
		$this->date_ev=$date_ev;
		$this->date_prise=$date_prise;
	}
	function getIdCmd(){
		return $this->id_cmd;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getEmail(){
		return $this->email;
	}
	function getNum(){
		return $this->num;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function getDateEv(){
		return $this->date_ev;
	}
	function getDateP(){
		return $this->date_prise;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setNum($num){
		$this->num=$num;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	function setDateEv($date_ev){
		$this->date_ev=$date_ev;
	}
	function setDateP($date_prise){
		$this->date_prise=$date_prise;
	}
	
}

?>