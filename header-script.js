<!-- For Light Theme with Auto Option -->
<script>
    (function() {
        let theme = localStorage.getItem('astrograaf_theme_pref');
	let defaultTheme = "auto";
	
        if (!theme || (theme !== "light" && theme !== "dark" && theme !== "auto")) {
            theme = defaultTheme;
            localStorage.setItem("astrograaf_theme_pref", theme);
        }
	
        document.documentElement.setAttribute("data-theme", theme);
    })();
</script>
