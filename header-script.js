<!-- Light/Dark Switch Header Script -->
<script>
    (function() {
        let theme = localStorage.getItem('astrograaf_theme_pref');
        if (theme) {
			document.documentElement.setAttribute("data-theme", theme);
        }
    })();
</script>
