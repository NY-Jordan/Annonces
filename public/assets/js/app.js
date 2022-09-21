function Validity(){
    console.log('here');
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
 };
Validity();

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

 function verification_email(){
    email = $('#verificationEmail').val();
     $.ajax({
         type: 'get',
         url: '/forgot-password',
         datatype: 'json',
         success: function (json) {      
             console.log('reussis');         
         },
         complete: function () {
             
         },
         error: function (jqXHR, textStatus, errorThrown) {
             console.log('echec');
         }
     });
 }

$(document).on('click','#getNumber',function (e) {
    document.querySelector("#getNumber").setAttribute("disabled", "");
    document.querySelector("#getNumberCancel").setAttribute("disabled", "");
    getNumber();
    
});
$(document).on('click','#show-f-password',function (e) {
    $('#login').modal('hide')
    $('#f-password').modal('show')
}); 

$(document).on('click','#v-password',function (e) {
    verification_email();
});

$(document).on('change','#description',function (e) {
    console.log('yauch');
    document.querySelector("#info_description").innerHTML('<span style="color:red;">eviter de mettre votre téléphone ou email dans la description </span>')
});


