const { unregisterBlockStyle } = wp.blocks;
const {domReady} = wp;

domReady( () => {
	unregisterBlockStyle( 'core/button', 'outline' );
	unregisterBlockStyle( 'core/button', 'fill' );
} );

