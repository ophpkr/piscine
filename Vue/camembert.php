<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>

var Realiste = '<?php printf ("%6.2f",$realiste)?>'
var Investigateur = '<?php printf ("%6.2f",$investigatif)  ?>'
var Artiste = '<?php printf ("%6.2f",$artistique)  ?>'
var Entreprenant = '<?php printf ("%6.2f",$entrepreneur)  ?>'
var Social = '<?php printf ("%6.2f",$social)  ?>'
var Conventionnel = '<?php printf ("%6.2f",$conventionnel)  ?>'


var chart = AmCharts.makeChart( "chartdiv2", {
  "type": "pie",
  "theme": "light",
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
  "valueField": "type",
  "titleField": "profil",
  "outlineAlpha": 0.4,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 30,
  "export": {
    "enabled": true
  }
} );
</script>

<!-- HTML -->
<div id="chartdiv2"></div>