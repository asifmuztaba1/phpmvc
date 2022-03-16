const MINUIT_TO_BLOCK=24*60;
const onlyNumbers = new RegExp('^[0-9]*$');
const textSpaceNum = new RegExp('^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$');
const textSpace = new RegExp('^[A-Za-z _]*$');
const textSpaceComma = new RegExp('^[A-Za-z ,_]*$');
let datefilter=$('#reportFilterInput');
let errorMsg = "";
function validate(elem, data) {
    errorMsg = '';
    let errors = {
        amount: "",
        buyer: "",
        receipt_id: "",
        items: "",
        buyer_email: "",
        note: "",
        city: "",
        phone: "",
        entry_by: "",
    };
    if (!onlyNumbers.test(data.amount)) {
        errors.amount = "This should be numbers only"
    }
    if (!textSpaceNum.test(data.buyer)) {
        errors.buyer = "This should be text,numbers and space only"
    }
    if (!textSpace.test(data.receipt_id)) {
        errors.receipt_id = "This should be text only"
    }
    if (!textSpaceComma.test(data.items)) {
        errors.items = "This should be text only"
    }
    if (!textSpace.test(data.city)) {
        errors.city = "This should be text and space only"
    }
    if (!onlyNumbers.test(data.phone)) {
        errors.phone = "This should be Numbers only"
    }
    if (!onlyNumbers.test(data.entry_by)) {
        errors.entry_by = "This should be Numbers only"
    }
    for (er in errors) {
        if (errors[er] !== '') errorMsg += "<span style='color: red'>" + er.toUpperCase().replaceAll('_', ' ') + "</span>:" + errors[er] + "<br>";
    }
    if (errorMsg !== '') return false;
    return true;
}
function reportFilter(sdat,edat) {
    let table, tr, td, i, txtValue;
    table = document.getElementById("reportFilterTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[10];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue>=sdat && txtValue<=edat) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function setCookie(){
    let date = new Date();
    let minutes = MINUIT_TO_BLOCK;
    date.setTime(date.getTime() + (minutes * 60 * 1000));
    document.cookie = "usersubmit=true; expires="+date.toUTCString()+"; path=/";
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
$('#homeForm').on('submit', function () {
    if(getCookie("usersubmit")){
        Swal.fire(
            'Error in Data',
            "You can not submit again. Please try after "+(MINUIT_TO_BLOCK/24).toFixed(2)+" hours",
            'error'
        );
        return false;
    }
    let data = {
        amount: $('#amount').val(),
        buyer: $('#buyer').val(),
        receipt_id: $('#receipt_id').val(),
        items: $('#items').val().toString(),
        buyer_email: $('#buyer_email').val(),
        note: $('#note').val(),
        city: $('#city').val(),
        phone: $('#phone').val(),
        entry_by: $('#entry_by').val(),
    };
    if (!validate(this, data)) {
        Swal.fire(
            'Error in Data',
            errorMsg,
            'error'
        );
        return false;
    }
    data.phone = "+88" + data.phone;
    $.ajax({
        type: "post",
        url: 'home',
        data: data,
        success: function (response) {
            response = JSON.parse(response);
            if (response.status === "success") {
                Swal.fire(
                    'Success',
                    response.msg,
                    'success'
                );
                setCookie();
                $(this).trigger("reset");
            } else {
                let rm = '';
                for (er in response.msg) {
                    if (response.msg[er] !== '') rm += "<span style='color: red'>" + er.toUpperCase().replaceAll('_', ' ') + "</span>:" + response.msg[er] + "<br>";
                }
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
datefilter.daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear',
        format: 'YYYY-MM-DD'
    }
});
datefilter.on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    reportFilter(picker.startDate.format('YYYY-MM-DD'),picker.endDate.format('YYYY-MM-DD'));
});

datefilter.on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
$('#items').chosen();