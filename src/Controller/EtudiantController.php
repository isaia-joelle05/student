<?php 
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Response;
    use App\Entity\Student;
    use Doctrine\ORM\EntityManagerInterface;

    class EtudiantController extends AbstractController
    {
        #[Route("/api/students", name: "liste", methods: ["GET"])]
        public function getStudent(EntityManagerInterface $entity): Response
        {
            $students = $entity->getRepository(Student::class)->findAll();
            $data = [];
            foreach($students as $student) {
                $data[] = [
                    'etu' => $student->getEtu(),
                    'nom' => $student->getNom(),
                    'prenom' => $student->getPrenom(),
                    'datenaissance' => $student->getDate()?->format('Y-m-d'),
                ];
            }
            $jsonContent = json_encode($data);
            $response = new Response(
                content: $jsonContent,
                status: Response::HTTP_OK,
                headers: ['Content-Type' => 'application/json']
            );
            return $response;
        }
    }
?>
