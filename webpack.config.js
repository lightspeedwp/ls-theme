const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		'js/theme': path.resolve( process.cwd(), 'src/js', 'theme.js' ),
		'js/editor': path.resolve( process.cwd(), 'src/js', 'editor.js' ),
		'css/style': path.resolve( process.cwd(), 'src/css', 'style.scss' ),
		'css/editor-style': path.resolve( process.cwd(), 'src/css', 'editor.scss' ),
	},
	output: {
		...defaultConfig.output,
		path: path.resolve( process.cwd(), 'build' ),
		filename: '[name].js',
		clean: true,
	},
	resolve: {
		...defaultConfig.resolve,
		alias: {
			...defaultConfig.resolve.alias,
			'@': path.resolve( __dirname, 'src' ),
			'@css': path.resolve( __dirname, 'src/css' ),
			'@js': path.resolve( __dirname, 'src/js' ),
		},
	},
	plugins: [
		...defaultConfig.plugins,
		new RemoveEmptyScriptsPlugin( {
			stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
		} ),
	],
};