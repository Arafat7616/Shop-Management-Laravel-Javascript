/*
----------------------------------------
    : Custom - Sparkline Charts js :
----------------------------------------
*/
"use strict";
$(document).ready(function() {
	/* -- Sparkline - Line -- */
	var sparklineLineData = [0, 45, 22, 37, 30, 54, 48, 23, 50, 15];
	$('#sparkline-line').sparkline(sparklineLineData, {
	    type: 'line',
        width: "150",
        height: '150',
        chartRangeMax: 50,
        lineColor: '#6e81dc',
        fillColor: 'transparent',
        highlightLineColor: '#dcdde1',
        highlightSpotColor: 'rgba(110, 129, 220,0.5)'
	});
	/* -- Sparkline - Area Line -- */
	var sparklineAreaLineData = [0, 45, 22, 37, 30, 54, 48, 23, 50, 15];
	$('#sparkline-area-line').sparkline(sparklineAreaLineData, {
        type: 'line',
        width: "150",
        height: '150',
        chartRangeMax: 50,
        lineColor: '#6e81dc',
        fillColor: 'rgba(110, 129, 220,0.5)',
        highlightLineColor: '#dcdde1',
        highlightSpotColor: 'rgba(110, 129, 220,0.5)'
	});
	/* -----  Sparkline - Pie Chart  ----- */
	var sparklinePieData = [30, 30, 30];
    $('#sparkline-pie').sparkline(sparklinePieData, {
        type: 'pie',
        width: '150',
        height: '150',
        sliceColors: ['#fcc100', 'rgba(255,255,255,0.05)', '#6e81dc']
    });
	/* -----  Sparkline - Bar  ----- */
	var sparklineBarData = [30, 40, 60, 80, 30, 20, 40, 50, 70, 90];
	$('#sparkline-bar').sparkline(sparklineBarData, {
        type: 'bar',
        width: "150",
        height: '150',
        barColor: '#6e81dc',
        barWidth: '12',
        barSpacing: '5'      
	});
	/* -----  Sparkline - Composite Chart  ----- */
	var sparklineCompositeBarData = [30, 40, 60, 80, 30, 20, 40, 50, 70, 90];
	var sparklineCompositeLineData = [30, 40, 60, 80, 30, 20, 40, 50, 70, 90];
	$('#sparkline-composite-bar').sparkline(sparklineCompositeBarData, {
        type: 'bar',
        width: "150",
        height: '150',
        barColor: '#6e81dc',
        barWidth: '12',
        barSpacing: '5'
    });    
    $('#sparkline-composite-bar').sparkline(sparklineCompositeLineData, {
        type: 'line',
        width: "100%",
        height: '150',
        lineColor: '#ff4b5b',
        fillColor: 'transparent',
        composite: true,
        highlightLineColor: '#dcdde1',
        highlightSpotColor: 'rgba(110, 129, 220,0.5)'
    });
     /* -----  Sparkline - Tristate Chart  ----- */
    var SparklineTristateData = [1,0,1,-1,-1,1,-1,0,0,1];
	$("#sparkline-tristate").sparkline(SparklineTristateData, {
	    type: 'tristate',
	    width: '150',
	    height: '150',
	    posBarColor: '#6e81dc',
	    negBarColor: '#fcc100',
	    zeroBarColor: 'rgba(255,255,255,0.05)',
	    barWidth: 12,
	    barSpacing: 5
	});
    /* -----  Sparkline - Discrete Chart  ----- */
    var sparklineDiscreteData = [4,6,7,7,4,3,2,1,4,4];
    $("#sparkline-discrete").sparkline(sparklineDiscreteData, {
    	type: 'discrete',
	    width: '150',
	    height: '50',
	    lineColor: '#6e81dc',
	    thresholdColor: '#6e81dc',
	    thresholdWidth: '12',
	});
    /* -----  Sparkline - Bullet Chart  ----- */
    var sparklineBulletData = [10,12,12,9,7];
    $("#sparkline-bullet").sparkline(sparklineBulletData, {
	    type: 'bullet',
	    width: '150',
	    height: '50',
	    targetColor: '#ff4b5b',
	    performanceColor: '#6e81dc',
    	rangeColors: ['rgba(110, 129, 220,0.2)','rgba(110, 129, 220,0.4)','rgba(110, 129, 220,0.6)']
	});
    /* -----  Sparkline - Box Plot Chart  ----- */
    var sparklineBoxPlotData = [4,27,34,52,54,59,61,68,78,82,85,87,91,93,100];
    $("#sparkline-box-plot").sparkline(sparklineBoxPlotData, {
	    type: 'box',
	    width: '150',
	    height: '50',
	    raw: false,
	    boxLineColor: '#6e81dc',
	    boxFillColor: 'rgba(110, 129, 220,0.5)',
	    whiskerColor: '#6e81dc',
	    outlierLineColor: '#6e81dc',
	    outlierFillColor: '#dcdde1',
	    medianColor: '#ff4b5b',
	    targetColor: '#2bcd72'
	});
});