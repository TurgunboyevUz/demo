<!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Loader JS -->
    <script src="dist/js/loader.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Dashboard JS -->
    <script src="dist/js/dashboard.js"></script>
    <!-- Datatable JS -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>$(function () { var e = $("#achievementsTable").DataTable({ responsive: !0, autoWidth: !1, language: { url: "dist/js/uzbek.json" } }), t = $("#checkAll"); t.click(function () { e.find("tr").each(function () { var e = $(this).find("input.checkItem"); e.prop("checked", t.prop("checked")) }) }), $(".deleteMessage").click(function () { confirm("Xabarni chindan ham o'chirmoqchimisiz?") && alert("Xabar o'chirildi") }), $(".confirmAction").click(function () { confirm("Tasdiqlamoqchimisiz?") && alert("Tasdiqlandi") }), $(".cancelAction").click(function () { $("#cancelModal").modal("show") }), $("#zipDownload").click(function () { var e = $(".checkItem:checked").length; if (e > 0) alert("Fayl yuklanish boshlandi"), console.log("ZIP yuklash boshlandi"); else alert("Siz biror talaba tanlamagansiz") }) })</script>