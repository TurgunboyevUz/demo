<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Loader JS -->
<script src="{{ asset('dist/js/loader.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Dashboard JS -->
<script src="{{ asset('dist/js/dashboard.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const currentUrl = window.location.href; // Get the current URL
        const navLinks = document.querySelectorAll('.nav-link'); // Select all navigation links

        navLinks.forEach(link => {
            if (link.href === currentUrl) {
                link.classList.add('active'); // Add 'active' class to the matching link
            } else {
                link.classList.remove('active'); // Ensure other links do not have 'active'
            }
        });
    });

    $(document).ready(function() {
        $(".btn-primary").on("click", function() {
            const reason = $(this).data("reason");

            $("#reject-reason").text(reason || "Rad etilish sababi mavjud emas");

            $("#rejectModal").modal("show");
        });

        $(".btn-close, .btn-secondary").on("click", function() {
            $("#rejectModal").modal("hide");
        });
    });

    function toggleTeamInputs() {
        const participants = document.getElementById('participant');
        const teamMembers = document.getElementById('teamMembers');

        if (participants.value === 'team') {
            teamMembers.style.display = 'block';
        } else {
            teamMembers.style.display = 'none';
        }
    }

</script>
