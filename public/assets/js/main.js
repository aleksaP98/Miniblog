$.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
jQuery(document).ready(function($) {

	"use strict";
    var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
            
		});


		setTimeout(function() {

			var counter = 0;

      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();

    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		})

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	};
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};

	var searchToggle = function() {
		if ( $('.js-search-toggle').length > 0 ) {
			$('.js-search-toggle').click(function() {
				if ( $('.js-search-form').hasClass('active') ) {
					$('.js-search-form').removeClass('active');
				} else {
					$('.js-search-form').addClass('active');
				}
				setTimeout(function() {
					$('#s').focus();
				}, 100);

			});


		}
	};
	searchToggle();

    //MODAL CONTROLLER FUNCTION
    const modalController = () =>{
        const modals = $('.modal')
        const buttons = $('.edit')
        const span = $('.close')
        const userImage = $('#userImage img').attr('src')

        buttons.click(function(e) {
            e.preventDefault()
            for (let modal of modals) {
                if ($(modal).data('id') == $(this).data('id')){
                    modal.style.display = "block";
                    if($(modal).data('id') == 2){
                        $('#firstName').val($('#fName').text())
                        $('#lastName').val($('#lName').text())
                        $('#email').val($('#mail').text())
                        $('#nickname').val($('#nick').text())
                    }
                }

            }
            span.click(function() {
                for(let modal of modals){
                    if($(modal).data('id') == $(this).data('id')){
                        $('.modal-img img').attr('src',userImage)
                        $('#imageUpload').val(null)
                        modal.style.display = "none";
                        }
                    }
                })

            $(window).click(function(event) {
                for(let modal of modals){
                    if (event.target == modal) {
                        $('.modal-img img').attr('src',userImage)
                        $('#imageUpload').val(null)
                        modal.style.display = "none";
                    }
                }
            })
        })
    }
    modalController()

    //ACTIVE IMAGE CHANGE
    $('.imageUpload').change(function () {
        readURL(this);
    })

    //OPEN REPLY FORM
    $('.comment-list').on('click','.openReplyForm',function (e) {
        e.preventDefault()
        for(let form of $('.replyForm')){
            if($(form).data('comment') === $(this).data('comment')){
                $(form).show()
            }
        }
        $(this).hide()
    })
    //ADD REPLY
    $('.post-comments').on('submit','.replyForm',function (e) {
        e.preventDefault()
        const idUser = $('#idUser').text();
        const commentId = $(this).data('comment')
        const idPost = $(this).data('post');
        let comment = ''
        for(let commentObj of $('input[name="reply"]')){
            if($(commentObj).data('comment') === commentId){
                comment = $(commentObj).val()
            }

        }
        if(!validateComment(comment)){
            fillCommentError($(this))
            return
        }
        $.ajax({
            url :'/reply',
            method : 'post',
            type : 'json',
            data : {
                idUser : idUser,
                comment : comment,
                idComment : commentId,
                idPost : idPost
            },
            success : function (data) {
                console.log(data);
                let html = ``
                for(let comm of data){
                    if(comm.parent_id == null){
                        html += `<li class="comment-list-item">
                        <div data-id="${comm.id}" class="comment">
                            <div class="entry2">
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 mr-3 float-left"><img src="${APP_URL+'/assets'+comm.src}" alt="${comm.alt}" class="img-fluid"></figure>
                                    <span class="d-inline-block mt-1">By <a href="/profile/${comm.user_id}">${comm.firstName + ' ' + comm.lastName}</a></span>
                                    <span>&nbsp;-&nbsp;${comm.createdAt}</span>
                                    <p>${comm.description}</p>
                                    <a data-comment="${comm.id}" class="openReplyForm" href="#">Write a reply</a>
                                    <form data-post="${comm.post_id}" data-comment="${comm.id}" class="hidden replyForm" >
                                        <input data-comment="${comm.id}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>`
                    for(let reply of data){
                        if(reply.parent_id != null){
                            for(let item of data){
                                if(reply.parent_id == item.id && (item.parent_id == comm.id || reply.parent_id == comm.id)){
                                    html += `<li class="comment-list-item-reply">
                                    <div data-id="${reply.id}" class="comment">
                                        <div class="entry2">
                                            <div class="post-meta align-items-center text-left clearfix">
                                                <figure class="author-figure mb-0 mr-3 float-left"><img src="${APP_URL+'/assets'+reply.src}" alt="${reply.alt}" class="img-fluid"></figure>
                                                <span class="d-inline-block mt-1">By <a href="/profile/${reply.user_id}">${reply.firstName + ' ' + reply.lastName}</a></span>
                                                <span>&nbsp;-&nbsp;${reply.createdAt}</span>
                                                <p>${reply.description}</p>
                                                <a data-comment="${reply.id}" class="openReplyForm" href="#">Write a reply</a>
                                                <form data-post="${reply.post_id}" data-comment="${reply.id}" class="hidden replyForm">
                                                    <input data-comment="${reply.id}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                </li>`
                                }
                            }
                        }
                    }
                }
            }  
            for(let item of $('.comment-list')){
                
                if($(item).data('post') == data[0].post_id){
                    $(item).html(html)
                }
            } 
            },
            error : function (xhr,error,status) {
                console.log(xhr,error,status)
            }
        })
    })

    //ADD COMMENT
    $('.addComment').on('submit','.commentForm',function (e) {
        e.preventDefault();
        let idUser = $('#idUser').text();
        let idPost = $(this).data('post');
        let comment = '';
        for(let commentObj of $('input[name="comment"]')){
            if($(commentObj).data('post') === $(this).data('post')){
                comment = $(commentObj).val()
            }

        }
        if(!validateComment(comment)){
            fillCommentError($(this))
            return
        }
        $.ajax({
            url :'/comment',
            method : 'post',
            type : 'json',
            data : {
                idUser : idUser,
                comment : comment,
                idPost : idPost
            },
            success : function (data) {
               console.log(data);
                let html = ``
                    for(let comm of data){
                        if(comm.parent_id == null){
                            html += `<li class="comment-list-item">
                            <div data-id="${comm.id}" class="comment">
                                <div class="entry2">
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img src="${APP_URL+'/assets'+comm.src}" alt="${comm.alt}" class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By <a href="/profile/${comm.user_id}">${comm.firstName + ' ' + comm.lastName}</a></span>
                                        <span>&nbsp;-&nbsp;${comm.createdAt}</span>
                                        <p>${comm.description}</p>
                                        <a data-comment="${comm.id}" class="openReplyForm" href="#">Write a reply</a>
                                        <form data-post="${comm.post_id}" data-comment="${comm.id}" class="hidden replyForm" >
                                            <input data-comment="${comm.id}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>`
                        for(let reply of data){
                            if(reply.parent_id != null){
                                for(let item of data){
                                    if(reply.parent_id == item.id && (item.parent_id == comm.id || reply.parent_id == comm.id)){
                                        html += `<li class="comment-list-item-reply">
                                        <div data-id="${reply.id}" class="comment">
                                            <div class="entry2">
                                                <div class="post-meta align-items-center text-left clearfix">
                                                    <figure class="author-figure mb-0 mr-3 float-left"><img src="${APP_URL+'/assets'+reply.src}" alt="${reply.alt}" class="img-fluid"></figure>
                                                    <span class="d-inline-block mt-1">By <a href="/profile/${reply.user_id}">${reply.firstName + ' ' + reply.lastName}</a></span>
                                                    <span>&nbsp;-&nbsp;${reply.createdAt}</span>
                                                    <p>${reply.description}</p>
                                                    <a data-comment="${reply.id}" class="openReplyForm" href="#">Write a reply</a>
                                                    <form data-post="${reply.post_id}" data-comment="${reply.id}" class="hidden replyForm">
                                                        <input data-comment="${reply.id}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    </li>`
                                    }
                                }
                            }
                        }
                    }
                }  
                for(let item of $('.comment-list')){
                    
                    if($(item).data('post') == data[0].post_id){
                        $(item).html(html)
                    }
                } 
            },
            error : function (xhr,error,status) {
                console.log(xhr,error,status)
            }
        })
    })
   
    //COMMENTS VALIDATION
    const validateComment = (comment) =>{
        return comment !== '';
    }
    const fillCommentError = (form) =>{
        $(form).children().attr('placeholder','Comment cannot be empty')
        $(form).children().addClass('commentError')
    }

    //DELETE USER CHECK
    $('.deleteBtn a').click(function (e) {
       const confirmed = confirm('Are you sure you want to delete user '+$(this).data('name')+' ?')
        if(!confirmed){
            e.preventDefault()
        }
    })

    //SHOW POSTS OF SELECTED USER
    $('.selectUser').click(function (e) {
        e.preventDefault()
        $.ajax({
            url : '/admin/posts/'
        })
    })

    //ACTIVE IMAGE CHANGE FUNCTION
    const readURL = (input) => {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if($('.modal-img img').length)
                    $('.modal-img img').attr('src', e.target.result);
                else{
                    for(let userImage of $('.user-image')){

                        if($(userImage).data('id')===$(input).data('id'))
                            $(userImage).attr('src', e.target.result);
                    }
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    //CHANGE PROFLE IMAGE
    $('.changeProfileImage').click(function(e){
        e.preventDefault()
        $.ajax({
            url: '/profile/{{$user->id}}/profileImageUpdate',
            method: 'post',
            data: {
                idImage : $(this).data('id'),
                idUser : $('#idUser').text()
            },
            success: function(data){
                for(let element of data){
                    $('.modal-img').html(`<img src="../assets/${element.src}" alt="${element.alt}">`)
                    $('#userImage').html(`<img src="../assets/${element.src}" alt="${element.alt}">`)
                }
                    
            },
            error: function(error){
                alert(error)
            }
        })
    })

    //SEARCH USERS
    const searchForUsers = (input) =>{
        const searchText = $(input).val().trim()
        const searchSpace = searchText.search(' ')
        let firstNameSearch
        let lastNameSearch
        if(searchSpace > -1){
            firstNameSearch = searchText.substring(0,searchSpace);
            lastNameSearch = searchText.substr(searchSpace);
            }
        else{
            firstNameSearch = searchText;
            lastNameSearch = '';
        }
        if(firstNameSearch !== '' || lastNameSearch !== '')
            $.ajax({
                url:'/users?firstName='+firstNameSearch+'&lastName='+lastNameSearch,
                method:'get',
                success:function (users) {
                    let usersContainer =''
                    for (let user of users.data){
                        usersContainer+=
                            `<li class="list-group-item">
                                <a class="list-group-item-action searchUserContainer" href="/profile/${user.id}">
                                    <img class="searchUserImg" src="${APP_URL}/assets${user.src}" alt="${user.alt}">
                                    <p class="searchUserText">${user.firstName} ${user.lastName}</p>
                                </a>
                            </li>`
                    }
                    usersContainer += `<li class="list-group-item"><a class="list-group-item-action" href="${APP_URL}/search?firstName=${firstNameSearch}&lastName=${lastNameSearch}"><span class="icon-search"></span> Search for ${firstNameSearch} ${lastNameSearch}</a>`
                    $('#searchResultList').html(usersContainer)
                    
                },
                error :function (xhr,status,error) {
                    console.log(xhr,status,error)
                }
            })
        else
            $('#searchResultList').html('')
    }
    $('#search').keyup(function () {
        searchForUsers(this)
    })
    $('.searchUsersToggle').click(function (e) {
        e.preventDefault()
        $('.search-form-wrap').toggle()
        $('.search-form-wrap').css({
            'visibility': 'visible',
            'opacity' : 1
        })

        $('.searchResults').show();
    })
    $('.cancelSearch').click(function (e) {
        e.preventDefault()
        $('.search-form-wrap').toggle()
        $('.search-form-wrap').css({
            "visibility" : 'hidden',
            'opacity' : '0'
        })
        $('.searchResults').hide();
    })
});
