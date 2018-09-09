let con2 = angular.module('con2', []);

con2.controller('newCtrl2', function ($scope) {
    $scope.people = [
        {name: 'John', age: '21', skill: 'angularjs', salary: '500000'},
        {name: 'Febrina', age: '25', skill: 'bootstrap', salary: '200000'},
        {name: 'Anjar', age: '22', skill: 'PHP', salary: '300000'},
        {name: 'Endy', age: '23', skill: 'HTML5', salary: '400000'},
        {name: 'Apud', age: '24', skill: 'JavaScript', salary: '700000'},
    ];

});