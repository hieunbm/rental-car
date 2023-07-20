//Doanh thu theo thang
var options = {
    series: [{
        name: "Collected",
        data: Object.entries(totalAmountByDay30Days).map(([date, value]) => [new Date(date).getTime(), value])
    }],
    chart: {
        height: 312,
        type: 'area',
    },
    stroke: {
        curve: 'stepline',
    },
    grid: {
        borderColor: '#f2f5f7',
    },
    dataLabels: {
        enabled: false
    },
    colors: ["#845adf"],
    title: {
        text: 'Last month\'s revenue',
        align: 'left'
    },
    markers: {
        hover: {
            sizeOffset: 4
        }
    },
    xaxis: {
        type: 'datetime',
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

var chart2 = new ApexCharts(document.querySelector("#stepline-chart"), options);
chart2.render();

