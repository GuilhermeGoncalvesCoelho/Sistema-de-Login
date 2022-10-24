<script src="https://kit.fontawesome.com/aa9f4da7e4.js" crossorigin="anonymous"></script>
<h1><i class="fa-solid fa-users"></i>Listar Usuário</h1>
<?php
	$sql = "SELECT * FROM usuarios";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table style='background-color:#cdf0ff8f;'class='table  table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>E-mail</th>";
		print "<th>Tipo</th>";
		print "<th>Status</th>";
		print "<th>Ações</th>";
		print "</tr>";		
		while($row = $res->fetch_object()){
			if($row->tipo=='1'){
				$tipo = 'Administrador';
			}else{
				$tipo = 'Usuário Comum';
			}
			if($row->status=='1'){
				$status = 'Ativo';
			}else{
				$status = 'Inativo';
			}
			print "<tr>";
			print "<td>".$row->id."</td>";
			print "<td>".$row->nome."</td>";
			print "<td>".$row->email."</td>";
			print "<td>".$tipo."</td>";
			print "<td>".$status."</td>";
			print "<td>
						<button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-primary'><i class=\"fa-solid fa-pencil\"></i> Editar</button>

						<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='btn btn-danger'><i class=\"fa-solid fa-trash\"></i> Excluir</button>
				   </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Não encontrou resultados";
	}

