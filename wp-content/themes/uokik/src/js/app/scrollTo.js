export const goTo = (el, offset) => {
    if(el){
        el.addEventListener('click', (e) =>{
            e.preventDefault();
            window.scroll({top: offset, left: 0, behavior: 'smooth'});
        });
    }
}

const goToElements = () => {
    const buttonGoTop = document.querySelector('.scrollToTop');
    const buttonGoContent = document.querySelector('.headerTop--skip');
    const content = document.querySelector('#primary');

    goTo(buttonGoTop, 0);
    goTo(buttonGoContent, content.offsetTop);

}

goToElements();