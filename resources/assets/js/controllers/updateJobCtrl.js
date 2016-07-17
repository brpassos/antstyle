clanApp.controller('alterarJobCtrl', ['$scope', '$http', function($scope, $http){

    $scope.processandoSalvar = false;


    //ALTERAR/////////////////////////////
    $scope.mostrarForm = false;

    $scope.alterar = function (){
        $scope.processandoSalvar = true;
        console.log($scope.job);
        $http.post("/alterar-job/"+$scope.id, $scope.job).success(function (data){
            console.log(data);
            $scope.processandoSalvar = false;
            $scope.mensagemSalvar = data;
        }).error(function(data){
            console.log(data);
            $scope.mensagemSalvar = "Ocorreu um erro: "+data;
            $scope.processandoSalvar = false;
        });
    };

    $scope.validar = function(valor) {
        if(valor===undefined && $scope.form.$dirty){
            return "campo-obrigatorio";
        }
        return "";
    };
    /////////////////////////////////


}]);
