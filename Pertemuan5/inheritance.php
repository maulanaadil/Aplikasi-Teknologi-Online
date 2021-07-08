<?php

class Sesuatu {
    public $public = "isi public";
    protected $protected = "isi protected";
    private  $private = "isi private";

    public function func_public()
    {
        echo "Function Public<br>";
    }

    protected function func_protected()
    {
        echo "Function Protected<br>";
    }

    private function func_private()
    {
        echo "Functtion Pricate<br>";
    }
}

class SubSesuatu extends Sesuatu {
    public function showProperti() {
        echo "Public : ". $this->public ."<br>";
        echo "Protected : ". $this->protected ."<br>";

        /*
         * Propherti tidak dikenal pada childClass
         */
//        echo "Private : ". $this->private ."<br>";
    }

    public function showMethod() {
        $this->func_public();
        $this->func_protected();
        /*
         * Method tidak dikenal pada childClass
         */
//        $this->func_private();
    }
}

$object = new SubSesuatu();
$object->showProperti();
$object->showMethod();
