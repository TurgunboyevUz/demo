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

$(function() {
    $("table").each(function() {
        var e = $(this).DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: "{{ asset('dist/js/uzbek.json') }}"
            }
        });

        var t = $(this).find(".checkAll");

        t.click(function() {
            $(this).closest("table").find("tr").each(function() {
                var e = $(this).find("input.checkItem");
                e.prop("checked", t.prop("checked"));
            });
        });

        $(this).find("#zipDownload").click(function() {
            var e = $(this).closest("table").find(".checkItem:checked").length;
            if (e > 0) {
                alert("Fayl yuklanish boshlandi");
                console.log("ZIP yuklash boshlandi");
            } else {
                alert("Siz biror talaba tanlamagansiz");
            }
        });
    });

    $(".confirmAction").click(function(e) {
        e.preventDefault();

        var itemId = $(this).data('id');
        var url = $(this).data('url');
        var csrfToken = $(this).data('csrf');

        if (confirm("Tasdiqlamoqchimisiz?")) {
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: csrfToken,
                    id: itemId
                },
                success: function(response) {
                    alert(response.message);

                    window.location.reload();
                },
                error: function(xhr) {
                    alert('Xatolik yuz berdi: ' + xhr.responseText);
                }
            });
        }
    });

    let cancelItemId = null;

    $(".cancelAction").click(function() {
        cancelItemId = $(this).data("id");
        var cancelUrl = $(this).data('url');
        var csrfToken = $(this).data('csrf');
        
        $("#cancelModal").modal("show");

        $("#cancelModal .btn-primary").click(function() {
            const reason = $("#cancelModal textarea").val();

            if (!reason) {
                alert("Bekor qilish sababini kiriting!");
                return;
            }

            $.ajax({
                url: cancelUrl,
                type: "POST",
                data: {
                    id: cancelItemId,
                    reason: reason,
                    _token: csrfToken
                },
                success: function(response) {
                    alert(response.message);
                    $("#cancelModal").modal("hide");

                    window.location.reload();
                },
                error: function(xhr) {
                    alert("Bekor qilishda xatolik yuz berdi.");
                }
            });
        });
    });
});