function message(type,message)
{
    $('.alert').html('<div class="message '+ type +' " onclick="this.classList.add(\'hidden\')">'+ message +'</div>');
}
window.setTimeout(function() {
    $(".message").fadeTo(500, 0).slideUp(500, function(){
        $(this).addClass('hidden');
    });
}, 5000);