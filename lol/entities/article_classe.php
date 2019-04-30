<?PHP
 	class article_classe
 	{			
 		private $reference;	
 		private $idco;
		private $nomarticle;
		private $description;
		private $margedage;
		private $margedeprix;
		private $image;
		private $nouvelle;
		function __construct($reference,$idco,$nomarticle,$description,$margedage,$margedeprix,$image,$nouvelle)
		{
		 	$this->idcollection=$idco;
		 	$this->nomarticle=$nomarticle;
			$this->reference=$reference;
		 	$this->idco=$idco;
			$this->description=$description;
			$this->margedage=$margedage;
			$this->margedeprix=$margedage;
			$this->image=$image;
			$this->nouvelle=$nouvelle;
		}
		public function getRef()
		{
			return $this->reference;
		}
		public function getIdco()
		{
			return $this->idco;
		}
		public function getNomArticle()
		{
			return $this->nomarticle;
		}
		public function getDescription()
		{
			return $this->description;
		}
		public function getMargeDage()
		{
			return $this->margedage;
		}
		public function getImage()
		{
			return $this->image;
		}
		public function getMargedeprix()
		{
			return $this->margedeprix;
		}
		public function getnouvelle()
		{
			return $this->nouvelle;
		}
		public function setRef($val)
		{
			$this->reference=$val;
		}
		public function setIdco($val)
		{
			$this->idco=$val;
		}
		public function setNomArticle($val)
		{
		    $this->nomarticle=$val;
		}
		public function setDescription($val)
		{
			$this->description=$val;
		}
		public function setMargedage($val)
		{
			$this->margedage=$val;
		}
		public function setMargedeprix($val)
		{
			$this->margedeprix=$val;
		}

 	}
?>