// ############### CALCULATION FOR AIR SHIPPING ############
let from_item = document.forms.form_data;

// ============= GET THE FORM INPUTS and assign a function name
from_item.quanty.oninput = calculate;
from_item.weight.oninput = calculate;
from_item.option_2.oninput = calculate;

function calculate() {
    let quantity = from_item.quanty.value;
    
    let weight = from_item.weight.value;
    let option_2 = from_item.option_2.value;

    if (option_2 == 800) {
        var result_items  = (weight * quantity * 10000) + 800 + 0.1;
        document.getElementById("span").innerHTML = result_items;
    }else if (option_2 == 1500) {
        var result_items  = (weight * quantity * 10000) + 1500 + 0.1;
        document.getElementById("span").innerHTML = result_items;
    }else document.getElementById("span_1").innerHTML = "";
    
    

}
    
calculate();



// ############### CALCULATION FOR SEA SHIPPING ############
let sea_form = document.forms.base_sea;
// ============= GET THE FORM INPUTS and assign a function name
sea_form.quanty_1.oninput = mathematic;
sea_form.weight_1.oninput = mathematic;
sea_form.option_4.oninput = mathematic;

function mathematic() {
    let quanty_1 = sea_form.quanty_1.value;
    
    let weight_1 = sea_form.weight_1.value;
    let option_4 = sea_form.option_4.value;

    if (option_4 == 800) {
        var total_logic = (quanty_1 * weight_1 * 2000) + 800 + 0.1;
        document.getElementById("span_1").innerHTML = total_logic;
    }else if (option_4 == 1500) {
        var total_logic = (quanty_1 * weight_1 * 2000) + 1500 + 0.1;
        document.getElementById("span_1").innerHTML = total_logic;
    }else document.getElementById("span_1").innerHTML = "";
    
    

}
    
mathematic();

  
       
   

   
    
   
    

// ======= DISPLAY AND HIDE CONTENT ==
var air = document.getElementById('ship_air');
var sea = document.getElementById('ship_sea');
var check = document.getElementById('reg7');
var lebel = document.getElementById('leb');

lebel.addEventListener('click', function () {
    document.getElementById('ship_air').classList.toggle('hide');
})

