const tailwindcssPlugin = require.resolve('prettier-plugin-tailwindcss');
const defaultWpPrettierConfig = require('@wordpress/prettier-config');

/** @type {import("prettier").Config} */
module.exports = {
	...defaultWpPrettierConfig,
	plugins: [tailwindcssPlugin],
	tabWidth: 2,
};
