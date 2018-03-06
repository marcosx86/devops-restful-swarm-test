'use strict';
var app = angular.module('cdg',[]);

// Service
app.factory('usuarioService', ['$http', function($http) {
	return {
		lista: function(){
			return $http.get('/api/usuarios');
		},
		cadastra: function(data){
			return $http.post('/api/usuarios', data);
		},
		edita: function(data){
			var id = data.id;
			delete data.id;
			return $http.put('/api/usuario/'+id, data);
		},
		exclui: function(id){
			return $http.delete('/api/usuario/'+id)
		}
	}
}]);

// Controller
app.controller('usuarioController', function($scope, usuarioService) {
	$scope.listar = function(){
            	usuarioService.lista().then(function(response){
			$scope.usuarios = response.data;
		});
	}

	$scope.editar = function(data){
		$scope.usuario = data;
		$('#myModal').modal('show');
	}

	$scope.salvar = function(){
		if($scope.usuario.id){
			usuarioService.edita($scope.usuario).then(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}else{
			usuarioService.cadastra($scope.usuario).then(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}
	}
});