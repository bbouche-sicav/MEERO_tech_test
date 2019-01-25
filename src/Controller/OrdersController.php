<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DomCrawler\Crawler;
use App\Entity\Orders;

class OrdersController extends AbstractController
{
    /**
     * @Route("/orders/", name="orders")
     */
    public function index()
    {
        return $this->render('orders/index.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
    
    public function import()
    {
        
        $orders = array();
                        
        // Market Place
            $crawler = new Crawler(file_get_contents("import/orders-test.xml"));
            $crawler = $crawler->filter('statistics > orders > order > marketplace');
            foreach ( $crawler as $i => $domElement) {
                $orders[$i]['marketplace'] = $domElement->nodeValue;
            }
        
        // order_purchase_date
            $crawler = new Crawler(file_get_contents("import/orders-test.xml"));
            $crawler = $crawler->filter('statistics > orders > order > order_purchase_date');
            foreach ( $crawler as $i => $domElement) {
                $orders[$i]['order_purchase_date'] = $domElement->nodeValue;
            }
        
        // order_purchase_heure
            $crawler = new Crawler(file_get_contents("import/orders-test.xml"));
            $crawler = $crawler->filter('statistics > orders > order > order_purchase_heure');
            foreach ( $crawler as $i => $domElement) {
                $orders[$i]['order_purchase_heure'] = $domElement->nodeValue;
            }
            
        // order_amount
            $crawler = new Crawler(file_get_contents("import/orders-test.xml"));
            $crawler = $crawler->filter('statistics > orders > order > order_amount');
            foreach ( $crawler as $i => $domElement) {
                $orders[$i]['order_amount'] = $domElement->nodeValue;
            }
            
        // order_tax
            $crawler = new Crawler(file_get_contents("import/orders-test.xml"));
            $crawler = $crawler->filter('statistics > orders > order > order_tax');
            foreach ( $crawler as $i => $domElement) {
                $orders[$i]['order_tax'] = $domElement->nodeValue;
            }

            // Insert Order
                // Here a test for not insert line before inserted is needed
                $entityManager = $this->getDoctrine()->getManager();

            foreach( $orders as $ooo){
                $order = new Orders();
                $order->setMarketplace( $ooo['marketplace'] );
                $order->setOrderPurchaseDate( $ooo['order_purchase_date'] );
                $order->setOrderPurchaseHeure( $ooo['order_purchase_heure'] );
                $order->setOrderAmount( $ooo['order_amount'] );
                $order->setOrderTax( $ooo['order_tax'] );

                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($order);

                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
            }
        exit;
        return $this->render('orders/import.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
    
    public function viewAll()
    {
        return $this->render('orders/viewAll.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
    
    public function viewFromID()
    {
        return $this->render('orders/view.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
}
