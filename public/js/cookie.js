let cyes = document.querySelector('#cookieYes');
let cno = document.querySelector('#cookieNo');
let degage = document.querySelector('#degage');
let rep = 0;
let url;

cyes.addEventListener("click", (e) =>
{
    e.preventDefault();
    degage.setAttribute("style", "display: none;");
    rep = 1;
    url = "/cookies/" + rep;
    axios.get(url).then(function (response) {
        console.log(response);
    })
});

cno.addEventListener("click", (e) =>
{
    e.preventDefault();
    degage.setAttribute("style", "display: none;");
    url = "/cookies/" + rep;
    axios.get(url).then(function (response) {
        console.log(response);
    })
});