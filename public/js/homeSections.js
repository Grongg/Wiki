let section = document.querySelectorAll('#section');
let sectionText = document.querySelectorAll('#section-text');
let nb = $("div[id^=category]").length;

for (let i = 0; i < nb; i++) {
    if (i % 2 === 0)
    {
        section[i].style.backgroundColor = "#212529";
        sectionText[i].style.backgroundColor = "#212529";
        sectionText[i].style.color = "#FFFFFF";
    }
}