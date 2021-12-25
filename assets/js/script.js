$(document).ready( function() {

$( "#loading" ).hide();      

$("#estados").change(function(){

    $.ajax({
            "type": "POST",
            "url" : "../visual/CidadeSelect.php",
                data: {estado:$(this).val()} ,
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