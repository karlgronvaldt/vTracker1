const mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');

mapboxgl.accessToken = 'pk.eyJ1Ijoia2FybGdyb252YWxkdCIsImEiOiJjazg2M3JueDUwM3dkM21wN3g0aGZreWltIn0.lxxD9rYjHnNLwMSIKcQ80A';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v10',
    center: [11, 56],
    zoom: 6
});

map.on('load', function() {
    map.addLayer({
        id: 'clusters',
        type: 'circle',
        source: {
            type: 'geojson',
            data: 'locdata'
        },
        paint: {
            'circle-radius': {
                'base': 1.75,
                'stops': [[6, 2], [22, 180]]
            },
            'circle-color': [
                'match',
                ['get', 'code'],
                1,
                '#00FF00',
                2,
                '#FF2D00',
                3,
                '#008FFF',
                /* other */ '#CCC'
            ],
            'circle-opacity': 0.8,
        }
    });
});
