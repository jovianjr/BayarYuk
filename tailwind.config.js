/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "c-earlier-black": "#191919",
                "c-pink": "#FF70A5",
                "c-blue": "#99CEFF",
                "c-pink-white": "#FFC8DD",
                "c-blue-white": "#BDE0FE",
            },
            backgroundImage: {
                "grad-pink":
                    "linear-gradient(180deg, #FFFCFD 31.25%, #FFC8DD 100%)",
                "grad-pink-2":
                    "linear-gradient(55deg, #FFFCFD 10%, #FFC8DD 100%)",
            },
            boxShadow: {
                "c-25": "0px 4px 4px rgba(0, 0, 0, 0.25)", // Replace with your desired shadow properties
            },
        },
    },
    plugins: [],
};
