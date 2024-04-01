module.exports = {
	plugins: {
		tailwindcss: {},
		autoprefixer: {},
		'postcss-preset-env': {},
		'postcss-pxtorem': {},
		...(process.env.NODE_ENV === 'production' ? { cssnano: {} } : {}),
	},
};
