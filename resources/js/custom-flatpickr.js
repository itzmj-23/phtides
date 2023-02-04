$(document).ready(function () {

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

});
