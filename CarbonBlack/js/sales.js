/**
 * Created by Nandy on 7/14/15.
 */
(function () {
    var app = angular.module('SalesModule', []);
    app.controller("SalesController", ["$scope", function ($scope) {
        //this.originalSaleData = sale;
        //alert("Sales Controller : " + sale.tires);
        this.records = sale;

        this.populateTiresData = function (data) {
            //var temp = data;
            //temp.tires = !data.tires || data.tires.length === 0 ? {names: 'N/A'} : (function () {
            var tireNames = "", tireCost = 0;
            for (var x = 0; x < data.tires.length; x++) {
                tireNames += data.tires[x].tire + ", ";
                tireCost += parseFloat(data.tires[x].price);
            }
            //return {names: tireNames, cost: tireCost};
            return tireNames;
            //})();
        };
        this.populateServicesData = function (data) {
            //var temp = data;
            //temp.services = !data.services || data.services.length === 0 ? {names: 'N/A'} : (function () {
            var serviceNames = "", servicesCost = 0;
            for (var x = 0; x < data.services.length; x++) {
                serviceNames += data.services[x].name + ", ";
                servicesCost += parseFloat(data.services[x].price);
            }
            //return {names: serviceNames, cost: servicesCost};
            return serviceNames;
            //})();
        };
    }]);
    app.controller("InventoryController", ["$scope", function ($scope) {
        this.records = inventory;
    }]);
    app.controller("HistoryController", ["$scope", function ($scope) {
        this.records = historyData;
    }]);
    app.controller("TabController", function () {
        this.tab = 0;
        this.isSet = function (tabIdx) {
            return this.tab === tabIdx;
        };
        this.setTab = function (tabIdx) {
            this.tab = tabIdx;
        };
    })
})();
