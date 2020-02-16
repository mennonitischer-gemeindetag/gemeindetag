const {domReady} = wp;

domReady( () => {


	const menuToggle = document.querySelector( '.menu-toggle' );

	menuToggle.addEventListener( 'click', () => {
		const isMenuOpen = menuToggle.getAttribute( 'aria-expanded' );

		if ( 'true' == isMenuOpen ) {
			menuToggle.setAttribute( 'aria-expanded', 'false' );
			return;
		}

		menuToggle.setAttribute( 'aria-expanded', 'true' );

	} );

} );
