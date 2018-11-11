$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter
    $('#medium-id').on('change', function () {
        var mediumId = $(this).val();
        if (mediumId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'medium_id=' + mediumId,
                success: function (types) {
                    $select = $('#type-id');
                    $select.find('option').remove();
                    $.each(types, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#type-id').html('<option value="">Select Category first</option>');
        }
    });
    
});
