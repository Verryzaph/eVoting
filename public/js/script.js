const header = document.querySelector("header");

const links = document.querySelectorAll(".nav-link");

const parentContainer = document.querySelector(".read-more-container");

window.addEventListener("scroll", () => {
    activeLink();
});

// sticky navbar

function stickyNavbar() {
    header.classList.toggle("scrolled", window.pageYOffset > 0);
}
window.addEventListener("scroll", stickyNavbar);

// change active link on scroll

function activeLink() {
    let sections = document.querySelectorAll("section[id]");
    let passedSections = Array.from(sections)
        .map((sct, i) => {
            return {
                y: sct.getBoundingClientRect().top - header.offsetHeight,
                id: i,
            };
        })
        .filter((sct) => sct.y <= 0);

    let currSectionID = passedSections.at(-1).id;

    links.forEach((l) => l.classList.remove("active"));
    links[currSectionID].classList.add("active");
}
activeLink();

// read more read less

parentContainer.addEventListener("click", (event) => {
    const current = event.target;
    const isReadMoreBtn = current.className.includes("read-more-btn");

    if (!isReadMoreBtn) return;
    const currentText = document.querySelector(".read-more-text");
    currentText.classList.toggle("read-more-text--show");
    current.textContent = current.textContent.includes("Read More")
        ? "Read Less"
        : "Read More";
});
