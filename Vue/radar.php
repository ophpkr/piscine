<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>


<script>
var Realiste = '<?php printf ("%6.2f",$realiste)?>'
var Investigateur = '<?php printf ("%6.2f",$investigatif)  ?>'
var Artiste = '<?php printf ("%6.2f",$artistique)  ?>'
var Entreprenant = '<?php printf ("%6.2f",$entrepreneur)  ?>'
var Social = '<?php printf ("%6.2f",$social)  ?>'
var Conventionnel = '<?php printf ("%6.2f",$conventionnel)  ?>'



var chart = AmCharts.makeChart( "chartdiv", {
  "type": "radar",
  "theme": "none",

  "dataProvider": [ {
    "profil": "Realiste",
    "type": Realiste
  }, {
    "profil": "Investigateur",
    "type": Investigateur
  }, {
    "profil": "Artiste",
    "type": Artiste
  }, {
    "profil": "Social",
    "type": Social
  }, {
    "profil": "Entreprenant",
    "type": Entreprenant
  }, {
    "profil": "Conventionnel",
    "type": Conventionnel
  } ],

  "valueAxes": [ {
    "axisTitleOffset": 20,
    "minimum": 0,
    "axisAlpha": 0.9
  } ],
  "startDuration": 2,

  "graphs": [ {
    "balloonText": "[[value]] pourcents",
    "bullet": "round",
    "lineThickness": 5,
    "valueField": "type"
  } ],
  "categoryField": "profil",
  "export": {
    "enabled": true
  }
} );
</script>

<!-- HTML -->
<div id="chartdiv"></div>	