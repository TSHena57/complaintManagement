$(function () {
    "use strict";

    // chart 1
    var options = {
          series: [{
        name: "Data",
        data: [90, 50, 80, 75] 
    }],
        chart: {
        foreColor: '#9a9797',
        type: "bar",
        height: 320,
        toolbar: { show: false },
        zoom: { enabled: false },
        dropShadow: {
            enabled: false
        },
        sparkline: { enabled: false }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "25%", 
            distributed: true,  
            endingShape: "flat"
        }
    },
        legend: {
            show: false,
            position: 'top',
            horizontalAlign: 'left',
            offsetX: -20
        },
        dataLabels: {
            enabled: !1
        },
        grid: {
            show: true,
            borderColor: '#eee',
            strokeDashArray: 4,
        },
        stroke: {
            colors: ["transparent"],
            show: !0,
            width: 5,
            curve: "smooth"
        },
        colors: ["#5C3E94","#3461ff", "#12bf24", "#9E1C60"], // match previous chart
        xaxis: {
            categories: ["Leadership", "Staff", "Intelligence", "Cooperation"], // 4 labels
            labels: {
                style: {
                    colors: '#666',
                    fontSize: '13px'
                }
            }
        },

        tooltip: {
            theme: 'dark',
            y: {
                formatter: function (val) {
                    return "" + val + ""
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();


    // Peity

    $('.donut').peity('donut')


});