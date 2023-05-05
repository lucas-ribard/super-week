const users = document.getElementById('BTusers')

function FetchContent(page){
    fetch('/super-week/'+page).then(function (response) {
      
        return response.text();
    }).then(function (html) {
        // This is the HTML from our response as a text string
        document.getElementById("Main").innerHTML = html
    }).catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
    });
}