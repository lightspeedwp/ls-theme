module.exports = {
	...require( '@wordpress/prettier-config' ),
	overrides: [
		{
			files: [ '*.php' ],
			options: {
				parser: 'php',
				phpVersion: '8.1',
				tabWidth: 4,
				useTabs: true,
			},
		},
		{
			files: [ '*.scss', '*.css' ],
			options: {
				tabWidth: 2,
				useTabs: false,
			},
		},
	],
};