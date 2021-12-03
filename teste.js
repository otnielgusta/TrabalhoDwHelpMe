function calculaSoma(){
    let n1 = document.getElementById('n1').value;
    let n2 = document.getElementById('n2').value;
    
    if (n1 =="" || n2 =="") {
        alert("Há campos vazios");
    }else{
        var soma = parseInt(n1) + parseInt(n2);

        let result = document.getElementById('result');
        result.innerText = soma;
        
        result.style.color = "#8257E6";
   
        
    }

}