


$(document).ready(() => {
    document.emojiSource = "/modules/tam-emoji/img";

    $('#summernote').summernote({
        height: 400,   //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        },
        // airMode: true,
        focus: true,
        placeholder: 'Había una vez una publicación...',
        toolbar: [
            ['insert', ['emoji']],
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



    function getHashtags() {
        $.get('/hashtags', function(result) {
            var hashtags = $.parseJSON(result);
            var hashtagsPost = hashtags.map((e) => {
                return e.hashtag.replace(/#/g, '');
            })
            localStorage.setItem('hastags', JSON.stringify(hashtagsPost));  
        })
    }

    getHashtags()

})