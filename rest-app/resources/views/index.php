<!DOCTYPE html>
<html ng-app="cdg">
<head>
	<title>Usuarios</title>
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">

	<script type="text/javascript" src="node_modules/jquery/jquery.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

	<!-- Angular -->
	<script type="text/javascript" src="node_modules/angular/angular.js"></script>

	<!-- App -->
	<script type="text/javascript" src="app/app.js"></script>
</head>
<body ng-controller="usuarioController">
	<div class="container" ng-init="listar()">
		<div class="row">
			<div class="col-md-12">
				<h1>Usuarios</h1>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Novo Usuario</button>
			</div>
			<div class="col-md-6">
				<input class="form-control" ng-model="pesquisar">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Senha</th>
							<th>Data Nasc</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="usuario in usuarios | filter: pesquisar">
							<td>{{usuario.id}}</td>
							<td>{{usuario.nome}}</td>
							<td>{{usuario.email}}</td>
							<td>{{usuario.senha}}</td>
							<td>{{usuario.datanasc}}</td>
							<td>
								<button class="btn btn-info btn-xs" ng-click="editar(usuario)">Editar</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Cadastro do Usuario</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nome:</label>
						<input type="text" class="form-control" ng-model="usuario.nome">
					</div>
					<div class="form-group">
						<label>E-mail:</label>
						<input type="text" class="form-control" ng-model="usuario.email">
					</div>
					<div class="form-group">
						<label>Senha:</label>
						<input type="text" class="form-control" ng-model="usuario.senha">
					</div>
					<div class="form-group">
						<label>Data Nasc:</label>
						<input type="text" class="form-control" ng-model="usuario.datanasc">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" ng-click="usuario = {}">Cancelar</button>
					<button type="button" class="btn btn-primary" ng-click="salvar()">Salvar</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>