<?php

namespace App\Controller;

use App\Application\Controller;
use App\Entity\Produit;

class ProduitController extends Controller
{

    public function default()
    {
        $objProduit = new Produit(); //instancie la class produit
        $produits = $objProduit->getAll();
        return $this->twig->render(
            'produit/default.html.twig',
            [
                'produits' => $produits
            ]
        );
    }

    public function delete($params = [])
    {
        $id = $params['idProduit'];
        $produit = new Produit();
        $produit->delete($id);
        header('Location: /produit');
    }
}
