<!-- Styles -->
<style>
								
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

<!-- Chart code -->
<script>

var Realiste = '<?php printf ("%6.2f",$realiste)?>'
var Investigateur = '<?php printf ("%6.2f",$investigatif)  ?>'
var Artiste = '<?php printf ("%6.2f",$artistique)  ?>'
var Entreprenant = '<?php printf ("%6.2f",$entrepreneur)  ?>'
var Social = '<?php printf ("%6.2f",$social)  ?>'
var Conventionnel = '<?php printf ("%6.2f",$conventionnel)  ?>'

var chart = AmCharts.makeChart("chartdiv3",
{
    "type": "serial",
    "theme": "none",
    "dataProvider": [{
        "name": "Realiste",
        "points": Realiste,
        "color": "#7F8DA9",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    }, {
        "name": "Investigateur",
        "points": Investigateur,
        "color": "#FEC514",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Artiste",
        "points": Artiste,
        "color": "#DB4C3C",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }, {
        "name": "Social",
        "points": Social,
        "color": "#ad1457 ",
        "bullet": "https://www.amcharts.com/lib/images/faces/E01.png"
    }, {
        "name": "Entreprenant",
        "points": Entreprenant,
        "color": "#4a148c",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }, {
        "name": "Conventionnel",
        "points": Conventionnel,
        "color": "#00e5ff",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"

    }],
    "valueAxes": [{
        "maximum": 50,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});
</script>

<!-- HTML -->
<div id="chartdiv3"></div>