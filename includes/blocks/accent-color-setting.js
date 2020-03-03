/**
 * Gutenberg block-specific JavaScript:
 * used on front-end and/or in editor
 */
const { __ } = wp.i18n;
const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { useEffect } = wp.element;
const { dispatch, useSelect } = wp.data;
const { PanelColorSettings } = wp.blockEditor;

/**
 * CustomAccentColorSideBarPanel
 */
const CustomAccentColorSideBarPanel = () => {

	const { accentColor } = useSelect( select =>
		select( 'core/editor' ).getEditedPostAttribute( 'meta' )
	);

	/**
	 * setAccentColor
	 * @param {String} color
	 */
	const setAccentColor = color => {
		// tell editor about change so it can handle setting it uppon next save
		dispatch( 'core/editor' ).editPost( {
			meta: { accentColor: color },
		} );
	};

	useEffect( () => {
		// change css var in browser for live preview
		document.querySelector( '.editor-styles-wrapper' ).style.setProperty( '--c-accent', accentColor );
	}, [ accentColor ] );

	return (
		<PluginDocumentSettingPanel
			icon="admin-appearance"
			name="custom-accent-color-panel"
			title={ __( 'Accent Color', 'gemeindetag' ) }
		>
			<PanelColorSettings
				title={ __( 'Color Settings', 'gemeindetag' ) }
				colorSettings={ [
					{
						value: accentColor,
						onChange: setAccentColor,
						label: __( 'Site Accent Color', 'gemeindetag' ),
					},
				] }
			/>
		</PluginDocumentSettingPanel>
	);
};

registerPlugin( 'custom-accent-color-panel', { render: CustomAccentColorSideBarPanel } );
