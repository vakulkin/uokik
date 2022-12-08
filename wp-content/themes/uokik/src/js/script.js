import { stickyHeader } from "../js/app/stickyHeader";

import "./app/gutenberg";
import "./app/scrollTo";

stickyHeader();

if (jQuery(".splideTabsSlider").length) {
  var splide = new Splide(".splideTabsSlider", {
    // type: "loop",
    pagination: false,
    autoWidth: true,
    perPage: 5,
    // padding: { left: 70, right: 70 },
  });
  splide.mount();
}

jQuery(".menu-toggle").on("click", function () {
  jQuery(".main-navigation ").toggleClass("toggled");
});

jQuery(".main-navigation .menu-item-has-children>a").on("click", function (e) {
  e.preventDefault();
  const subMenu = jQuery(this).next();
  if (subMenu.hasClass("active")) {
    subMenu.removeClass("active");
  } else {
    jQuery(".main-navigation .menu-item-has-children>ul.sub-menu").removeClass(
      "active"
    );
    subMenu.addClass("active");
  }
});
