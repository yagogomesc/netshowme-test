//Troca a label do upload de arquivo para o nome do arquivo escolhido e seu formato
$('#archive').on('change',function(){
    var archiveName = document.getElementById("archive").files[0].name;

    $(this).next('.custom-file-label').html(archiveName);
})

//Mascara para formatação do numero de telefone
$(document).ready(function() {
    var phone = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    phoneOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(phone.apply({}, arguments), options);
        }
    };

    $('#phone').mask(phone, phoneOptions);
});