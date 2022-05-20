$(document).ready(function(){
    $('button').on('click', function(){
        var titleVal = $('input.first').val();
        var contentVal = $('textarea.second').val();
        console.log(titleVal, contentVal);

                $ajax({
                    method: 'POST',
                    url: 'ups.php',
                    data: {
                        firts: titleVal, second: contentVal
                    }
                });

                $('input.first').val('');
                $('textarea.second').val('');
    });
});