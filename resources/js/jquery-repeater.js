$("#repeater-form").repeater({
    show: function () {
        $(this).slideDown();
        // updateSelectOptions();
    },
    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
        // updateSelectOptions();
    },
    isFirstItemUndeletable: true,
});

// Fungsi untuk memperbarui opsi select
// function updateSelectOptions() {
//     // Mengambil semua nilai yang telah dipilih pada select sebelumnya
//     let selectedValues = [];
//     $(".repeater-value").each(function() {
//         selectedValues.push($(this).val());
//     });

//     // Menyesuaikan opsi select, menonaktifkan opsi yang sudah dipilih sebelumnya
//     $(".repeater-value").each(function() {
//         let currentSelect = $(this);
//         currentSelect.find("option").each(function() {
//             let optionValue = $(this).val();
//             if (selectedValues.includes(optionValue)) {
//                 $(this).prop("disabled", true); // Nonaktifkan opsi yang sudah dipilih
//             } else {
//                 $(this).prop("disabled", false); // Aktifkan opsi yang belum dipilih
//             }
//         });
//     });
// }