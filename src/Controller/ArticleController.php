<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Entity\Article;
use App\Entity\Produit;
use App\Repository\ArticleRepository;
use App\Entity\User;
use App\Repository\PaginationRepository;

class ArticleController extends AbstractController {

    public function index ($params) {
        // Récupérer les objets et les stockent dans une variable sous forme de tableau 
        $repo = new PaginationRepository();
        $articles = $repo->paginate(Produit::class, $params[0]);
        $this->render("articles/Suggestion.php", [
            'articles' => $articles
        ]);
    }

    public function show($params)
    {
        $repo = new ArticleRepository();
        
        $articles = $repo->getOneArticle($params[0]);
        // dd($articles);
        $this->render("articles/FicheProduit.php", [
            'articles' => $articles
        ]);
        
    }
     
    public function search($productSearched)
    {
        $repo = new ArticleRepository();
        
        $articles = $repo->searchArticle($productSearched[0]);
        //dd($articles);
        $this->render("articles/recherche.php", [
            'articles' => $articles
        ]);
        
    }
}