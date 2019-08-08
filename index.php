# append-addition

<style type="text/css">
    

    .form-holder {
  display: flex;
  margin-bottom: 10px;
}

.input-field input {
  width: 100px;
}

.add, .remove {
  display: block;
  border: 1px solid #ccc;
  padding: 2px 10px;
  margin-left: 10px;
  cursor: pointer;
}

.add:hover {
  background: #eee;
}

.remove {
  display: none;
}

.form-holder-append .remove {
  display: block;
}

body {
  margin: 20px;
}


</style>
<form  method="post">
<div id="order-details-booking">

        <blockquote>Calculating total of items  </blockquote>

        <div class="row fields_wrap">
          <div class="form-holder col-xs-12 ">
            <div class="input-field col s4">
                <input type="text" id="item-code" placeholder="Item Code"/>
            </div>
            <div class="input-field col s2">
                <input type="text" name="quantity" id="quantity1" placeholder="Qty"  onchange="calc(1)" />
            </div>
            <div class="input-field col s2">
                <input type="text" name="rate" id="rate1" placeholder="Rate" onchange="calc(1)"  />
            </div>

            <div class="input-field col s5">
                <input type="text" name="total[]" class="total" id="total_amnt1" placeholder="total" onchange="calc(1)"  />
            </div>
            <div class="input-field col s5">
                <input type="text" id="item-code" placeholder="Remarks" />
            </div>
            <div class="col s1">
                <i class="material-icons remove">- remove</i>
            </div>
        </div>

          <div class="form-holder-append"></div>
          <div class="row">
                    <div class="col-xs-4">
            <button id="ref" class="btn btn-success" >add</button>
            </div></div>
    </div>

    <div class="input-field col s5">
                <input type="text" name="sub_total" id="subtotal" placeholder="total" onchange="calc(1)"  />
            </div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
var max_fields      = 5; //maximum input boxes allowed
var wrapper         = $(".fields_wrap"); //Fields wrapper
var add_button      = $("#ref"); //Add button ID
var x = 2; //initlal text box count

$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
var fieldHTML   ='<div class="form-holder col-xs-12"><div class="input-field col s4"><input type="text" id="item-code" placeholder="Item Code"/></div><div class="input-field col s2"><input type="text" name="quantity" id="quantity'+x+'" placeholder="Qty"  onchange="calc('+x+')" /></div><div class="input-field col s2"><input type="text" name="rate" id="rate'+x+'" placeholder="Rate" onchange="calc('+x+')"  /></div> <div class="input-field col s5"><input type="text" name="total[]" class="total" id="total_amnt'+x+'" placeholder="total" onchange="calc('+x+')"  /></div><div class="input-field col s5"><input type="text" id="item-code" placeholder="Remarks" /></div><div class="col s1"><i class="material-icons remove">- remove</i></div></div> <a href="#" class=" remove_field btn btn-danger col-sm-1" ><i class="fa fa-close"></i></a></div>';
$(wrapper).append(fieldHTML); //add input box
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x--;
})
});
</script>


<script type="text/javascript">

  


function calc(x) {

  var quantity = document.getElementById("quantity"+x).value;
  var rate = document.getElementById("rate"+x).value;  
  var sum =document.getElementById("total_amnt"+x).value = quantity * rate; 

  // var total_amt = $(".total").val();
  // var tot=Math.round(total_amt);
  // alert(tot);
  var sm = 0;
    $(".total").each(function(){
        sm += +$(this).val();
    });
    $("#subtotal").val(sm);
  
}



</script>
