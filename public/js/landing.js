tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: "#2563eb",
                secondary: "#7c3aed",
                accent: "#f59e0b",
                dark: "#0f172a",
                light: "#f8fafc",
            },
            fontFamily: {
                sans: ["Plus Jakarta Sans", "Inter", "sans-serif"],
                display: ["Satoshi", "Plus Jakarta Sans", "sans-serif"],
            },
            animation: {
                gradient: "gradient 8s linear infinite",
                float: "float 3s ease-in-out infinite",
                "pulse-slow": "pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite",
                "spin-slow": "spin 8s linear infinite",
                "bounce-slow": "bounce 2s infinite",
            },
            keyframes: {
                gradient: {
                    "0%, 100%": { backgroundPosition: "0% 50%" },
                    "50%": { backgroundPosition: "100% 50%" },
                },
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" },
                },
            },
            backgroundSize: { "300%": "300%" },
        },
    },
};

document.addEventListener("DOMContentLoaded", function () {
    lucide.createIcons();
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({ behavior: "smooth" });
            }
        });
    });
});
