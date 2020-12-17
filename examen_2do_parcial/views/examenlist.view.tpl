<h1>Listado de Datos</h1>
<hr/>
<table style="width:80%; margin:0px auto;">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre Juego</th>
      <th>Tipo</th>
      <th>Marca</th>
      <th>Consola</th>
      <th>Estado</th>
      <th>
        <a class="btn depth-1 s-margin" href="index.php?page=examenform&mode=INS&game_id=0"><span class="ion-plus-circled"></span></a><br/>
      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach games}}
    <tr>
      <td>{{game_id}}</td>
      <td>{{game_name}}</td>
      <td>{{game_type}}</td>
      <td>{{game_brand}}</td>
      <td>{{game_console}}</td>
      <td>{{game_status}}</td>
        <td class="center">
        <a class="btn depth-1 s-margin" href="index.php?page=examenform&mode=UPD&game_id={{game_id}}"><span class="ion-edit"></span></a>
        <a class="btn depth-1 s-margin" href="index.php?page=examenform&mode=DEL&game_id={{game_id}}"><span class="ion-trash-a"></span></a>
        </td>
    </tr>
    {{endfor games}}
  </tbody>
</table>
