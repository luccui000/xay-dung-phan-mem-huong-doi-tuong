import noUiSlider from 'nouislider';
import wNumb from "wnumb";
import 'nouislider/dist/nouislider.css';


var priceSlider  = document.getElementById('price-slider');

noUiSlider.create(priceSlider, {
    start: [ 0, 100000000 ],
    connect: true,
    step: 500000,
    margin: 0,
    range: {
        'min': 0,
        'max': 100000000
    },
    tooltips: false,
    format: wNumb({
        decimals: 0,
        suffix: 'đ'
    })
});

// Update Price Range
priceSlider.noUiSlider.on('update', function( values, handle ){
    $('#filter-price-range').text(values.join(' - '));
});
export default priceSlider;
