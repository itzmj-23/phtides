import './bootstrap';
import 'laravel-datatables-vite';

import './bootstrap-tagsinput';

import './custom-tagsinput';

import 'flatpickr';
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect";
import './yearpicker';
// import './flatpickr';
// import './flatpickr-monthselect';

import '../css/bootstrap-tagsinput.css';

import '../css/flatpickr.css';
import '../css/flatpickr-monthselect.css';
import '../css/yearpicker.css';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

// flatpickr('#timeframe', {
//     plugins: [
//         new monthSelectPlugin({
//             shorthand: true, //defaults to false
//             dateFormat: "F Y", //defaults to "F Y"
//             altFormat: "F Y", //defaults to "F Y"
//             theme: "dark" // defaults to "light"
//         })
//     ]
// })

$("#yearpicker").yearpicker({
    startYear: 2000,
    endYear:  new Date().getFullYear() + 10,
    onChange: function (value) {
        console.log(value);
    }
})

