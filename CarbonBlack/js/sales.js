/**
 * Created by Nandy on 7/14/15.
 */
(function () {
    var app = angular.module('SalesModule', []);
    app.controller("SalesController", ["$scope", function ($scope) {
        this.records = sale;
    }]);
    app.controller("InventoryController", ["$scope", function ($scope) {
        this.records = inventory;
    }]);
    app.controller("HistoryController", ["$scope", function ($scope) {
        this.records = historyData;
    }]);
})();