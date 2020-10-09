
$(document).ready(function(){
    $('.search-input').on('blur focus',function(e){
        $(".results-box").slideToggle(200);
    });
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


// 404 page js



// 404 page js ends