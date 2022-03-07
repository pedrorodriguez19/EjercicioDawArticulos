<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\FormularioArticuloType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $articles = $doctrine->getRepository(Article::class)->findAll();

        if (!$articles) {
            $this->addFlash("warning", "No hay articulos");
        }
        return $this->render('index.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/article/{num}", name="article")
     */
    public function verArticulo(ManagerRegistry $doctrine, int $num): Response
    {
        $article = $doctrine->getRepository(Article::class)->find($num);

        if (!$article) {
            $this->addFlash("warning", "No existe el articulo");
        }

        return $this->render('articulo.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/nuevoArticulo", name="nuevoArticulo")
     */
    public function nuevo(Request $request, ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();

        $article = new Article();

        $form = $this->createForm(FormularioArticuloType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();

            $manager->persist($article);
            $manager->flush();

            $this->addFlash("success", "Articulo creado correctamente");

            return $this->redirectToRoute('article', ['num' => $article->getId()]);
        }

        return $this->render('formArticulo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/editar/{num}", name="editar")
     */
    public function editar(Request $request, ManagerRegistry $doctrine, int $num): Response
    {
        $manager = $doctrine->getManager();

        $article = $doctrine->getRepository(Article::class)->find($num);

        $form = $this->createForm(FormularioArticuloType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();

            $manager->persist($article);
            $manager->flush();

            $this->addFlash("success", "Artículo creado correctamente");

            return $this->redirectToRoute('article', ['num' => $article->getId()]);
        }

        return $this->render('formArticulo.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/borrar/{num}", name="borrar")
     */
    public function borrar(ManagerRegistry $doctrine, int $num): Response
    {
        $manager = $doctrine->getManager();

        $article = $doctrine->getRepository(Article::class)->find($num);

        $manager->remove($article);
        $manager->flush();

        $this->addFlash("success", "Artículo borrado correctamente");

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/categoria/{cat}", name="categoria")
     */
    public function categorias(ManagerRegistry $doctrine, String $cat): Response
    {
        $articles = $doctrine->getRepository(Article::class)->findBy(["categoria" => $cat]);

        if (!$articles) {
            $this->addFlash("warning", "No hay artículos");
        }

        return $this->render('index.html.twig', ['articles' => $articles]);
    }
}
