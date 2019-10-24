$( document ).ready(function() {
    $(".tableSelect").change(function(){

        var tableName = $(this).val();

        $.ajax({
            url: '/admin/ajax/',
            method: 'POST',
            dataType: 'json',
            data: {tableName : tableName},
            success: function(data){
                if(data.success){
                    $('.label-group').append(data.html);
                    if ($(".tableSelect option").length > 2)
                    {
                        $('.tableSelect option[value='+tableName+']').remove();
                        $('.tableSelect option:eq(0)').prop('selected', true);
                    }else{
                        $(".tableSelect").remove();
                    }
                }else{
                    alert(data.msg)
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    })
});