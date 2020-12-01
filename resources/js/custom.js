//Troca a label do upload de arquivo para o nome do arquivo escolhido e seu formato
$('#archive').on('change',function(){
    var archiveName = document.getElementById("archive").files[0].name;

    $(this).next('.custom-file-label').html(archiveName);
})
