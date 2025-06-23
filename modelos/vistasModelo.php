<?php 

    class vistasModelo{
        
        /*-----------Modelo para obtener Vistas --------------------------*/
        protected static function obtener_vistas_modelo($vistas){
            $listaBlanca=["home","client","clientNew","clientSearch","clientUpdate","itemList","itemNew","itemSearch",
        "itemUpdate","userList","userNew","userSearch","userUpdate","cajaNew","cajaList","cajaSearch","cajaUpdate","homeProduction",
        "ordProductionList","ordProductionNew","ordProductionSearch","ordProductionUpdate","ProductionList","ProductionNew",
        "ProductionSearch","ProductionUpdate","detProductionList","detProductionNew","detProductionSearch","detProductionUpdate",
        "salProductionList","salProductionNew","salProductionSearch","salProductionUpdate","homeReferencias","personalList",
        "personalNew","personalSearch","personalUpdate","matPrimaList","matPrimaNew","matPrimaSearch","matPrimaUpdate","etapProductionList",
        "etapProductionNew","etapProductionSearch","etapProductionUpdate","presentacionList","presentacionNew","presentacionSearch",
        "presentacionUpdate","nivelCalidadList","nivelCalidadNew","nivelCalidadSearch","nivelCalidadUpdate","loteList","loteNew","loteSearch","loteUpdate",
        "categoriaList","categoriaNew","categoriaSearch","categoriaUpdate","homeVentas","formaPagoList","formaPagoNew","formaPagoSearch","formaPagoUpdate",
        "direccionList","direccionNew","direccionSearch","direccionUpdate","timbradoList","timbradoNew","timbradoSearch","timbradoUpdate"];

            if (in_array($vistas, $listaBlanca)) {
                if (is_file("./vistas/contenidos/".$vistas."-view.php")) {
                    $contenido="./vistas/contenidos/".$vistas."-view.php";
                }else {
                    $contenido="404";
                }
            }elseif($vistas=="login" || $vistas=="index"){
                $contenido="login";
            }else {
                $contenido="404";
            } 
            return $contenido;
        }
    }    