
function setup(){
    
    $('#lookup').click(function(){
        $('#result').html('');
        var text = $('#country').val();
        var all = $('#all').is(":checked");
        
        if(all==true){
             $.get('world.php?all=true',function(data){
                $('#result').html(data);
            });
        } else{
            $.get('world.php?country='+text,function(data){
                $('#result').html(data);
            });
        };
    })
}

$(document).ready(setup);
