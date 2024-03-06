<?php
namespace App\Services;

use DateTime;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class Utilities{


    function __construct(#[Autowire("%imageFile")] private string $image)
    {
    }

    function getFile(){
        return $this->image;
    }
    function formatDate(DateTime $data){
        $actual=new DateTime();
        return $actual->diff($data)->format();
    }
}