/**
 * Created by Nandy on 7/14/15.
 */
(function () {
    var app = angular.module('SalesModule', []);
    app.controller("DashboardController", ["$scope", function ($scope) {
        this.todaysSalesSummary = {
            noOfTires: 0,
            noOfServices: 0,
            totalCost: 0
        };
        this.monthlySalesSummary = {
            noOfTires: 0,
            noOfServices: 0,
            totalCost: 0
        };

        for (var x in dailySales) {
            var sale = dailySales[x];
            for (var idx = 0; idx < sale.tires.length; idx++) {
                var tire = sale.tires[idx];
                this.todaysSalesSummary.noOfTires += tire.quantity;
                this.todaysSalesSummary.totalCost += tire.quantity * tire.price;
            }
            for (var idx = 0; idx < sale.services.length; idx++) {
                var service = sale.services[idx];
                this.todaysSalesSummary.noOfServices += service.quantity;
                this.todaysSalesSummary.totalCost += service.quantity * service.price;
            }
        }

        for (var x in monthlySales) {
            var sale = monthlySales[x];
            for (var idx = 0; idx < sale.tires.length; idx++) {
                var tire = sale.tires[idx];
                this.monthlySalesSummary.noOfTires += tire.quantity;
                this.monthlySalesSummary.totalCost += tire.quantity * tire.price;
            }
            for (var idx = 0; idx < sale.services.length; idx++) {
                var service = sale.services[idx];
                this.monthlySalesSummary.noOfServices += service.quantity;
                this.monthlySalesSummary.totalCost += service.quantity * service.price;
            }
        }
    }]);
    app.controller("SalesController", ["$scope", function ($scope) {
        this.records = sale;
        this.populateTiresData = function (data) {
            var tireNames = "", tireCost = 0;
            for (var x = 0; x < data.tires.length; x++) {
                tireNames += data.tires[x].quantity + "x" + data.tires[x].tire + ", ";
                tireCost += data.tires[x].price * data.tires[x].quantity;
            }
            return tireNames + "($" + tireCost + ")";
        };
        this.populateServicesData = function (data) {
            var serviceNames = "", servicesCost = 0;
            for (var x = 0; x < data.services.length; x++) {
                serviceNames += data.services[x].name + ", ";
                servicesCost += data.services[x].price * data.services[x].quantity;
            }
            return serviceNames + "($" + servicesCost + ")";
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
