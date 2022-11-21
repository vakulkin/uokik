export const infoTabs = () => {
  jQuery("body").on("click", ".tabsContent__tab_button", function () {
    const tab = jQuery(this).parent().data("tab");
    jQuery(`[data-tab="${tab}"]`).toggleClass("activeAccordion");
  });

  jQuery("body").on(
    "click",
    ".tabsContent .changeReusltSearch__link",
    function () {
      jQuery(".changeReusltSearch__item, .tabsContent__tab").removeClass(
        "active"
      );
      const tab = jQuery(this).parent().data("tab");
      jQuery(`[data-tab="${tab}"]`).addClass("active");
    }
  );
};
