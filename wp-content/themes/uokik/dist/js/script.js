(()=>{"use strict";function e(e,t,o,a){void 0===t&&(t=400),void 0===a&&(a=!1),e.style.overflow="hidden",a&&(e.style.display="block");var l,n=window.getComputedStyle(e),r=parseFloat(n.getPropertyValue("height")),i=parseFloat(n.getPropertyValue("padding-top")),s=parseFloat(n.getPropertyValue("padding-bottom")),c=parseFloat(n.getPropertyValue("margin-top")),d=parseFloat(n.getPropertyValue("margin-bottom")),p=r/t,u=i/t,g=s/t,y=c/t,m=d/t;window.requestAnimationFrame((function n(h){void 0===l&&(l=h);var f=h-l;a?(e.style.height=p*f+"px",e.style.paddingTop=u*f+"px",e.style.paddingBottom=g*f+"px",e.style.marginTop=y*f+"px",e.style.marginBottom=m*f+"px"):(e.style.height=r-p*f+"px",e.style.paddingTop=i-u*f+"px",e.style.paddingBottom=s-g*f+"px",e.style.marginTop=c-y*f+"px",e.style.marginBottom=d-m*f+"px"),f>=t?(e.style.height="",e.style.paddingTop="",e.style.paddingBottom="",e.style.marginTop="",e.style.marginBottom="",e.style.overflow="",a||(e.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(n)}))}(()=>{const e=document.querySelectorAll(".blockSlider--slider");for(let o of e){let e=new Splide(o,{type:"loop",autoplay:!0,pauseOnHover:!1,pauseOnFocus:!1,resetProgress:!1,arrows:!1,paination:!0,interval:6e3});e.mount();let a=o.querySelector(".splide__toggle");if(a&&e.length>1){e.options={pagination:!0};let l=o.querySelector(".blockSlider__navigation"),n=o.querySelector(".splide__pagination");l.appendChild(n);var t="is-paused";let r=e.Components.Autoplay;a.addEventListener("click",(()=>{a.classList.toggle(t),a.classList.contains(t)?r.pause(99):r.play(99)}))}}})(),(()=>{const e=document.querySelectorAll(".documentTemplates--carousel");for(let t of e)new Splide(t,{arrows:!0,pagination:!1,perPage:4,padding:{right:"5%"},gap:"1rem",arrowPath:" ",breakpoints:{991:{perPage:2,padding:{right:"15%"}},640:{perPage:1,padding:{right:"20%"}}}}).mount()})(),(()=>{const t=document.querySelectorAll(".collapsedMenu .submenu--toggle a");for(let o of t)o.addEventListener("click",(function(t){t.preventDefault();var o,a,l=this.parentNode.querySelectorAll(".sub-menu")[0];null==l?window.location.href=this.getAttribute("href"):(l.classList.toggle("active"),300,0===(o=l).clientHeight?e(o,300,a,!0):e(o,300,a),this.classList.toggle("active"))}))})(),(()=>{const e=document.querySelectorAll(".collapsedMenu .current-menu-ancestor");if(e.length)for(let t of e)t.firstElementChild.classList.add("active")})(),jQuery("body").on("click",".tabsContent__tab_button",(function(){const e=jQuery(this).parent().data("tab");jQuery(`[data-tab="${e}"]`).toggleClass("activeAccordion")})),jQuery("body").on("click",".tabsContent .changeReusltSearch__link",(function(){jQuery(".changeReusltSearch__item, .tabsContent__tab").removeClass("active");const e=jQuery(this).parent().data("tab");jQuery(`[data-tab="${e}"]`).addClass("active")}));const t=(e,t)=>{e&&e.addEventListener("click",(e=>{e.preventDefault(),window.scroll({top:t,left:0,behavior:"smooth"})}))};(()=>{const e=document.querySelector(".scrollToTop"),o=document.querySelector(".headerTop--skip"),a=document.querySelector("#primary");t(e,0),t(o,a.offsetTop)})(),(()=>{const e=document.querySelector("#masthead");e&&window.addEventListener("scroll",(function(){window.scrollY>=1?e.classList.add("scrollDown"):e.classList.remove("scrollDown")}))})(),jQuery(".menu-toggle").on("click",(function(){jQuery(".main-navigation ").toggleClass("toggled")}))})();