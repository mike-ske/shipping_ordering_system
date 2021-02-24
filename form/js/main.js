// = for form_1
// Get all data
var input1 = document.getElementById('input_1');
    var input2 = document.getElementById('input_2');
    var input3 = document.getElementById('input_3');
    var input4 = document.getElementById('input_4');
    var input5 = document.getElementById('input_5');
    var input6 = document.getElementById('input_6');
    var input7 = document.getElementById('input_7');


        document.getElementById('next').addEventListener('click', function () {
            if (input1.value !== "" && input2.value !== "" && input3.value !== "" && input4.value !== "" && input5.value !== "" && input6.value !== "" && input7.value !== ""){
        
            document.getElementById('form_2').classList.add('show');
            }else document.getElementById('form_2').classList.remove('show');
   
        })
       
   
       
   
    
   
    

