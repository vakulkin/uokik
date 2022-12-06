import { stickyHeader } from "../js/app/stickyHeader";

import "./app/gutenberg";
import "./app/scrollTo";

stickyHeader();

var splide = new Splide(".splideTabsSlider", {
  // type: "loop",
  pagination: false,
  autoWidth: true,
  perPage: 5,
  // padding: { left: 70, right: 70 },
});
splide.mount();

jQuery(".menu-toggle").on("click", function () {
  jQuery(".main-navigation ").toggleClass("toggled");
});
