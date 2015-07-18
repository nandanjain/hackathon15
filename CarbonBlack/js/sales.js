/**
 * Created by Nandy on 7/14/15.
 */
(function () {
    var app = angular.module('SalesModule', []);
    app.controller("SalesController", ["$scope", function ($scope) {
        this.records = sale;

        this.setData = function (data) {
            this.records = data;
        };
        this.getData = function () {
            return this.records;
        };
    }]);
})();