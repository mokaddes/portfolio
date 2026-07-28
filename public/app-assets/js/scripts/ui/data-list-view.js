$(document).ready(function () {
    "use strict";

    // DataTables init for thumb view
    if ($(".data-thumb-view").length > 0) {
        var dataThumbView = $(".data-thumb-view").DataTable({
            responsive: false,
            columnDefs: [{ orderable: true, targets: 0 }],
            dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
            oLanguage: { sLengthMenu: "_MENU_", sSearch: "" },
            aLengthMenu: [[10, 15, 20, 25], [10, 15, 20, 25]],
            select: { style: "multi" },
            order: [[1, "asc"]],
            bInfo: false,
            pageLength: 10,
            buttons: [{
                text: "<i class='feather icon-plus'></i> Add New",
                action: function () {
                    resetForm();
                    $(".add-new-data").addClass("show");
                    var storeRoute = $("#store_route").val();
                    if (storeRoute) {
                        $(".add-new-data form").attr("action", storeRoute);
                    }
                    $(".overlay-bg").addClass("show");
                },
                className: "btn-outline-primary"
            }],
            initComplete: function () {
                $(".dt-buttons .btn").removeClass("btn-secondary");
            }
        });

        dataThumbView.on('draw.dt', function () {
            setTimeout(function () {
                if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                    $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox");
                }
            }, 50);
        });
    }

    // Move action dropdown before dt-buttons
    var actionDropdown = $(".actions-dropodown");
    if (actionDropdown.length && $(".top .actions .dt-buttons").length) {
        actionDropdown.insertBefore($(".top .actions .dt-buttons"));
    }

    // Scrollbar for form
    if ($(".data-items").length > 0) {
        new PerfectScrollbar(".data-items", { wheelPropagation: false });
    }

    // --- FORM HELPERS ---

    function resetForm() {
        var form = $(".add-new-data form");
        form.find("input[type=text], input[type=url], input[type=number], input[type=email], textarea, select").val("");
        form.find("input[type=checkbox]").prop("checked", false);
        form.find("input[type=hidden][name=_method]").remove();
        form.find(".add-data-btn button").html("Save");
        form.find(".new-data-title h4").text("Add New");
        // Reset action to store route
        var storeRoute = $("#store_route").val();
        if (storeRoute) form.attr("action", storeRoute);
    }

    function populateEditForm(data) {
        var form = $(".add-new-data form");
        resetForm();

        if (data.update_route) {
            form.attr("action", data.update_route);
        }

        form.find(".add-data-btn button").html("Update");
        form.find(".new-data-title h4").text("Edit");

        // Populate fields by name attribute
        $.each(data, function (key, val) {
            if (key === "update_route") return;
            var $input = form.find("[name='" + key + "']");
            if ($input.length === 0) return;
            var type = $input.attr("type");
            if (type === "checkbox") {
                $input.prop("checked", val == 1 || val === true || val === "1");
            } else if ($input.is("select")) {
                $input.val(val).trigger("change");
            } else {
                $input.val(val);
            }
        });
    }

    // --- EDIT ---
    $(".action-edit").on("click", function (e) {
        e.preventDefault();
        var raw = $(this).attr("data-edit");
        if (raw) {
            try {
                var data = JSON.parse(raw);
                populateEditForm(data);
            } catch (err) {
                console.error("Invalid data-edit JSON", err);
            }
        }
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
    });

    // --- CLOSE ---
    $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function () {
        $(".add-new-data").removeClass("show");
        $(".overlay-bg").removeClass("show");
        resetForm();
    });

    // --- AJAX submit via .submitBtn (categories page) ---
    $(".submitBtn").on("click", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");
        if (!form.length) form = $(".add-new-data form");
        var url = form.attr("action");
        var data = form.serialize();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            success: function () {
                $(".add-new-data").removeClass("show");
                $(".overlay-bg").removeClass("show");
                location.reload();
            },
            error: function (xhr) {
                alert("Error: " + (xhr.responseJSON ? xhr.responseJSON.message : "Request failed"));
            }
        });
    });

    // Mac checkbox fix
    if (navigator.userAgent.indexOf("Mac OS X") !== -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox");
    }
});
