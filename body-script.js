<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttonToggle = document.getElementById("theme-toggle");
    const iconToggle = document.getElementById("icon-toggle");

    // SVG Icons
    const sunIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
    </svg>`;

    const moonIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
    </svg>`;

    // Function to get the current theme
    function getCurrentTheme() {
        let themeAttr = document.documentElement.getAttribute("data-theme");

        // If "auto" mode, check system preference
        if (themeAttr === "auto" || !themeAttr) {
            return window.matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark";
        }

        return themeAttr; // Return explicit theme if set
    }

    // Function to update button/icon UI
    function updateButton(theme) {
        const elements = [buttonToggle, iconToggle];

        elements.forEach(el => {
            if (el) {
                el.innerHTML = (theme === "light") ? moonIcon : sunIcon;
                el.setAttribute("aria-label", (theme === "light") ? "Vaheta tumedale teemale" : "Vaheta heledale teemale");
                el.setAttribute("title", (theme === "light") ? "Vaheta tumedale teemale" : "Vaheta heledale teemale");
            }
        });
    }

    // Function to toggle theme
    function toggleTheme() {
        let currentTheme = getCurrentTheme();
        let newTheme = (currentTheme === "light") ? "dark" : "light";

        document.documentElement.setAttribute("data-theme", newTheme);
        localStorage.setItem("astrograaf_theme_pref", newTheme);
        updateButton(newTheme);
    }

    // Update buttons on load
    updateButton(getCurrentTheme());

    // Attach event listener (only if buttons exist)
    if (buttonToggle) buttonToggle.addEventListener("click", toggleTheme);
    if (iconToggle) iconToggle.addEventListener("click", toggleTheme);

    // Listen for system theme changes (only update UI if in auto mode)
    window.matchMedia("(prefers-color-scheme: light)").addEventListener("change", () => {
        if (document.documentElement.getAttribute("data-theme") === "auto") {
            updateButton(getCurrentTheme());
        }
    });
});
</script>
