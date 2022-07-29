const champions = Array.from(document.getElementsByClassName('collection'));
const toggleChampion = (champ) => {
    let champStyle = "border-color: gold; filter: brightness(100%); -webkit-box-shadow: 0px 0px 5px 1px gold; box-shadow: 0px 0px 5px 1px gold;";
    if (champ.getAttribute("style") === champStyle)
    {
        champ.setAttribute("style", "");
    }
    else
    {
        champ.setAttribute("style", champStyle);
    }
    let champId = champ.getAttribute("data-champ");
    let url = "/toggle_collection/" + champId;
    axios.get(url).then(function (response) {
        console.log(response);
    })
};
champions.forEach((champ) => {
    champ.addEventListener('click', function () {
        toggleChampion(champ);
    });
})
