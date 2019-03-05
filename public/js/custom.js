$( document ).ready(function(){
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

    $('#addtran').on('click',function(){
        var note = $('#note').val();
        if( content.length > 0){
            // $.ajax({
            //     url:'feedback/add',
            //     dataType : 'json',
            //     type : 'post',
            //     data : { content : content } ,
            //     success:function(result){
            //         if(result){
            //             window.location.href = '/feedback';
            //         }
            //     },
            //     error: function(jqXHR, textStatus, errorThrown){
            //         console.log(result);
            //     }
            // });
        } 
        $('#addModal').modal('toggle');  
    });
});
