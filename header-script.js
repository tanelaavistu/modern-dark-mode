<!-- Light/Dark Switch Header Script -->
<script>
    (function() {
        let theme = localStorage.getItem('astrograaf_theme_pref');
		
        if (!theme || (theme !== "light" && theme !== "dark" && theme !== "auto")) {
            theme = "auto";
            localStorage.setItem("astrograaf_theme_pref", theme);
        }
		
        document.documentElement.setAttribute("data-theme", theme);
    })();
</script>
