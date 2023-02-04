import './bootstrap';
import 'laravel-datatables-vite';

import './bootstrap-tagsinput';

import './custom-tagsinput';

import './flatpickr';
import './flatpickr-monthselect';

import '../css/bootstrap-tagsinput.css';

import '../css/flatpickr.css';
import '../css/flatpickr-monthselect.css';


import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

flatpickr('#timeframe', {
    plugins: [
        new monthSelectPlugin({
            shorthand: true, //defaults to false
            dateFormat: "F Y", //defaults to "F Y"
            altFormat: "F Y", //defaults to "F Y"
            theme: "dark" // defaults to "light"
        })
    ]
})


