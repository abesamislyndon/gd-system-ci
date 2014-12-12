$(document).ready(function() {

var MaxInputs       = 20; //maximum input boxes allowed
var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddMoreFileBox"); //Add button ID

var x = InputsWrapper.length; //initlal text box count
var FieldCount=1; //to keep track of text box added

$(AddButton).click(function (e)  //on add input button click
{
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++; //text box added increment
            //add input box
            $(InputsWrapper).append('<div><label><span>Item Description</span><textarea name="item_desc[]" class = "textarea-style id="field_'+ FieldCount +'" value="Text '+ FieldCount +'"></textarea></label><label><span>Item Category</span><select name = "item_cat[]" class = "select-style"><option value="" disabled selected></option>  <option value="Danox arc 200">Danox arc 200</option>  <option value="Real force arc 200">Real force arc 200</option> <option value="Arc machine">Arc machine</option><option value="Tig machine">Tig machine</option> <option value="Mig machine">Mig machine</option><option value="Plasma machine">Plasma machine</option></select></label><label><span>Serial No.</span><input type = "text" name="serial_num[]" class = "textarea-style id="field_'+ FieldCount +'"  '+ FieldCount +'"/></label><a href="#" class="removeclass"><i class="glyphicon glyphicon-trash"></i></a><hr class = "carved"></div>');
            x++; //text box increment
        }
return false;
});

$("body").on("click",".removeclass", function(e){ //user click on remove text
        if( x > 1 ) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox
        }
return false;
}) 
});


