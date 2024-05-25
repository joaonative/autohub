/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#FFA31A",
                gray: "#C7C7C7",
                darker: "#121212",
                dark: "#1B1B1B",
                success: "#72C035",
            },
            screens: {
                "3xl": "1920px",
            },
        },
    },
    plugins: [],
};
