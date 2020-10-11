
$(document).ready(function(){
    $('.search-input').on('blur focus',function(e){
        $(".results-box").slideToggle(200);
    });
    //make background color white if article red page
    if (window.location.href.indexOf("article/") > -1) {
        $('body').css({'background':'#fff'});
    }
});


//livewire interction
document.addEventListener("livewire:load", () => {
    //show loader when network request starts
    Livewire.hook('element.updating', (fromEl, toEl, component) => {
        $('.loader-overlay-hide').addClass('loader-overlay');
    })
    //hide loader when network request ends
    Livewire.hook('element.updated', (fromEl, toEl, component) => {
        $('.loader-overlay-hide').removeClass('loader-overlay');
    })
});

//share functionality
var popupSize = {
    width: 780,
    height: 550
};

$(document).on('click', '.social-button', function (e) {
    var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
        horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

    var popup = window.open($(this).prop('href'), 'social',
        'width=' + popupSize.width + ',height=' + popupSize.height +
        ',left=' + verticalPos + ',top=' + horisontalPos +
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        e.preventDefault();
    }

});

//share functionality