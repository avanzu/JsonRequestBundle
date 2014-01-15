JsonRequestBundle
-----------------
A symfony2 bundle that converts json request bodies into regular request parameters. 

Usage
-----
After installing the Bundle, you just have to use the JsonAcceptingController interface with any controller that should be able to work with json request bodies. 

    // ...
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Avanzu\JsonRequestBundle\Controller\JsonAcceptingController;
    
    class MyController extends Controller implements JsonAcceptingController {
    
        // ... your controller code 
    
    }
