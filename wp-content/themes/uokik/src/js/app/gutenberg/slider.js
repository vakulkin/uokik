export const slider = () => {
	const elms = document.querySelectorAll( '.blockSlider--slider' );

	for (let el of elms ) {

		let splide = new Splide( el, {
			type         	: 'loop',
			autoplay     	: true,
			pauseOnHover 	: false,
			pauseOnFocus 	: false, 
			resetProgress	: false,
			arrows			: false,
			paination		: true,
			interval		: 6000
		} );

		splide.mount();

		let button = el.querySelector( '.splide__toggle' );
		
		if(button && splide.length > 1){
	
			splide.options = {
                pagination: true,
            }

			let parentPag = el.querySelector('.blockSlider__navigation');
			let pag  = el.querySelector('.splide__pagination');
			parentPag.appendChild(pag);
			var pausedClass = 'is-paused';
			var flag     = 99;
			let Autoplay = splide.Components.Autoplay;

			button.addEventListener('click', () => {
				button.classList.toggle( pausedClass );
			
				if ( button.classList.contains( pausedClass ) ) {
					Autoplay.pause( flag );
				} else {
					Autoplay.play( flag );
				}
			});
		}
	}
}