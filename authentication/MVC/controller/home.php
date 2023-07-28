<?php

    class homeController{
        private $obj;
        function __construct()
        {
            include('model/home.php');
            $this->obj = new homeModel();
        }

        function home(){
            $arr = $this->obj->page(1);
            // print_r($arr);
            // die;
            include('view/header.php');
            include('view/page.php');                                                                                                                                                                       
            include('view/footer.php');
        }

        function about(){
            $arr = $this->obj->page(2);
            include('view/header.php');
            include('view/page.php');
            include('view/footer.php');
        }

        function contact(){
            $arr = $this->obj->page(5);
            include('view/header.php');
            include('view/page.php');
            include('view/footer.php');
        }

    }

    // $tst = new homeController();

    // $tst->home();

    

    // $test = new homeController();

    // $output = $test->home();

    // echo $output;
?>