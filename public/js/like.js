var targetId = 0;
$('.btn-dislike').on('click', function(event){

    event.preventDefault();
   targetId = event.target.parentNode.parentNode.dataset['userid'];
    window.alert(targetId);
    window.alert(0);

    $.ajax({
        method : 'POST',
        url: urlLike,
        data : {isLike: 0, targetId: targetId, _token: token}
    })
        .done(function(){
            //change the page

        });
});


$('.btn-no-like-status').on('click', function(event){

    event.preventDefault();
    targetId = event.target.parentNode.parentNode.dataset['userid'];
    window.alert(targetId);
    window.alert(1);

    $.ajax({
        method : 'POST',
        url: urlLike,
        data : {isLike: 1, targetId: targetId, _token: token}
    })
        .done(function(){
            //change the page

        });
});

$('.btn-like').on('click', function(event){

    event.preventDefault();
    targetId = event.target.parentNode.parentNode.dataset['userid'];
    window.alert(targetId);
    window.alert(2);

    $.ajax({
        method : 'POST',
        url: urlLike,
        data : {isLike: 2, targetId: targetId, _token: token}
    })
        .done(function(){
            //change the page

        });
});



