<?php

/**
 * Light/Dark Switch Header Script
 */
function light_dark_header() {
?>
    <script>
        (function() {
            let theme = localStorage.getItem('astrograaf_theme_pref');
            if (theme) {
                document.documentElement.setAttribute("data-theme", theme);
            }
        })();
    </script>
<?php
}
add_action('wp_head', 'light_dark_header');

/**
 * Light/Dark Switch Body Script
 */
function light_dark_body() {
?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const STORAGE_KEY = "astrograaf_theme_pref";
            const THEME_ATTR = "data-theme";

            const elements = {
                toggleButtons: [
                    document.getElementById("theme-toggle"),
                    document.getElementById("icon-toggle"),
                ].filter(Boolean),
                resetButton: document.getElementById("theme-reset"),
            };

            const icons = {
                sun: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" /> </svg>`,
                moon: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" /> </svg>`,
            };

            const labels = {
                light: "Switch to light theme",
                dark: "Switch to dark theme",
            };

            const prefersLight = () =>
                window.matchMedia("(prefers-color-scheme: light)").matches;

            const getCurrentTheme = () => {
                const attr = document.documentElement.getAttribute(THEME_ATTR);
                return attr === "light" || attr === "dark" ?
                    attr :
                    prefersLight() ?
                    "light" :
                    "dark";
            };

            const setTheme = (theme) => {
                document.documentElement.setAttribute(THEME_ATTR, theme);
                localStorage.setItem(STORAGE_KEY, theme);
                updateButtons(theme);
            };

            const resetTheme = () => {
                document.documentElement.removeAttribute(THEME_ATTR);
                localStorage.removeItem(STORAGE_KEY);
                updateButtons(getCurrentTheme());
            };

            const updateButtons = (theme) => {
                const isLight = theme === "light";
                const icon = isLight ? icons.moon : icons.sun;
                const label = isLight ? labels.dark : labels.light;

                elements.toggleButtons.forEach((btn) => {
                    btn.innerHTML = icon;
                    btn.setAttribute("aria-label", label);
                    btn.setAttribute("title", label);
                });
            };

            const toggleTheme = () => {
                setTheme(getCurrentTheme() === "light" ? "dark" : "light");
            };

            const onActivate = (handler) => (event) => {
                if (
                    event.type === "click" ||
                    event.key === "Enter" ||
                    event.key === " "
                ) {
                    event.preventDefault();
                    handler();
                }
            };

            elements.toggleButtons.forEach((btn) => {
                btn.addEventListener("click", onActivate(toggleTheme));
                btn.addEventListener("keydown", onActivate(toggleTheme));
            });

            if (elements.resetButton) {
                elements.resetButton.addEventListener(
                    "click",
                    onActivate(resetTheme)
                );
                elements.resetButton.addEventListener(
                    "keydown",
                    onActivate(resetTheme)
                );
            }

            window
                .matchMedia("(prefers-color-scheme: light)")
                .addEventListener("change", () => {
                    if (!document.documentElement.hasAttribute(THEME_ATTR)) {
                        updateButtons(getCurrentTheme());
                    }
                });

            updateButtons(getCurrentTheme());
        });
    </script>
<?php
}
add_action('wp_body_open', 'light_theme_switch');
