<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

?>
<div class="container" >
  <h2>KOTA DEPOK</h2>
  <div class="panel panel-default">
<div class="menu-view" >
    <div id="map" class="map"></div>
    <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>


    <script>
    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
     var closer = document.getElementById('popup-closer');
     /**
       * Create an overlay to anchor the popup to the map.
       */
    var overlay = new ol.Overlay({
        element: container,
        autoPan: true,
        autoPanAnimation: {
          duration: 250
        }
    });

    var map = new ol.Map({
        target: 'map',
        renderer: 'canvas',
        layers: [
            new ol.layer.Tile({source: new ol.source.OSM()})
        ],
        overlays: [overlay],
        view: new ol.View({
            //projection: 'EPSG:900913',
            center: ol.proj.transform([107.14236946147967, -6.279660537126588], 'EPSG:4326', 'EPSG:3857'),
            zoom: 13
        })
 
    });
    //Full Screen
    var myFullScreenControl = new ol.control.FullScreen();
    map.addControl(myFullScreenControl);
 
    map.addOverlay(new ol.Overlay({
        position: ol.proj.transform(
                [107.12977815147563, -6.287168263807004],
                'EPSG:4326',
                'EPSG:3857'
                ),
        element: $('<img src="http://www.clker.com/cliparts/N/w/s/C/i/h/blue-dot.svg.med.png" height="15px">'),
    }));



    var textElement =$('<img src="http://www.clker.com/cliparts/N/w/s/C/i/h/blue-dot.svg.med.png" height="15px">');
    var coor = [11929679.580412505, -699114.4143270022];
    map.addOverlay(new ol.Overlay({
        position: ol.proj.transform(
                [107.16617036338968, -6.26750290927707],
                'EPSG:4326',
                'EPSG:3857'
                ),
        element: textElement
    }));
 
    textElement.click(function(evt) {
        content.innerHTML = '<p>CIKARANG DRY PORT</p>';
           
        overlay.setPosition(coor);
    });
    map.on('singleclick', function(evt) {
        var coord = evt.coordinate;
        var transformed_coordinate = ol.proj.transform(coord, "EPSG:900913", "EPSG:4326");
        console.log(transformed_coordinate);
        console.log(coord);
    });

      /**
       * Add a click handler to the map to render the popup.
       */
    map.on('singleclick', function(evt) {
        var coordinate = evt.coordinate;
        var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
            coordinate, 'EPSG:3857', 'EPSG:4326'));

        content.innerHTML = '<p>You clicked here:</p><code>' + hdms +
            '</code>';
        overlay.setPosition(coor);
        
      });
    closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
    };


 
</script>

</div>
