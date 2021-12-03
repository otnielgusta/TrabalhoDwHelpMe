$(document).ready( function() {

    $( "#loading" ).hide();      
    
    $("#tipoProfissional").change(function(){
    
        $.ajax({
                "type": "POST",
                "url" : "../visual/profissionalSelect.php",
                    data: {tipoProfissional:$(this).val()} ,
                "success" : function(data){
                    $("#resultado").html(data);               
                }
                    
                });
                
        return false;
    
    });
        $( document ).ajaxStart(function() {
            $( "#loading" ).show();
        }).ajaxStop(function() {
            $( "#loading" ).hide();
    
        });;
    })