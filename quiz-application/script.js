/*var selectedOption;

afunction test(){
    var form = document.getElementById('myForm');
    var options = form.elements['options'];
    console.log("hello");  

    for(var i=0;i<options.length;i++){
            if(options[i].checked){
                selectedOption = options[i].value;
                break;
            }
    }
 
    
    document.getElementById('ans').value = selectedOption;
    console.log(selectedOption);

}
*/

console.log("hello")
function clear(){
    console.log("ho")
    var option = document.getElementsByName('options');
    for(var k=0;k<option.length;k++){
            option[k].checked=false;
        
    }
}

