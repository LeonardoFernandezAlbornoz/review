<?php
namespace App\Services;

use DateTime;
use DateTimeImmutable;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class Utilities{


    function __construct(#[Autowire("%imageFile%")] private string $image)
    {
    }

    function getFile(){
        return $this->image;
    }
    function formatDate(DateTimeImmutable $data){
        $actual=new DateTimeImmutable();
        return $actual->diff($data)->format("%R%a days %H hours %I minutes");
    }
}