<?PHP
 	class Collection_classe
 	{
 		private $id;
		private $nomcollection;
		private $nomstyliste;
		private $an;
		private $image;
		private $nbarticle;
		function __construct($nomC,$nomS,$an,$image)
		{
			$this->nomcollection=$nomC;
			$this->nomstyliste=$nomS;
			$this->an=$an;
			$this->image=$image;
		}
		public function getId()
		{
			return $this->id;
		}
		public function getNomCollection()
		{
			return $this->nomcollection;
		}
		public function getNomStyliste()
		{
			return $this->nomstyliste;
		}
		public function getAn()
		{
			return $this->an;
		}
		public function getImage()
		{
			return $this->image;
		}
		public function getNbArticle()
		{
			return $this->nbarticle;
		}
		public function setId($val)
		{
			$this->id=$val;
		}
		public function setNomCollection($val)
		{
			$this->nomcollection=$val;
		}
		public function setNomStyliste($val)
		{
			$this->nomstyliste=$val;
		}
		public function setAn($val)
		{
			$this->an=$val;
		}
		public function setNbArticle($val)
		{
			$this->nbarticle=$val;
		}

 	}
?>