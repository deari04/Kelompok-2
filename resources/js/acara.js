import "jquery.repeater"

$('#acara').on('change', function() {
    const selectValue = $(this).val();
    console.log(selectValue);
    
    $.ajax({
        url: '/pemesanan/detail-penghuni/'+selectValue,
        method: 'GET',
        success: function(response) {
            $(".detail-penghuni").html(response.html);

            $("#repeater-form").repeater({
                show: function () {
                    $(this).slideDown();
                    updateSelectOptions();
                },
                hide: function (deleteElement) {
                    deleteElement();
                    updateSelectOptions();
                },
                isFirstItemUndeletable: true,
            });
            let dataChoice = [];

            const updateSelectOptions = () => {
                dataChoice = [];
                $(".repeater-value").each(function() {
                    dataChoice.push($(this).val());
                });

                console.log(dataChoice);

                $(".repeater-value").each(function() {
                    let currentSelect = $(this);
                    currentSelect.find("option").each(function() {
                        let optionValue = $(this).val();
                        if (selectedValues.includes(optionValue)) {
                       
                        }
                    });
                });
            }
        }
     });
})