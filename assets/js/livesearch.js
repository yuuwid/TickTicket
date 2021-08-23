
function load_data(key, keyword, resultdata, url) {
    $.ajax({
        method: "POST",
        url: url,
        data: { 
            key: key, 
            keyword: keyword 
        },
        success: function (hasil) {
            $('.'+resultdata).html(hasil);
        }
    });
}

function livesearch(key, IDinput, resultdata, search_box, url) {
    $(document).ready(function () {
        load_data(url);

        $('#'+IDinput).keyup(function () {
            var fieldkeyword = $("#"+IDinput).val();
            load_data(key, fieldkeyword, resultdata, url);
        });

        $(document).on('click', '.' + resultdata, function(){
            $(this).parents('.' + search_box).find('input[type="text"]').val($(this).text());
            $(this).parent('.' + resultdata).empty();
        })

    });
}

$(document).ready(function(){
    $('#pesawatDari').on('click', function(){
        livesearch('dari', 'pesawatDari', 'data-search-dari', 'search-box-dari', "data_pesawat.php")
    })
})

$(document).ready(function(){
    $('#pesawatKe').on('click', function(){
        livesearch('tujuan', 'pesawatKe', 'data-search-ke', 'search-box-ke', "data_pesawat.php")
    })
})


$(document).ready(function(){
    $('#keretaDari').on('click', function(){
        livesearch('dari', 'keretaDari', 'data-search-dari', 'search-box-dari', "data_kereta.php")
    })
})

$(document).ready(function(){
    $('#keretaKe').on('click', function(){
        livesearch('tujuan', 'keretaKe', 'data-search-ke', 'search-box-ke', "data_kereta.php")
    })
})

$(document).ready(function(){
    $('#hotelKota').on('click', function(){
        livesearch(['kota', 'Hotel'], 'hotelKota', 'data-search-kota', 'search-box-kota', "data_hotel.php")
    })
})