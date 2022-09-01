let section = document.querySelectorAll('#section');
let sectionText = document.querySelectorAll('#section-text');
let nb = $("div[id^=category]").length;
let paid = document.querySelectorAll("#card > div > a > img");

for (let i = 0; i < nb; i++) {
    if (i % 2 === 0)
    {
        section[i].style.backgroundColor = "#212529";
        sectionText[i].style.backgroundColor = "#212529";
        sectionText[i].style.color = "#FFFFFF";
    }
}

paid[14].classList.add("paid-port");
paid[18].classList.add("paid");
paid[19].classList.add("paid");
paid[20].classList.add("paid");
paid[20].classList.add("paid-spe");
paid[21].classList.add("paid");
paid[22].classList.add("paid");
paid[23].classList.add("paid");