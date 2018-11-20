console.log("SCRIPT INIT");

let ipbox = document.getElementById('ipinput');
let submitbt = document.getElementById('sendip');

// geoForm.submit( function (event) {
//     event.preventDefault();
//     return false;
// })

submitbt.addEventListener('click', (event) => {
    event.preventDefault();
    console.log("event caught");
    window.location.href = 'geoip/ip/' + ipbox.value;
});
