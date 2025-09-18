<?php

namespace App\Controller\admin;

use App\Entity\ProductPropertyValue;
use App\Form\ProductPropertyValueType;
use App\Repository\ProductPropertyValueRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/product-property-value')]
final class ProductPropertyValueController extends AbstractController
{
    #[Route('/{productId}', name: 'app_admin_product_property_value_index', methods: ['GET'])]
    public function index(ProductPropertyValueRepository $productPropertyValueRepository, int $productId, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($productId);

        return $this->render('admin/product_property_value/index.html.twig', [
            'product_property_values' => $productPropertyValueRepository->findBy(['product' => $productId]),
            'product' => $product,
        ]);
    }

    #[Route('{productId}/new', name: 'app_admin_product_property_value_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, int $productId, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($productId);

        $productPropertyValue = new ProductPropertyValue();
        $form = $this->createForm(ProductPropertyValueType::class, $productPropertyValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($productPropertyValue);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_product_property_value_index', ['productId' => $productId], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/product_property_value/new.html.twig', [
            'product_property_value' => $productPropertyValue,
            'form' => $form,
            'product' => $product,
        ]);
    }

    #[Route('{productId}/{id}/edit', name: 'app_admin_product_property_value_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProductPropertyValue $productPropertyValue, EntityManagerInterface $entityManager, int $productId, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($productId);

        $form = $this->createForm(ProductPropertyValueType::class, $productPropertyValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_product_property_value_index', ['productId' => $productId], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/product_property_value/edit.html.twig', [
            'product_property_value' => $productPropertyValue,
            'form' => $form,
            'product' => $product,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_product_property_value_delete', methods: ['POST'])]
    public function delete(Request $request, ProductPropertyValue $productPropertyValue, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productPropertyValue->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($productPropertyValue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_product_property_value_index', [], Response::HTTP_SEE_OTHER);
    }
}
