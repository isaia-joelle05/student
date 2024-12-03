<?php 
    namespace App\Entity;
    use Doctrine\ORM\Mapping as ORM;
    
    #[ORM\Entity]
    #[ORM\Table(name: "Etudiant")]

    class Student {
        #[ORM\Id]
        #[ORM\Column(type: "string", length: 50)]
        private string $etu;

        #[ORM\Column(type: "string", length: 100)]
        private string $nom;

        #[ORM\Column(type: "string", length: 50)]
        private string $prenom;

        #[ORM\Column(type: "date")]
        private \DateTime $datenaissance;  

       public function getEtu(): string  {
            return $this->etu;
       } 

       public function setEtu(String $etu): self {
            $this->etu = $etu;
            return $this;
       }

       public function getNom(): string {
            return $this->nom;
       }

       public function setNom(String $nom): self {
            $this->nom = $nom;
            return $this;
       }

       public function getPrenom(): string {
            return $this->prenom;
       }

       public function setPrenom(String $prenom): self {
            $this->prenom = $prenom;
            return $this;
        }

       public function getDate(): \DateTime{
            return $this->datenaissance;
       }

       public function setDate(\DateTime $datenaissance): self {
            $this->datenaissance = $datenaissance;
            return $this;
       }

    }
?>
