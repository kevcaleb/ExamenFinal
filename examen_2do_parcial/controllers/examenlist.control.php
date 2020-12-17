<?php

require_once "models/examendata.model.php";
function run()
{
    $viewData = array();
    $viewData["cln_txtfilter"] = "";
    if(isset($_SESSION["cln_txtfilter"])){
        $viewData["cln_txtfilter"] = $_SESSION["cln_txtfilter"];
    }

    if(isset($_POST["btnFiltrar"])){
        mergeFullArrayTo($_POST, $viewData);
        $_SESSION["cln_txtfilter"] = $viewData["cln_txtfilter"];
    }
    if($viewData["cln_txtfilter"] === ""){
        $viewData["games"] = getAllGame();
    }
    else{
        $viewData["games"] =getGamesForFiltro($viewData["cln_txtfilter"]);
    }


    renderizar("examenlist", $viewData);
}

run();
?>