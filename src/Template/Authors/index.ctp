<?php
  echo $this->Html->script('Authors/app');
?>

<html ng-app="app">
  <div ng-controller="AuthorCRUDCtrl">
    <table>
        <span>
            <input type="text" id="message" ng-model="message" />
        </span>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="author.id" /></td>
        </tr>
        <tr>
            <td width="100">First Name:</td>
            <td><input type="text" id="first_name" ng-model="author.first_name" /></td>
        </tr>
        <tr>
            <td width="100">Surname:</td>
            <td><input type="text" id="surname" ng-model="author.surname" /></td>
        </tr>
    </table>
    <a ng-click="getAuthor(author.id)">Get Author</a>
    <a ng-click="updateAuthor(author.id,author.first_name,author.surname)">Update Author</a>
    <a ng-click="addAuthor(author.first_name,author.surname)">Add Author</a>
    <a ng-click="deleteAuthor(author.id)">Delete Author</a>
    <a ng-click="getAllAuthors()">Get all Authors</a><br/><br/>
    <div ng-repeat="auts in authors">
    {{auts.first_name}} {{auts.surname}}
  </div>
</html>
