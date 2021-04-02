/*
-------------------------------------------
    : Custom - Dashboard Ecommerce js :
-------------------------------------------
*/
"use strict";
$(document).ready(function() {
	/* --- Chartjs - Global Style --- */
    Chart.defaults.global.defaultFontFamily = 'Nunito Sans';
    Chart.defaults.global.defaultFontColor = 'rgba(138,152,172,1)';
    Chart.defaults.global.defaultFontSize = 14;
    Chart.defaults.global.defaultFontStyle = 'normal';
    Chart.defaults.global.maintainAspectRatio = 0;
    Chart.defaults.global.lineWidth = 2;
    Chart.defaults.global.tooltips.backgroundColor = '#2c2d34';
    Chart.defaults.global.tooltips.titleFontSize = 14;
    Chart.defaults.global.tooltips.titleFontStyle = 'normal';
    Chart.defaults.global.tooltips.bodyFontSize = 12;
    Chart.defaults.global.tooltips.bodyFontStyle = 'normal';
    Chart.defaults.global.tooltips.bodyFontColor = '#8A98AC';
    Chart.defaults.global.tooltips.xPadding = 10;
    Chart.defaults.global.tooltips.yPadding = 10;
    Chart.defaults.global.tooltips.titleMarginBottom = 10;
    Chart.defaults.global.tooltips.bodySpacing = 8;
    Chart.defaults.global.tooltips.cornerRadius = 5;    
    Chart.defaults.global.legend.labels.boxWidth = 15;
    Chart.defaults.global.legend.labels.fontSize = 15;
    Chart.defaults.global.legend.labels.padding = 16; 
    /* --- Chartjs - Order Chart --- */
    var chartOrderID = document.getElementById("chartjs-order-chart").getContext('2d');
    var gradient1 = chartOrderID.createLinearGradient(0, 0, 0, 90);
    gradient1.addColorStop(0, 'rgba(110, 129, 220,0.5)');
    gradient1.addColorStop(0.75, 'rgba(0,0,0,0.01)');
    var BoundaryArea = new Chart(chartOrderID, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                backgroundColor: gradient1,
                borderColor: ["#6e81dc"],
                pointBorderColor: ["#6e81dc","#6e81dc","#6e81dc","#6e81dc","#6e81dc","#6e81dc","#6e81dc"],
                pointBackgroundColor: ["#6e81dc","#6e81dc","#6e81dc","#6e81dc","#6e81dc","#6e81dc","#6e81dc"],
                pointBorderWidth: 0,
                data: [66.06, 82.2, 22.11, 51.53, -21.47, 93.61, -53.75, -60.32],
                label: 'Series A',
                fill: 'start'
            }]
        },
        options: {
            title: {
                text: 'fill: start',
                display: false
            },
            maintainAspectRatio: true,
            spanGaps: true,
            elements: {
            	point: {
		            radius: 0,
		          },
                line: {
                    tension: 0.05
                }
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            legend: {
	            display: false
	        },
            scales: {
                xAxes: [{  
                	display: false,
                    ticks: {
                        autoSkip: false,
                        maxRotation: 0
                    },     
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3]
                    }
                }],
                yAxes: [{
                	display: false,
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3],
                        zeroLineColor: '#dcdde1',
                    }
                }]
            }
        }
    });
    /* --- Chartjs - Customer Chart --- */
    var customerID = document.getElementById("chartjs-customer-chart").getContext('2d');
    var gradient2 = customerID.createLinearGradient(0, 0, 0, 90);
    gradient2.addColorStop(0, 'rgba(252, 193, 0,0.5)');
    gradient2.addColorStop(0.75, 'rgba(0,0,0,0.01)');
    var BoundaryArea = new Chart(customerID, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                backgroundColor: gradient2,
                borderColor: ["#fcc100"],
                pointBorderColor: ["#fcc100","#fcc100","#fcc100","#fcc100","#fcc100","#fcc100","#fcc100"],
                pointBackgroundColor: ["#fcc100","#fcc100","#fcc100","#fcc100","#fcc100","#fcc100","#fcc100"],
                pointBorderWidth: 0,
                data: [86.06, 12.2, 42.11, -31.53, 81.47, 13.61, 46.75, -60.32],
                label: 'Series A',
                fill: 'start'
            }]
        },
        options: {
            title: {
                text: 'fill: start',
                display: false
            },
            maintainAspectRatio: true,
            spanGaps: true,
            elements: {
            	point: {
		            radius: 0,
		          },
                line: {
                    tension: 0.05
                }
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            legend: {
	            display: false
	        },
            scales: {
                xAxes: [{  
                	display: false,
                    ticks: {
                        autoSkip: false,
                        maxRotation: 0
                    },     
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3]
                    }
                }],
                yAxes: [{
                	display: false,
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3],
                        zeroLineColor: '#dcdde1',
                    }
                }]
            }
        }
    });
    /* --- Chartjs - Product Chart --- */
    var productID = document.getElementById("chartjs-product-chart").getContext('2d');
    var gradient3 = productID.createLinearGradient(0, 0, 0, 90);
    gradient3.addColorStop(0, 'rgba(95, 194, 126,0.5)');
    gradient3.addColorStop(0.75, 'rgba(0,0,0,0.01)');
    var BoundaryArea = new Chart(productID, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                backgroundColor: gradient3,
                borderColor: ["#5fc27e"],
                pointBorderColor: ["#5fc27e","#5fc27e","#5fc27e","#5fc27e","#5fc27e","#5fc27e","#5fc27e"],
                pointBackgroundColor: ["#5fc27e","#5fc27e","#5fc27e","#5fc27e","#5fc27e","#5fc27e","#5fc27e"],
                pointBorderWidth: 0,
                data: [6.06, 82.2, -22.11, 21.53, -21.47, 73.61, -53.75, -60.32],
                label: 'Series A',
                fill: 'start'
            }]
        },
        options: {
            title: {
                text: 'fill: start',
                display: false
            },
            maintainAspectRatio: true,
            spanGaps: true,
            elements: {
            	point: {
		            radius: 0,
		          },
                line: {
                    tension: 0.05
                }
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            legend: {
	            display: false
	        },
            scales: {
                xAxes: [{  
                	display: false,
                    ticks: {
                        autoSkip: false,
                        maxRotation: 0
                    },     
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3]
                    }
                }],
                yAxes: [{
                	display: false,
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3],
                        zeroLineColor: '#dcdde1',
                    }
                }]
            }
        }
    });
    /* --- Chartjs - Revenue Chart --- */
    var revenueID = document.getElementById("chartjs-revenue-chart").getContext('2d');
    var gradient4 = revenueID.createLinearGradient(0, 0, 0, 90);
    gradient4.addColorStop(0, 'rgba(244, 68, 85,0.5)');
    gradient4.addColorStop(0.75, 'rgba(0,0,0,0.01)');
    var BoundaryArea = new Chart(revenueID, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                backgroundColor: gradient4,
                borderColor: ["#f44455"],
                pointBorderColor: ["#f44455","#f44455","#f44455","#f44455","#f44455","#f44455","#f44455"],
                pointBackgroundColor: ["#f44455","#f44455","#f44455","#f44455","#f44455","#f44455","#f44455"],
                pointBorderWidth: 0,
                data: [25.32, -23.75, 93.61, -21.47, 51.53, 22.11, 82.2, 56.06],
                label: 'Series A',
                fill: 'start'
            }]
        },
        options: {
            title: {
                text: 'fill: start',
                display: false
            },
            maintainAspectRatio: true,
            spanGaps: true,
            elements: {
            	point: {
		            radius: 0,
		          },
                line: {
                    tension: 0.05
                }
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            legend: {
	            display: false
	        },
            scales: {
                xAxes: [{  
                	display: false,
                    ticks: {
                        autoSkip: false,
                        maxRotation: 0
                    },     
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3]
                    }
                }],
                yAxes: [{
                	display: false,
                    gridLines: {
                        color: '#dcdde1',
                        lineWidth: 1,
                        borderDash: [3],
                        zeroLineColor: '#dcdde1',
                    }
                }]
            }
        }
    });
    /* --- Latest Order --- */
    $('#latestorder').DataTable( {
         "ordering": false,	
         "searching": false
    } );    
    /* --- Top Products --- */
    $('#topproducts').DataTable( {
         "ordering": false,	
         "searching": false
    } );
    /* --- C3 - Stacked Area Chart --- */
    var stackedChart = c3.generate({
        bindto: '#c3-stacked-area',
        color: { pattern: ["#fcc100", "#6e81dc"] },
        data: {
            columns: [
                ['SeriesA', 25, 85, 35, 20, 15, 75, 50, 75, 85, 100],
                ['SeriesB', 90, 65, 55, 80, 35, 65, 40, 65, 45, 10]
            ],
            types: {
                SeriesA: 'area-spline',
                SeriesB: 'area-spline'
            },
            groups: [['SeriesA', 'SeriesB']]
        }
    });
});