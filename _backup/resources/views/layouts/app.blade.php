<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>

    <script>
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).ready(function() { 
        moment.locale('es');
        var height = $(window).height();
        $('.messages-container').height(height-115);
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

        $('.messages-container').each(function(){
            var $this = $(this);
            $this.append($this.find('.contact-list').get().sort(function(a, b) {
                return $(b).data('index') - $(a).data('index');
            }));
        });

        var eventNotification = new EventSource("/notifications/stream/");
        eventNotification.onmessage = function(e) {    
        var notification = $.parseJSON(e.data);
        if(notification.length > 0) {
            notification.forEach((n) => {
                if(n.type === 'message') { 
                   $current = $('#contact-'+n.reference).addClass('notificated')[0].outerHTML;
                   $('#contact-'+n.reference).remove();
                   $(".messages-container").prepend($current);
                   $('#news-'+n.reference).html(moment().calendar());

                   var currentChat = $('#user_id_to').val();
                   if(currentChat == n.reference) {
                     getMessages(n.reference)
                   }
                }
            });
        }
    
       }
       
       
        getHashtags()

        function getHashtags() {
            $.get('/hashtags', function(result) {
                var hashtags = $.parseJSON(result);
                var hashtagsPost = hashtags.map((e) => {
                    return e.hashtag.replace(/#/g, '');
                })
                localStorage.setItem('hastags', JSON.stringify(hashtagsPost));  
            })
        }

        $('#summernote').summernote({
            height: 400,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            // airMode: true,
            focus: true,
            placeholder: 'Había una vez una publicación...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['table', ['table']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['link'],
                ['style', ['style']],
                ['Insert', ['picture']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                },
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            },
            hint: [{
                    mentions: JSON.parse(localStorage.getItem('hastags')),
                    match: /\B#(\w*)$/,
                    search: function (keyword, callback) {
                        callback($.grep(this.mentions, function (item) {
                        return item.indexOf(keyword) == 0;
                        }));
                    },
                    content: function (item) {
                        return '#' + item + ' ';
                    }    
                }, {
                    mentions: JSON.parse(localStorage.getItem('classmates')),
                    match: /\B@(\w*)$/,
                    search: function (keyword, callback) {
                        callback($.grep(this.mentions, function (item) {
                        return item.indexOf(keyword) == 0;
                        }));
                    },
                    content: function (item) {
                        return '@' + item + ' ';
                    }    
                }
            ]
        });

       function uploadImageContent(image, editor) {
            var data = new FormData();
            data.append("image", image);
            data.append("hash", $('#hash').val());
                $.ajax({
                    url: '/upload/images',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function(url) {
                        var image = $('<img>').attr({
                            'src': url,
                            'style': 'width: 100%'
                        });
                        $(editor).summernote("insertNode", image[0]);
                    },
                        error: function(data) {
                }
            })
        }

        function getMessages(id) {
            $.get('/messages/inbox/'+id, function(result) {
                var messages = $.parseJSON(result);
                messages.forEach((m) => { 
                    if(moment().isSame(moment(m.created_at), 'day')) {
                        date = moment(m.created_at).calendar();
                    } else {
                        date = moment(m.created_at).format('LLLL')
                    }
                    var photoUser = $('#photo-'+m.user_id).val();
                 
                    var isMe = !(m.user_id == id);
                    if(!isMe) {
                    $('#inbox').append(`
                        <div class="row mt-4">
                            <div class="col-md-1">
                                <div class='picture'><img src="`+photoUser+`" width="55"></div>
                            </div>
                            <div class="col-md-8 chat-box chat-text p-3" style="border: 1px solid #eae9e9;">
                                <div class='writer'><strong>`+m.name+`</strong> <span class='date'> `+date+`</span></div>
                                <p class="chat-content">`+m.text+`</p>
                            </div>
                            </div>
                        </div>    
                    `)
                    } else {
                        $('#inbox').append(`
                    <div class="row mt-4">
                        <div class="col-md-2 mr-4">
                        </div>
                        <div class="col-md-8 chat-box chat-text-me p-3" style="background-color: #eae9e957">
                            <div class='writer'><strong>`+m.name+`</strong> <span class='date'>`+date+`</span></div>
                            <p class="chat-content">`+m.text+`</p>
                        </div>
                        <div class="col-md-1">
                            <div class='picture'><img src="`+photoUser+`" width="55"></div>
                        </div>
                        </div>    
                    `)
                    }
                });

            }).done(function() {
                $("#inbox").animate({ scrollTop: $('#inbox').prop("scrollHeight")}, 0);
            })
        }

        $(document).on('click', '.contact-inbox', function(e) {
            var id = this.id

            $('.active').removeClass('active')
            $('#contact-'+id).addClass('active');
            $('.write-a-message').show();
            var height = $(window).height();
            $('.inbox-content').height(height-330);
            $('#inbox').height(height-330);
            
           e.preventDefault();
           $.post('/notifications/ok', { user_id_to: id }, function(d) {
                $('#contact-'+id).removeClass('notificated');
           });

           $('#user_id_to').val(id);
           $('#inbox').html('');
           getMessages(id);
        });

        $('.send-message').click(function (e) {
           e.preventDefault();
           var id = $('#user_id_to').val();
           var message = $('#message').val();
           
            $.post('/message', { user_id_to: id, message: message }, function(data) {
                var color = '#eae9e97a';
                var photoUser = $('#photo-1').val();

                $('#inbox').append(`
                    <div class="row mt-4">
                    <div class="col-md-2 mr-4">
                        </div>
                    <div class="col-md-8 chat-text-me p-3" style="background-color: #eae9e957">
                            <div class='writer'><strong>`+data.name+`:</strong></div>
                            <p class="chat-content">`+message+`</p>
                            <div class='date'>Recién</div>
                        </div>
                        <div class="col-md-1">
                            <div class='picture'><img src="`+photoUser+`" width="55"></div>
                        </div>
                        </div>    
                    `) 
            });
            $current = $('#contact-'+id)[0].outerHTML;
            $('#contact-'+id).remove();
            $(".messages-container").prepend($current);

            $("#inbox").animate({ scrollTop: $('#inbox').prop("scrollHeight")}, 1000);
            $('#message').val('')
            $.post('/notifications/ok', { user_id_to: id }, function(d) {
                $('#contact-'+id).removeClass('notificated');
            });
        })
        $('.love').click(function (e) {
           e.preventDefault();
           var id = this.id
            $.post('/love', { post: id }, function(data) {
                if(data == 0) {
                    $('#'+id).attr({ "src": "imgs/como.png" });
                    $('#'+id).attr({ "data-original-title": "Desfavoritear" });
                } else { 
                    $('#'+id).attr({ "src": "imgs/como_empty.png" });
                    $('#'+id).attr({ "data-original-title": "Favoritear" });
                }
            });
        })
        $('#passwordChannge').click(function (e) {
           e.preventDefault();
           var oldPassword = $('#old-password').val()
           var newPassword = $('#new-password').val()
           var renewPassword = $('#renew-password').val()

            $.post('/profile', { old: oldPassword, new: newPassword, renew: renewPassword }, function(data) {
                if (data.result === 0) {
                    $('.passwordnotequals').css('display', 'block')
                }
                if (data.result === -1) {
                    $('.passwordincorrect').css('display', 'block')
                }
                if (data.result === -3) {
                    $('.passwordshort"').css('display', 'block')
                }
                if (data.result === 1) {
                    $('.passwordcorrect"').css('display', 'block')
                }
            });
        })

        $('#file-input').on('change', function() {
            $('#upload').removeAttr('disabled')
        });

        $('#upload_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('profile.upload.avatar') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    $('#upload').attr('disabled')
                    $('#img-content').html(data.uploaded_image)
                }
            })
        });
        $('.submit_comment').click(function (e) {
           e.preventDefault();
           var id = $('#postid').val()
           var text = $('#comment').val()
            $.post('/comment', { post: id, text: text }, function(data) {
                var comment =   "<div class=card-body>"+
                                    "<h5 class='card-title'>"+ data.data.user[0].name +"</h5>"+
                                    "<h6 class='card-subtitle mb-2 text-muted'> Recientemente </h6>"+
                                    "<p class='card-text'>"+ data.data.text +"</p>"+
                                    "<a href=# class='card-link'>Responder</a>"+
                                    "<a href=# class='card-link'>Eliminnar</a>"+
                                "</div>"
                $("#comments").append(comment)
                $('#comment').val('')
            });
        })
    });
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ url('/imgs/toqui.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                     
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item mt-1">
                                <a class="nav-link" href="/post/create"><img src="{{ url('/imgs/write.svg') }}" class="mr-2" width='25'>Escribir un post</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link" href="/home"><img src="{{ url('/imgs/book.svg') }}" class="mr-2" width='25'>Mi clase</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link" href="/messages"><img src="{{ url('/imgs/messages.svg') }}" width='25' class="mr-2">Mensajes</a>
                            </li>
                            <li class="nav-item dropdown" style="margin: auto;">
                               
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/images/_{{ Auth::user()->photo }}" width="32" height="32" class="rounded-circle mr-2 ml-2"> 
                                <span>{{ Auth::user()->name }}</span>
                                <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/profile/{{ Auth::user()->id }}" class="dropdown-item">Editar mi perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
