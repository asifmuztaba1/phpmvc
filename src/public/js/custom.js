const onlyNumbers = new RegExp('^[0-9]*$');
const textSpaceNum = new RegExp('^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$');
const onlyText = new RegExp('^[A-Za-z]*$');
const textSpace = new RegExp('^[A-Za-z _]*$');
let errorMsg="";
function validate(elem,data) {
    errorMsg='';
    let errors={
        amount:"",
        buyer:"",
        receipt_id:"",
        items:"",
        buyer_email:"",
        note:"",
        city:"",
        phone:"",
        entry_by:"",
    };
    if(!onlyNumbers.test(data.amount)){errors.amount = "This should be numbers only"}
    if(!textSpaceNum.test(data.buyer)){errors.buyer = "This should be text,numbers and space only"}
    if(!onlyText.test(data.receipt_id)){errors.receipt_id = "This should be text only"}
    if(!onlyText.test(data.items)){errors.items = "This should be text only"}
    if(!textSpace.test(data.city)){errors.city = "This should be text and space only"}
    if(!onlyNumbers.test(data.phone)){errors.phone = "This should be Numbers only"}
    if(!onlyNumbers.test(data.entry_by)){errors.entry_by = "This should be Numbers only"}
    for(er in errors) { if(errors[er]!=='') errorMsg+="<span style='color: red'>"+er.toUpperCase().replaceAll('_', ' ')+"</span>:"+ errors[er]+"<br>"; }
    if(errorMsg!=='') return false;
    return true;
}
$('#homeForm').on('submit',function (){
    let data= {
        amount: $('#amount').val(),
        buyer: $('#buyer').val(),
        receipt_id: $('#receipt_id').val(),
        items: $('#items').val(),
        buyer_email: $('#buyer_email').val(),
        note: $('#note').val(),
        city: $('#city').val(),
        phone: $('#phone').val(),
        entry_by: $('#entry_by').val(),
    };
    if(!validate(this,data)){
        Swal.fire(
            'Error in Data',
            errorMsg,
            'error'
        );
        return false;
    }
    data.phone="+88"+data.phone;

    $.ajax({
        type: "post",
        url: '',
        data: data,
        success: function (response){
            response=JSON.parse(response);
            if (response.status==="success"){
                Swal.fire(
                    'Success',
                    response.msg,
                    'success'
                );
            }else{
                let rm='';
                for(er in response.msg) { if(response.msg[er]!=='') rm+="<span style='color: red'>"+er.toUpperCase().replaceAll('_', ' ')+"</span>:"+ response.msg[er]+"<br>"; }
                Swal.fire(
                    'Error',
                    rm,
                    'error'
                );
            }
        }
    });
    return false;

});
function reportFilter() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("reportFilterInput");
    filter = input.value.toUpperCase();
    console.log(filter);
    table = document.getElementById("reportFilterTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[10];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
