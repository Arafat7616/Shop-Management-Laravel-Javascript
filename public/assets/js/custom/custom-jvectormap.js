/*
-----------------------------------
    : Custom - Map jVector js :
-----------------------------------
*/
"use strict";
$(document).ready(function() {
    /* -- jVector Map - World Map -- */
    $('#world-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        markerStyle: {
          initial: {
            fill: '#2d3646',
            stroke: '#2d3646',
            "fill-opacity": 1,
            "stroke-width": 15,
            "stroke-opacity": 0.2
          }
        },
        markers: [
          {latLng: [37.18, -93.35], name: 'United States'},
          {latLng: [20.59, 78.96], name: 'India'},
          {latLng: [-25.27, 133.77], name: 'Australia'},
          {latLng: [-38.41, -63.61], name: 'Argentina'},
          {latLng: [61.52, 105.31], name: 'Russia'},
          {latLng: [-30.55, 22.93], name: 'South Africa'},
        ],
        focusOn: {
          x: 0,
          y: 0,
          scale: 1
        },
        series: {
          regions: [{
            values: {
                US:'#6e81dc',
                AU:'#fcc100',
                IN:'#5fc27e',                
                AR:'#f44455',
                RU:'#72d0fb',
                ZA:'#718093',                
            }
          }]
        },
        regionStyle: {
            initial: {
                fill: '#2c2d34'
            }
        }
    });
    /* -- jVector Map - USA Map --  */
    $('#usa').vectorMap({map: 'us_aea_en',backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#6e81dc'
            }
        }
    });
    /* -- jVector Map - India Map -- */
    $('#india').vectorMap({map: 'in_mill',backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#5fc27e'
            }
    }});
    /* -- jVector Map - Australia Map -- */
    $('#australia').vectorMap({map : 'au_mill',backgroundColor : 'transparent',
        regionStyle : {
            initial : {
                fill : '#fcc100'
            }
    }});
    /* -- jVector Map - Argentina Map -- */
    $('#argentina').vectorMap({map: 'ar_mill',backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#f44455'
            }
    }});
    /* -- jVector Map - Russia Map -- */
    $('#russia').vectorMap({map: 'ru_mill',backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#72d0fb'
            }
    }});
    /* -- jVector Map - South Africa Map -- */
    $('#south-africa').vectorMap({map: 'za_mill',backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: '#718093'
            }
    }});
});