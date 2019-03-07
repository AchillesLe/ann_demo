
$( document ).ready(function(){
    $('#money').keypress(function(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    });

    $('#addfeedback').on('click',function(){
        var content = $('#content_feedback').val();
        if( content.length > 0){
            $.ajax({
                url:'feedback/add',
                dataType : 'json',
                type : 'post',
                data : { content : content } ,
                success:function(result){
                    if(result){
                        window.location.href = '/feedback';
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(result);
                }
            });
        } 
        $('#addModal').modal('toggle');  
    });

    $('#addTransaction').on('click',function(){
        var idreciever = $('#reciever :selected').val();
        var note = $('#note').val();
        var money = $('#money').val();
        if( parseInt(idreciever) > 0){
             
            $.ajax({
                url:'transaction/add',
                dataType : 'json',
                type : 'GET',
                data : { id : idreciever , money : money , note : note } ,
                success:function(result){
                    if(result){
                        window.location.href = '/transaction';
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(result);
                }
            });
        } 
        $('#addModal').modal('toggle');  
    });
});
