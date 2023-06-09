<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pokemon/', name: 'pokemon_')]
class PokemonController extends AbstractController
{

    #[Route('', name: 'pokedex')]
    public function pokedex(PokemonRepository $pokemonRepository): Response
    {

        $pokemons = $pokemonRepository->findAll();


        return $this->render('pokemon/pokedex.html.twig', [
            'pokemons' => $pokemons
        ]);
    }

    #[Route('details/{id}', name: 'details')]
    public function details(int $id, PokemonRepository $pokemonRepository):Response {
        // aller chercher la série en BDD
        $pokemon = $pokemonRepository->find($id);

        return $this->render('pokemon/details.html.twig',
            [
                'pokemon' => $pokemon
            ]);

    }


}
