const wordpressPlugins = require( '@wordpress/postcss-plugins-preset' );

module.exports = {
	plugins: [
		wordpressPlugins,
		require( '@wordpress/postcss-themes' ),
	],
};