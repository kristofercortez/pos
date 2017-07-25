<?php

namespace Gist\POSBundle\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gist\TemplateBundle\Model\BaseController as Controller;

class POSController extends Controller
{
    public function indexAction()
    {
    	$this->title = 'Dashboard';
        $params = $this->getViewParams('', 'gist_dashboard_index');

        $params['indiv_options'] = array(
            'none' => 'None',
            'gift' => 'Gift/Free',
            '40p' => '40% Discount',
            'chg' => 'Change of Price'
        );

        $params['bulk_options'] = array(
            '1' => 'Gift',
            '2' => 'Discount Amount',
            '3' => 'Discount',
            '4' => 'Amount to Pay'
        );

        return $this->render('GistPOSBundle:Dashboard:index.html.twig', $params);
    }

    public function landingAction()
    {
    	$this->title = 'Dashboard';
        $params = $this->getViewParams('', 'gist_dashboard_index');

        

        return $this->render('GistPOSBundle:Dashboard:main.html.twig', $params);
    }
}
