function payment(status, amount){
   
    $.ajax({
        type: 'get',
        url: '/Featured/'+amount+'/'+status,
        data: 'amount='+amount+'&status='+status,
        datatype: 'json',
        success: function (json) {    
            console.log(json)       
        },
        complete: function () {
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('error'+errorThrown)
        }
    });
}
var amount = $('#urgent1').val();
$(document).on('click','#urgentPrenium',function (e) {
    payment('urgent', amount)
});
