<?php  
namespace App\Controller;

use App\Repository\ResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController {

    // #[Route("/api/resultat/{etu}/{idsemestre}", name: "resultat", methods: ["GET"])]
    // public function getResultatBind(string $etu, string $idsemestre, ResultatRepository $resultatRepository): JsonResponse {
    //     $resultat = $resultatRepository->getResultat($etu, $idsemestre);

    //     return $this->json($resultat);
    // }
    #[Route("/api/resultat/{etu}/{libelle}", name: "resultat", methods: ["GET"])]
    public function getResultatBind(string $etu, string $libelle, ResultatRepository $resultatRepository): JsonResponse {
        $resultat = $resultatRepository->getResultatSemester($etu, $libelle);

        return $this->json($resultat);
    }
}

?>