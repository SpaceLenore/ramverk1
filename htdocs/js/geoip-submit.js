let ipbox = document.getElementById('ipinput');
let submitbt = document.getElementById('sendip');


submitbt.addEventListener('click', (event) => {
    event.preventDefault();
    window.location.href = 'geoip/ip/' + ipbox.value;
});
