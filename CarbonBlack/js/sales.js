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

        for (var x = 1; x < dailySales.length; x++) {
            var sale = dailySales[x].splice(",");
            this.todaysSalesSummary.noOfTires += sale[2];
            this.todaysSalesSummary.noOfServices += sale[4] ? sale[4].split(' ').length - 1 : 0;
            this.todaysSalesSummary.totalCost += sale[6];
        }

        for (var x = 1; x < monthlySales.length; x++) {
            var sale = monthlySales[x].splice(",");

            this.monthlySalesSummary.noOfTires += sale[2];

            this.monthlySalesSummary.noOfServices += sale[4] ? sale[4].split(' ').length - 1 : 0;
            this.monthlySalesSummary.totalCost += sale[6];
        }
    }]);
    app.controller("SalesController", ["$scope", function ($scope) {
        this.records = sale;
        this.populateTiresData = function (data) {
            var tireNames = "", tireCost = 0;
            for (var x = 0; x < data.tires.length; x++) {
                var tireObj = data.tires[x];
                tireNames += tireObj.quantity + "x" + tireObj.tire + ", ";
                tireCost += parseFloat(tireObj.price * tireObj.quantity);
            }
            return tireNames + "($" + tireCost + ")";
        };
        this.populateServicesData = function (data) {
            var serviceNames = "", servicesCost = 0;
            for (var x = 0; x < data.services.length; x++) {
                var service = data.services[x];
                serviceNames += service.name + ", ";
                servicesCost += parseFloat(service.price * service.quantity);
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
