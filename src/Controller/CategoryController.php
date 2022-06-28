<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
	/**
	 * @Route("/category", name="app_category")
	 */
	public function index(): JsonResponse
	{
		return $this->json([
			'message' => 'Welcome to your new controller!',
			'path' => 'src/Controller/CategoryController.php',
		]);
	}
	/**
	 * @[Rest\Get('/products/{id}', name: "app_product_show")]
	 * @[Rest\View]
	 * @[ParamConverter("product", null, converter: "fos_rest.request_body")]
	 */
	public function viewProduct($id, ManagerRegistry $doctrine)
	{
		$entityManager = $doctrine->getManager();

		$data = $entityManager->getRepository(Product::class)->find($id);

		return $data;
	}
}
