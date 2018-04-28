var targetId = 0;
$('.like').on('click', function(event){

    event.preventDefault();
    targetId = event.target.parentNode.parentNode.dataset['targetId'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method : 'POST',
        url: urlLike,
        data : {isLike: isLike, targetId: targetId, _token: token}
    })
        .done(function(){

           event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You dont like this post' : 'Dislike';
            window.alert(targetId);
            window.alert(urlLike);
            window.alert(event.target.innerText);
           if(isLike){

               event.target.nextElementSibling.innerText = 'Dislike';


           }else {
               event.target.nextElementSibling.innerText = 'Like';

           }


        });
    console.log(event);
});
