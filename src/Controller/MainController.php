<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    public function resultado(Request $request): Response
    {
        $numero = $request->request->get('numero');

        if ($numero >= 1 && $numero <= 10000000000) {
            $digitos = strlen($numero);
            $resultado = '';
            for ($i=0;$i<$digitos;$i++) {
                for ($c=0; $c<=9; $c++) {
                    if ($c == $numero[$i]) {
                        $resultado[$i] = $c;
                    }           
                }           
            }
            
            echo "<script>setTimeout(function(){ window.location.href = '/'; }, 6000);</script>";
            return $this->render('resultado.html.twig', [
                'resultado' => $resultado,
            ]);
        }
        return $this->render('error.html.twig');
    }

}
