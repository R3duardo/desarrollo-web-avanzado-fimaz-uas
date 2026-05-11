<?php
// Eduardo Montes de Oca Zatarain
    require_once("../../controllers/torneosController.php");
    $objTorneosController = new torneosController();
    //Obtener el id desde el botón que mandará eliminar el registro.
    //Lo obtendremos de la pantalla del listado general de torneos.
    $objTorneosController->delete($_GET['id']);

?>