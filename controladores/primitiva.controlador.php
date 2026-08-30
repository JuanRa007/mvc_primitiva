<?php


class ControladorPrimitiva{

    // Propiedades de la clase
     public array $mis_apuestas = [];
     public string $reg_fecha;
     public string $reg_numfijo;
     public string $reg_numfijor;
     public string $reg_numvari;
     public string $reg_numvarir;
     public string $reg_euromillon;
     public string $reg_euroruno;
     public string $reg_eurordos;
     public string $reg_otros;
     public string $reg_euromillon1;
     public string $reg_euroruno1;
     public string $reg_eurordos1;
     public string $reg_numvari1;
     public string $reg_numvari1r;
     public string $reg_premio;
     public string $reg_marvie;
     public string $reg_primitresdias;
     public string $reg_primivaritresdias;





    public function prepara_primtiva_fija(){

        // Incializar variable a devolver.
        $apuesta_fija = [];
        $imp_premio = 0;

        
        $imp_premio = number_format(sprintf("%01.2f", $this->reg_premio), 2, ',', '.');
    
    





        return $apuesta_fija;

    }

}