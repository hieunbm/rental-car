/* syncing charts */
Apex = {
    chart: {
        height: 160,
    },
    dataLabels: {
        enabled: false
    },
    markers: {
        size: 6,
        hover: {
            size: 10
        }
    },
    yaxis: {
        tickAmount: 2
    },
}
var options = {
    series: [{
        name: "Collected",
        data: Object.values(totalAmountByDay7Days)
    }],
    chart: {
        type: 'line',
        height: 160,
        zoom: {
            enabled: false
        }
    },
    stroke: {
        curve: 'straight',
        width: 3,
    },
    colors: ['#845adf'],
    grid: {
        borderColor: '#f2f5f7',
    },
    title: {
        text: 'Revenue 7 Days Ago',
        align: 'left',
        style: {
            fontSize: '14px',
            fontWeight: 'bold',
            color: 'black'
        },
    },
    xaxis: {
        categories: Object.keys(totalAmountByDay7Days),
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    yaxis: {
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        }
    }
};
var chart = new ApexCharts(document.querySelector("#chart-line"), options);
chart.render();

var optionsLine2 = {
    series: [{
        name: "Number Of Rentals",
        data: Object.values(successfulRentalsByDay7Days)
    }],
    chart: {
        type: 'line',
        height: 160,
        zoom: {
            enabled: false
        }
    },
    stroke: {
        curve: 'straight',
        width: 3,
    },
    colors: ['#23b7e5'],
    grid: {
        borderColor: '#f2f5f7',
    },
    title: {
        text: 'Rentals Successfully',
        align: 'left',
        style: {
            fontSize: '14px',
            fontWeight: 'bold',
            color: 'black'
        },
    },
    xaxis: {
        categories: Object.keys(totalAmountByDay7Days),
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    yaxis: {
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        }
    }
};
var chartLine2 = new ApexCharts(document.querySelector("#chart-line2"), optionsLine2);
chartLine2.render();

var optionsArea = {
    series: [{
        name: "Canceled Quantity",
        data: Object.values(canceledRentalsByDay7Days)
    }],
    chart: {
        id: 'yt',
        group: 'social',
        type: 'area',
        height: 160,
        zoom: {
            enabled: false
        }
    },
    stroke: {
        curve: 'straight',
        width: 3,
    },
    colors: ['#f5b849'],
    grid: {
        borderColor: '#f2f5f7',
    },
    title: {
        text: 'Rentals Cancel',
        align: 'left',
        style: {
            fontSize: '14px',
            fontWeight: 'bold',
            color: 'black'
        },
    },
    xaxis: {
        categories: Object.keys(totalAmountByDay7Days),
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    yaxis: {
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        }
    }
};
var chartArea = new ApexCharts(document.querySelector("#chart-area"), optionsArea);
chartArea.render();





