<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.

function getAllGame(){
    $sqlstr = "SELECT * FROM games;";
    $resulSet = array();
    $resulSet = obtenerRegistros($sqlstr);
    return $resulSet;

}

function getGamesForFiltro($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM games where game_id LIKE %d Or game_name LIKE '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function getGameId($game_id){
    $sqlstr = "SELECT * from games where game_id = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $game_id));
}

function insertGame($game_name,$game_type,$game_brand,$game_console,$game_status){
    $sql ="INSERT INTO `games`(`game_name`,`game_type`,`game_brand`,`game_console`,`game_status`)VALUES('%s', '%s','%s','%s','%s');";

    return ejecutarNonQuery(
        sprintf(
            $sql,
            $game_name,
            $game_type,
            $game_brand,
            $game_console,
            $game_status
        )
        );
}

function updateGame($game_name,$game_type,$game_brand,$game_console,$game_status,$game_id){
    $sql = "UPDATE `games`SET `game_name` = '%s',`game_type` = '%s',`game_brand` = '%s',`game_console` = '%s',`game_status` = '%s'WHERE `game_id` = '%d';";


        return ejecutarNonQuery(
                sprintf(
                    $sql,
                    $game_name,
                    $game_type,
                    $game_brand,
                    $game_console,
                    $game_status,
                    $game_id
                )
                );

}

function deleteGame($game_id){
    return ejecutarnonQuery(sprintf("DELETE from games where game_id = '%d';", $game_id));
}


?>
