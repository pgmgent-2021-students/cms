import axios from 'axios';

const handleOverlay = (length, element) => {
    if(length && element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    } else if(length === 0 && !element.classList.contains('hidden')) {
        element.classList.add('hidden');
    }
}

const handleSearch = (e, overlay) => {
    const val = e.target.value;

    handleOverlay(val.length, overlay)

    // Make a request for a user with a given ID
    axios.get(`${testData.rootUrl}/wp-json/wp/v2/posts?search=${val}`)
    .then(function (response) {
        // handle success
        console.log(response.data);
        if(response.data.length) {
            overlay.innerHTML = `<ul>${response.data.map(result => (`<li>${result.title.rendered}</li>`))}</ul>`
        } else {
            overlay.innerHTML = 'Geen resultaten'
        }
    })
    .catch(function (error) {
        alert(error);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector('#js-search');
    const overlay = document.querySelector('#results');

    if(searchInput) {
        searchInput.addEventListener('input', e => handleSearch(e, overlay));
    }

});