<?php

namespace App\Controller;

use App\Service\EspecialidadeService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class EspecialidadeController
 * @package App\Controller
 *
 * @Route("/especialidade")
 */
class EspecialidadeController extends AbstractController
{
    /**
     *
     * @Route("/")
     *
     */
    public function index()
    {
        return new JsonResponse('ok');
    }

    /**
     *
     * @param Request $request
     * @return Response
     *
     * @Route("/criar", methods={"POST"})
     *
     */
    public function novaEspecialidade(Request $request, EspecialidadeService $especialidadeService) : Response
    {
        $dados = $request->getContent();

        return new JsonResponse($especialidadeService->criarEspecialidade(json_decode($dados)));
    }

    /**
     * @param EspecialidadeService $especialidadeService
     * @return JsonResponse
     *
     * @Route("/buscar", methods={"GET"})
     *
     */
    public function buscarTodas(EspecialidadeService $especialidadeService)
    {
        return new JsonResponse($especialidadeService->buscarTodasEspecialidades());
    }

    /**
     *
     * @param $especialidadeId
     * @param EspecialidadeService $especialidadeService
     * @return JsonResponse
     *
     * @Route("/buscar/{especialidadeId}", methods={"GET"})
     *
     */
    public function buscarPorId($especialidadeId, EspecialidadeService $especialidadeService)
    {
        return new JsonResponse($especialidadeService->buscarPorId($especialidadeId));
    }

    /**
     * @param Request $request
     * @param EspecialidadeService $especialidadeService
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route("/atualizar", methods={"PUT"})
     */
    public function atualizarEspecialidade(Request $request, EspecialidadeService $especialidadeService) : Response
    {
        $dados = $request->getContent();

        return new JsonResponse($especialidadeService->atualizarPorId(json_decode($dados)));
    }

    /**
     * @param $especialidadeId
     * @param EspecialidadeService $especialidadeService
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route("/deletar/{especialidadeId}", methods={"DELETE"})
     */
    public function deletarPorId($especialidadeId, EspecialidadeService $especialidadeService)
    {
        return new JsonResponse($especialidadeService->deletarPorId($especialidadeId), 204);
    }



}