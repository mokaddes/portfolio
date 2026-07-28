
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<script>
$(document).ready(function () {
    var $body = $('body');
    var $icon = $('#theme-icon');

    // Load saved theme
    var savedLayout = localStorage.getItem('admin-layout') || 'dark-layout';
    $body.removeClass('dark-layout light-layout').addClass(savedLayout);
    $icon.toggleClass('icon-sun', savedLayout === 'dark-layout')
         .toggleClass('icon-moon', savedLayout === 'light-layout');

    // Toggle dark/light
    $('#dark-light-toggle').on('click', function (e) {
        e.preventDefault();
        var isDark = $body.hasClass('dark-layout');
        var newLayout = isDark ? 'light-layout' : 'dark-layout';
        $body.removeClass('dark-layout light-layout').addClass(newLayout);
        localStorage.setItem('admin-layout', newLayout);
        $icon.toggleClass('icon-sun', newLayout === 'dark-layout')
             .toggleClass('icon-moon', newLayout === 'light-layout');
    });
});
</script>

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
<!-- END: Page JS-->
