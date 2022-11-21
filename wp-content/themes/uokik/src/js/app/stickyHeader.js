export const stickyHeader = () => {
    const navbar = document.querySelector('#masthead');

    if(!navbar) return;

    let fixeMenuScroll = function () {  
        if (window.scrollY >= 1) {
            navbar.classList.add('scrollDown');
        } else {
            navbar.classList.remove('scrollDown');
        } 
    }  

    window.addEventListener('scroll', fixeMenuScroll);

}
