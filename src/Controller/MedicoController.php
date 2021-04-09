<?php

namespace App\Controller;

use App\Service\MedicoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class MedicoController
 * @package App\Controller
 *
 * @Route("/medico")
 */
class MedicoController extends AbstractController
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
    public function novoMedico(Request $request, MedicoService $medicoService) : Response
    {
        $dados = $request->getContent();

        return new JsonResponse($medicoService->criarMedico(json_decode($dados)));
    }

    /**
     * @param MedicoService $medicoService
     * @return JsonResponse
     *
     * @Route("/buscar", methods={"GET"})
     *
     */
    public function buscarTodos(MedicoService $medicoService)
    {
        return new JsonResponse($medicoService->buscarTodosMedicos());
    }

    /**
     *
     * @param $medicoId
     * @param MedicoService $medicoService
     * @return JsonResponse
     *
     * @Route("/buscar/{medicoId}", methods={"GET"})
     *
     */
    public function buscarPorId($medicoId, MedicoService $medicoService)
    {
        return new JsonResponse($medicoService->buscarPorId($medicoId));
    }

    /**
     * @param Request $request
     * @param MedicoService $medicoService
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route("/atualizar", methods={"PUT"})
     */
    public function atualizarMedico(Request $request, MedicoService $medicoService) : Response
    {
        $dados = $request->getContent();

        return new JsonResponse($medicoService->atualizarPorId(json_decode($dados)));
    }

    /**
     * @param $medicoId
     * @param MedicoService $medicoService
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route("/deletar/{medicoId}", methods={"DELETE"})
     */
    public function deletarPorId($medicoId, MedicoService $medicoService)
    {
        return new JsonResponse($medicoService->deletarPorId($medicoId), 204);
    }



}