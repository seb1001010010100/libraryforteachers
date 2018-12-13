var app = angular.module('linkedlists', []);

app.controller('mediumsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.mediums = response.data;
    });
});
