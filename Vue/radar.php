<script>
var Realiste = '<?php echo $realiste ?>'
var Investigateur = '<?php echo $investigatif ?>'
var Artiste = '<?php echo $artistique ?>'
var Entreprenant = '<?php echo $entrepreneur ?>'
var Social = '<?php echo $social ?>'
var Conventionnel = '<?php echo $conventionnel ?>'



var chart = AmCharts.makeChart( "chartdiv", {
  "type": "radar",
  "theme": "chalk",
  "dataProvider": [ {
    "country": "Realiste",
    "litres": Realiste
  }, {
    "country": "Investigateur",
    "litres": Investigateur
  }, {
    "country": "Artiste",
    "litres": Artiste
  }, {
    "country": "Sociale",
    "litres": Social
  }, {
    "country": "Entreprenant",
    "litres": Entreprenant
  }, {
    "country": "Conventionnel",
    "litres": Conventionnel
  } ],
  "valueAxes": [ {
    "axisTitleOffset": 20,
    "minimum": 0,
    "axisAlpha": 0.15
  } ],
  "startDuration": 2,
  "graphs": [ {
    "balloonText": "[[value]] personnalité",
    "bullet": "round",
    "lineThickness": 2,
    "valueField": "litres"
  } ],
  "categoryField": "country",
  "export": {
    "enabled": true
  }
} );
</script>

<!-- HTML -->
<div id="chartdiv"></div>	