<?php 
    namespace App\Repository;

    use Doctrine\DBAL\Connection;

    class ResultatRepository {
        private Connection $connection;

        public function __construct(Connection $connection) {
            $this -> connection = $connection;
        }

        // public function getResultat(string $etu, string $idsemestre): array {
        //     $sql = "select * from resultat r join matieres m on r.idmatiere=m.idmatiere where etu = :etu and m.idsemestre = :idsemestre";
        //     return $this->connection->fetchAllAssociative($sql, params: [
        //         'etu'=>$etu,
        //         'idsemestre'=>$idsemestre,
        //     ]);
        // }
        public function getResultatSemester(string $etu, string $libelle): array {
            $sql = "SELECT R.ETU, E.nom, E.prenom, M.idMatiere, M.libelle AS matiere, M.credits, R.notes, S.libelle AS semestre, R.dateSession
                    FROM resultat R
                    JOIN Matieres M ON R.idMatiere = M.idMatiere
                    JOIN Semestre S ON M.idSemestre = S.idSemestre
                    JOIN Etudiant E ON R.ETU = E.ETU
                    WHERE S.libelle = :libelle AND R.ETU = :etu";

            return $this->connection->fetchAllAssociative($sql, params: [
                'etu'=>$etu,
                'libelle'=>$libelle,
            ]);
        }

    }
?>
