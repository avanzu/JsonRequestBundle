<?php

namespace Avanzu\JsonRequestBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent; 
use Webistu\CommonBundle\Controller\JsonAcceptingController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of JsonRequestListener
 *
 * @author avanzu
 */
class JsonRequestListener {
    
    
    
    public function onKernelController(FilterControllerEvent $event) {

        $controller = $event->getController(); 
        
        if (!is_array($controller)) {
            return;
        }

        if ($controller[0] instanceof JsonAcceptingController) {
            $this->convertRequest($event->getRequest());
        }
    }
    
    protected function convertRequest(Request $request) {        
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());
        }

    }
    
}