<h1>{{modedsc}}</h1>
<selection>
    <form method="POST" action="index.php?page=examenform&mode={{mode}}&game_id={{game_id}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="game_id" value="{{game_id}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
        <label for="game_name">Nombre del Juego: </label>
        <input {{readonly}} type="text" name="game_name" id="game_name" value="{{game_name}}" placeholder="Nombre del Juego"/>
        </div>
        <div>
        <label for="game_type">Tipo: </label>
        <select name="game_type" id="game_type" {{readonly}}>
            <option value="ACC" {{game_type_ACC}}>Accion</option>
            <option value="PZL" {{game_type_PZL}}>Puzzle</option>
            <option value="ARC" {{game_type_ARC}}>Arcade</option>
            <option value="STG" {{game_type_STG}}>Estrategia</option>
        </select>
        </div>
        <div>
        <label for="game_brand">Marca: </label>
        <input {{readonly}} type="text" name="game_brand" id="game_brand" value="{{game_brand}}" placeholder="Marca"/>
        </div>
        <div>
        <label for="game_console">Consola: </label>
        <input {{readonly}} type="text" name="game_console" id="game_console" value="{{game_console}}" placeholder="Consola"/>
        </div>
        <div>
        <label for="game_status">Estado: </label>
        <select name="game_status" id="game_status" {{readonly}}>
            <option value="ACT" {{game_status_ACT}}>Activo</option>
            <option value="INA" {{game_status_INA}}>Inactivo</option>
        </select>
        </div>
        {{if deletemsg}}
            <div class="alert">
                {{deletemsg}}
            </div>
        {{endif deletemsg}}
    <button id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
    <button id="btncancelar">Cancelar</button>
    </form>
</selection>
<script>
    $().ready(function(){
        $("#btncancelar").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=examenlist");
        });
    });
</script>
