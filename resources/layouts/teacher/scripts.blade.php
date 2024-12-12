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
<!-- Datatable JS -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        var e = $("#achievementsTable").DataTable({
                responsive: !0
                , autoWidth: !1
                , language: {
                    url: "dist/js/uzbek.json"
                }
            })
            , t = $("#checkAll");
        t.click(function() {
            e.find("tr").each(function() {
                var e = $(this).find("input.checkItem");
                e.prop("checked", t.prop("checked"))
            })
        }), $(".deleteMessage").click(function() {
            confirm("Xabarni chindan ham o'chirmoqchimisiz?") && alert("Xabar o'chirildi")
        }), $(".confirmAction").click(function() {
            confirm("Tasdiqlamoqchimisiz?") && alert("Tasdiqlandi")
        }), $(".cancelAction").click(function() {
            $("#cancelModal").modal("show")
        }), $("#zipDownload").click(function() {
            var e = $(".checkItem:checked").length;
            if (e > 0) alert("Fayl yuklanish boshlandi"), console.log("ZIP yuklash boshlandi");
            else alert("Siz biror talaba tanlamagansiz")
        })
    })

</script>
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

</script>