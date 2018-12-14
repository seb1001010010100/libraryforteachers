var app = angular.module('app', []);
app.service('AuthorCRUDService', [ '$http', function($http) {

    this.getAuthor = function getAuthor(authorId) {
        return $http({
            method : 'GET',
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
            url : 'authors/view/' + authorId
        });
    }

    this.addAuthor = function addAuthor(first_name, surname) {
      return $http({
          method : 'POST',
          url : 'authors/add/',
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
          data : {
              first_name : first_name,
              surname: surname
          }
      });
    }
    this.updateAuthor = function updateAuthor(id, first_name, surname) {
      return $http({
          method : 'PATCH',
          url : 'authors/edit/' + id,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
          data : {
              first_name : first_name,
              surname: surname
          }
      });
    }
    this.deleteAuthor = function deleteAuthor(id) {
      return $http({
          method : 'DELETE',
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
          url : 'authors/delete/' + id
      })
    }
    this.getAllAuthors = function getAllAuthors() {
      return $http({
          method : 'GET',
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
          url : 'authors/all/'
      });
    }
} ]);
app.controller('AuthorCRUDCtrl', ['$scope','AuthorCRUDService',
  function ($scope,AuthorCRUDService) {
      $scope.getAuthor = function () {
          var id = $scope.author.id;
          AuthorCRUDService.getAuthor($scope.author.id)
            .then(function success(response) {

                $scope.author = response.data.author;
                $scope.author.id = id;
                $scope.message='';
                $scope.errorMessage = '';
            },
            function error (response) {
                $scope.message = '';
                if (response.status === 404){
                    $scope.errorMessage = 'Author not found!';
                }
                else {
                    $scope.errorMessage = "Error getting author!";
                }
            });
      };
      $scope.addAuthor = function () {
        if ($scope.author != null && $scope.author.first_name) {
            AuthorCRUDService.addAuthor($scope.author.first_name, $scope.author.surname)
              .then (function success(response){
                  $scope.message = 'Author added!';
                  $scope.errorMessage = '';
              },
              function error(response){
                  $scope.errorMessage = 'Error adding author!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a first_name!';
            $scope.message = '';
        }
    }
    $scope.updateAuthor = function () {
        AuthorCRUDService.updateAuthor($scope.author.id,
          $scope.author.first_name, $scope.author.surname)
          .then(function success(response) {
              $scope.message = 'Author data updated!';
              $scope.errorMessage = '';
          },
          function error(response) {
              $scope.errorMessage = 'Error updating author!';
              $scope.message = '';
          });
    }

    $scope.deleteAuthor = function () {
        AuthorCRUDService.deleteAuthor($scope.author.id)
          .then (function success(response) {
              $scope.message = 'Author deleted!';
              $scope.Author = null;
              $scope.errorMessage='';
          },
          function error(response) {
              $scope.errorMessage = 'Error deleting author!';
              $scope.message='';
          });
    }
    $scope.getAllAuthors = function () {
        AuthorCRUDService.getAllAuthors()
          .then(function success(response) {
              $scope.authors = response.data.authors;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response) {
              $scope.message='';
              $scope.errorMessage = 'Error getting authorss!';
          });
    }
}]);
