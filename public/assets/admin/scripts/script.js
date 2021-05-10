$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.deleteUser').click(function(e){
        e.preventDefault()
        let el = this
        let id = $(this).data('id')
        deleteUserAjax(id,el)
    })
    $('.deletePost').click(function(e){
        e.preventDefault()
        let el = this;
        let id = $(this).data('id')
        deletePostsAjax(id,el);
    })
    const deletePostsAjax = (id,element) => {
        $.ajax({
            url: '/admin/deletePost',
            method : 'delete',
            type: 'json',
            data : {
                id : id
            },
            success: function(data){
                
                $(element).closest('tr').remove();
            },
            error: function(xhr,error,status){
                console.log(xhr)
            }
        })
    }
    const deleteUserAjax = (id,element) => {
        $.ajax({
            url: '/admin/deleteUser',
            method : 'delete',
            type: 'json',
            data : {
                id : id
            },
            success: function(data){
                
                $(element).closest('tr').remove();
            },
            error: function(xhr,error,status){
                console.log(xhr)
            }
        })
    }

})