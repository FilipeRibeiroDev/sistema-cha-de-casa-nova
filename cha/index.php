<?php

require_once './config.php';
require_once './database.php';

$itens = readItensDb($conn);

if (isset($_POST["responsavel"]) && isset($_POST["telefone"])){
	updateUserDb($conn, $_POST["id_produto"], $_POST["responsavel"], $_POST["telefone"]);
	header("Refresh:0");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chá de Casa Nova</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

 <script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");

	function modal(id){
		$("#id_produto").val(id);
		$("#myModal").show();
	}
    </script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100" style="overflow: auto;height: 506px;">
					<table style="background-color: whitesmoke !important">
						<thead>
							<tr class="table100-head">
								<th class="column1">Item</th>
								<th class="column1">Descrição</th>
								<th class="column1">Responsável</th>
								<th class="column1">Ação</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($itens as $row): ?>
								<tr>
									<td class="column1"><?=htmlspecialchars($row['item'])?></td>
									<td class="column1"><?=htmlspecialchars($row['descricao'])?></td>
									<td class="column1"><?=htmlspecialchars($row['responsavel'])?></td>
									<td class="column1">
										 <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" onclick="modal(<?=htmlspecialchars($row['id']) ?>)">Presentear</button>
									</td>
								</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
	
      <!-- Modal content-->

      <div class="modal-content" style="background-color: #1b1825;color: #fff;">
        <div class="modal-header">
          <h4 class="modal-title">Por favor, você só precisa informa os dados abaixo</h4>
        </div>
        	<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
        <div class="modal-body">
			<input type="hidden" class="form-control" id="id_produto" name="id_produto">
			<div class="form-group">
				<label for="usr">Nome:</label>
				<input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Nome">
			</div>
          	<div class="form-group">
				<label for="usr">Telefone:</label>
				<input type="text" class="form-control" placeholder="Telefone" id="telefone" name="telefone">
			</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
         </form>
      </div>


    </div>
  </div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>