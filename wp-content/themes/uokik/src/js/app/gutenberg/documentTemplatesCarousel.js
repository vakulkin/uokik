export const carouselDocumentTemplates = () => {

	const elms = document.querySelectorAll( '.documentTemplates--carousel' );

	for (let el of elms ) {

		let splide = new Splide( el, {
			arrows			: true,
            pagination      : false,
            perPage         : 4,
            padding         : { right: '5%'},
            gap             : '1rem',
            arrowPath       : ' ',

			breakpoints: {
				991: {
				  perPage: 2,
				  padding         : { right: '15%'},
				},
				640: {
					perPage: 1,
					padding         : { right: '20%'},
				},
			}

		} );

		splide.mount();

	}

}