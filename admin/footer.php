<script>
        // Toggle sub-menu
        function toggleSubMenu(event, id) {
            event.stopPropagation(); // Prevent the click from closing the menu immediately
            var submenu = document.getElementById(id);
            var submenus = document.querySelectorAll('.sidebar ul ul');
            submenus.forEach(function (el) {
                if (el !== submenu) el.style.display = 'none';
            });
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
            } else {
                submenu.style.display = 'block';
            }
        }

        // Hide all sub-menus
        function hideAllSubMenus() {
            var submenus = document.querySelectorAll('.sidebar ul ul');
            submenus.forEach(function (el) {
                el.style.display = 'none';
            });
        }

        // Hide sub-menus when clicking outside the sidebar
        document.addEventListener('click', function () {
            hideAllSubMenus();
        });

        // Prevent click inside the sidebar from closing sub-menus
        document.querySelector('.sidebar').addEventListener('click', function (event) {
            event.stopPropagation();
        });
    </script>
</body>

</html>