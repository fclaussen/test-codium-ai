const defaultConfig = require('tailwindcss/defaultConfig');
const {
	wpFontFamily,
	wpFontSize,
	wpColors,
} = require('@trewknowledge/tailwindcss-config-helpers');

let content = [
	'!node_modules',
	'!./vendor/*',
	'./{templates,patterns,parts}/*.{html,php}',
	'./src/js/**/*.{js,jsx,ts,tsx}',
];
content = [
	...content,
	// `../../plugins/cod2-block{s,s-*}/src/**/*.{php,html,js,jsx,ts,tsx}`,
];

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [...content],
	theme: {
		colors: wpColors || defaultConfig.theme.colors,
		fontFamily: wpFontFamily || defaultConfig.theme.fontFamily,
		fontSize: wpFontSize || defaultConfig.theme.fontSize,
		screens: {
			sm: '600px', // This is WP's default.
			md: '782px', // This is WP's default.
		},
	},
	plugins: [],
};
