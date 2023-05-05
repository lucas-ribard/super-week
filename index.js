const users = document.getElementById('BTusers')
const selectUsers = document.getElementById('users')
const selectBooks = document.getElementById('books')

function FetchContent(page) {
    fetch('/super-week/' + page).then(function (response) {

        return response.text();
    }).then(function (html) {
        // This is the HTML from our response as a text string
        document.getElementById("Main").innerHTML = html
    }).catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
    });
}

function FetchContentWithId(page) {

    if (page === 'users') {
        var content = '/super-week/' + page + '/' + (selectUsers.value)
    } else {
        var content = '/super-week/' + page + '/' + (selectBooks.value)
    }

    fetch(content).then(function (response) {

        return response.text();
    }).then(function (html) {
        // This is the HTML from our response as a text string
        document.getElementById("Main").innerHTML = html
    }).catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
    });
}