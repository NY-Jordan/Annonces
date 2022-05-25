
function getNumber(){
   id = $('#idPost').val();
    $.ajax({
        type: 'get',
        url: '/getNumber',
        data: 'id='+id,
        datatype: 'json',
        success: function (json) {      
            $('#Validation_get_phone').modal('hide')   
            $('#bodyAlert').html(json.message);
            $('#success').modal('show');
            if (json.message === "operation reussi ✔") {
                setTimeout(window.location.reload(), 3000)
            } else {
                document.querySelector("#getNumber").removeAttribute("disabled");
                document.querySelector("#getNumberCancel").removeAttribute("disabled");
            }
            

        },
        complete: function () {
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('error'+errorThrown)
            $('#Validation_get_phone').modal('hide')
            document.querySelector("#getNumber").removeAttribute("disabled");
            document.querySelector("#getNumberCancel").removeAttribute("disabled");
            $('#pasConnecter').modal('show');
        }
    });
}


(function Validity(){
    
     $.ajax({
         type: 'get',
         url: '/verification',
         datatype: 'json',
         success: function (json) {      
             console.log('verification terminé');
         },
         complete: function () {             
         },
         error: function (jqXHR, textStatus, errorThrown) {
            console.log("echec de la verification");
         }
     });
 })();

$(document).on('click','#getNumber',function (e) {
    document.querySelector("#getNumber").setAttribute("disabled", "");
    document.querySelector("#getNumberCancel").setAttribute("disabled", "");
    getNumber();
    
});



