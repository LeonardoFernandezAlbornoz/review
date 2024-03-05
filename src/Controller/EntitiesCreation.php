<?php

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntitiesController extends AbstractController{
    private $categories=["Category 1",  "Category 2",  "Category 3"];

    #[Route("/categories/create",name:"app_create_categories")]
    function createCategories(CategoryRepository $categoryRepository){
        foreach ($this->categories as $value) {
            $new=new Category($value);
            $categoryRepository->add($new,true);
        }

    }


    #[Route("/categories/create",name:"app_create_notes)]
    function createCategories(CategoryRepository $categoryRepository){
        foreach ($this->categories as $value) {
            $new=new Category($value);
            $categoryRepository->add($new,true);
        }

    }
}