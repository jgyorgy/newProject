
$( document ).ready(function() {
    $('#rezerva').click(function(e){
        e.preventDefault();
        $.ajax({
                url: 'cautare.php?action=rezerva',
                method: "POST",
                data: '',
                dataType: "json",
                success: function (response) {
                    alert('success');
                    
                },
                error: function (response) {
                    alert('not');
                }
            });
    });
});