export function setLikeButtons() {
    let token = document.head.querySelector('meta[name="csrf-token"]').content;
    let targetId = 0;
    var urlLike = './updateLikeStatus';
    $('.btn-dislike').on('click', function (event) {

        event.preventDefault();
        targetId = event.target.parentNode.parentNode.dataset['userid'];

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: 0, targetId: targetId, _token: token}
        })
            .done(function () {
                $(event.target).closest('.profile-card', 'div').animate({
                    opacity: 0.0,
                    marginLeft: '-225px',
                }, 'fast', 'linear', function() {
                    $(this).remove();
                });
                $('.modal-backdrop').css('z-index','100').fadeOut(350);
                $('body').removeClass('modal-open').css("padding-right", "");
                if(
                    $('.profile-card').length<=1 && $('.card-header').html()=="Home"
                ) {
                    getProfiles();
                }
            });
    });


    $('.btn-no-like-status').on('click', function (event) {

        event.preventDefault();
        targetId = event.target.parentNode.parentNode.dataset['userid'];

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: 1, targetId: targetId, _token: token}
        })
            .done(function () {
                $(event.target).closest('.profile-card', 'div').animate({
                    opacity: 0.0,
                    marginLeft: '-225px',
                }, 'fast', 'linear', function() {
                    $(this).remove();
                });
                $('.modal-backdrop').css('z-index','100').fadeOut(350);
                $('body').removeClass('modal-open').css("padding-right", "");
                if(
                    $('.profile-card').length<=1 && $('.card-header').html()=="Home"
                ) {
                    getProfiles();
                }
            });
    });

    $('.btn-like').on('click', function (event) {

        event.preventDefault();
        targetId = event.target.parentNode.parentNode.dataset['userid'];

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: 2, targetId: targetId, _token: token}
        })
            .done(function () {
                $(event.target).closest('.profile-card', 'div').animate({
                    opacity: 0.0,
                    marginLeft: '-225px',
                }, 'fast', 'linear', function() {
                    $(this).remove();
                });
                $('.modal-backdrop').css('z-index','100').fadeOut(350);
                $('body').removeClass('modal-open').css("padding-right", "");
                if(
                    $('.profile-card').length<=1 && $('.card-header').html()=="Home"
                ) {
                    getProfiles();
                }
            });
    });
};