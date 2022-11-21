import { slideToggle } from "../slide.js";

export const slideMenuItems = () => {
  const slideMenuItems = document.querySelectorAll(
    ".collapsedMenu .submenu--toggle a"
  );

  for (let item of slideMenuItems) {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      var parent = this.parentNode.querySelectorAll(".sub-menu")[0];

      if (typeof parent === "undefined" || parent === null) {
        window.location.href = this.getAttribute("href");
      } else {
        parent.classList.toggle("active");
        slideToggle(parent, 300);
        this.classList.toggle("active");
      }
    });
  }
};

export const activeMenuItems = () => {
  const menuItems = document.querySelectorAll(
    ".collapsedMenu .current-menu-ancestor"
  );
  if (menuItems.length) {
    for (let el of menuItems) {
      el.firstElementChild.classList.add("active");
    }
  }
};
