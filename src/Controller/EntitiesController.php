<?php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Note;
use App\Repository\CategoryRepository;
use App\Repository\NoteRepository;
use App\Services\GenerateContent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class EntitiesController extends AbstractController
{

    #[Route("/categories/create", name: "app_create_categories")]
    function createCategories(CategoryRepository $categoryRepository, GenerateContent $generateContent)
    {
        foreach ($generateContent->getCategories() as $category) {
            $new = new Category();
            $new->setDescription($category);
            $categoryRepository->add($new, true);
        }
        return new Response("Categories added");
    }


    #[Route("/notes/create", name: "app_create_notes")]
    function createNotes(NoteRepository $noteRepository, GenerateContent $generateContent, CategoryRepository $categoryRepository)
    {
        foreach ($generateContent->getNotes() as $notes) {
            $new = new Note();
            $new->setDescription($notes["description"]);
            $new->setIdCategory($categoryRepository->find($notes["category"]));
            $noteRepository->add($new, true);
        }

        return new Response("Notes added");

    }


    #[Route("/", name: "app_list")]
    function noteList(NoteRepository $noteRepository)
    {
        $notes = $noteRepository->findAll();

        return $this->render("homepage.html.twig", ["notes" => $notes]);
    }

    #[Route("/note/{slug}", name: "app_detail")]
    function noteDetail(string $slug, NoteRepository $noteRepository)
    {
        $note = $noteRepository->find($slug);

        return $this->render("note.html.twig", ["note" => $note]);
    }
}