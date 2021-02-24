// = for form_1
// Get all data

var forms_1 = document.forms.data_form;      

forms_1.card_pin.oninput = validate;
forms_1.date.oninput = validate;
forms_1.ccv.oninput = validate;

function validate() {
    let card_pin = forms_1.card_pin.value;
    let card_date = forms_1.date.value;
    let card_ccv = forms_1.ccv.value;


    if (card_pin.length > 16) {
        document.getElementById("msg_1").innerHTML = "Invalid pin! Enter 16-digit pin"
        return false; 
    }else if (card_pin.length == 2) {
        document.getElementById("msg_1").innerHTML = "Invalid pin!";
       
        return false; 
    }else document.getElementById("msg_1").innerHTML = "";
       

    if (card_date.length > 4) {
        document.getElementById("msg_2").innerHTML = "Invalid date! Enter valid date e.g(0721)";
        
        return false; 
    }else if (card_date.length == 2) {
        document.getElementById("msg_2").innerHTML = "Invalid date!";
        
        return false; 
    }else document.getElementById("msg_2").innerHTML = "";
        

    if (card_ccv.length > 3) {
        document.getElementById("msg_3").innerHTML = "Invalid CVV! Enter valid CCV";
        
        return false; 
    }else if (card_ccv.length == 2) {
        document.getElementById("msg_3").innerHTML = "Invalid CVV!";
        
        return false;
    }else document.getElementById("msg_3").innerHTML = "";
        
}
    
validate(); 
    

