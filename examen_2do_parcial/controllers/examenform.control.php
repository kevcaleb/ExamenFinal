<?php

/*game_id bigint UN AI PK 
game_name varchar(128) 
game_type char(3) 
game_brand varchar(45) 
game_console varchar(45) 
game_status char(3)*/

require_once "models/examendata.model.php";
function run()
{
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["game_id"] = 0;
    $viewData["game_name"] = "";
    $viewData["game_type"] = "ACC";
    $viewData["game_brand"] = "";
    $viewData["game_console"] = "";
    $viewData["game_status"] = "ACT";
    $viewData["game_type_ACC"] = "selected";
    $viewData["game_type_PZL"] = "";
    $viewData["game_type_ARC"] = "";
    $viewData["game_type_STG"] = "";
    $viewData["game_status_ACT"] = "selected";
    $viewData["game_status_INA"] = "";

    $viewData["readonly"] = "";
    $viewData["deletemsg"] = "";
    $viewData["xsstoken"] = "";

    $modedsc = array(
        "INS"=>"Nuevo Juego",
        "UPD"=>"Actualizar Juego %s",
        "DEL"=>"Eliminar Juego %s"
    );

    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["game_id"] = intval($_GET["game_id"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=examenlist");
            die();
        }
    }

    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST, $viewData);
        if(!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] = $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=examenlist");
            die();
        }
        switch ($viewData["mode"]){
            case "INS":
                $result = insertGame($viewData["game_name"],
                $viewData["game_type"],
                $viewData["game_brand"],
                $viewData["game_console"],
                $viewData["game_status"]
            );
            if($result > 0){
                redirectWithMessage("Guardado Exitosamente", "index.php?page=examenlist");
            }
            break;
            case "UPD":
                $result = updateGame($viewData["game_name"],
                $viewData["game_type"],
                $viewData["game_brand"],
                $viewData["game_console"],
                $viewData["game_status"],
                $viewData["game_id"]
            );
            if($result >= 0){
                redirectWithMessage("Actualizado Exitosamente", "index.php?page=examenlist");
            }
            break;
            case 'DEL':
                $result = deleteGame($viewData["game_id"]);
                if($result > 0){
                    redirectWithMessage("Eliminado Exitosamente", "index.php?page=examenlist");
                    die();
                }
            break;
        }
    }

    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }else{
        $gameDBData = getGameId($viewData["game_id"]);
        mergeFullArrayTo($gameDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["game_name"]);
        $viewData["game_type_ACC"] = ($viewData["game_type"]=="ACC")?"selected":"";
        $viewData["game_type_PZL"] = ($viewData["game_type"]=="PZL")?"selected":"";
        $viewData["game_type_ARC"] = ($viewData["game_type"]=="ARC")?"selected":"";
        $viewData["game_type_STG"] = ($viewData["game_type"]=="STG")?"selected":"";
        $viewData["game_status_ACT"] = ($viewData["game_status"]=="ACT")?"selected":"";
        $viewData["game_status_INA"] = ($viewData["game_status"]=="INA")?"selected":"";
        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
        }
        if($viewData["mode"] == 'DEL'){
            $viewData["deletemsg"] = "Desea Eliminar este juego.";
        }
    }
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];


    renderizar("examenform", $viewData);
}

run();
?>
