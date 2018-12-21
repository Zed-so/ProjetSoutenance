stats = {};
pts = 10;

function creeStats()
{
    
    stats.force = Math.floor(Math.random() * 6) + 10;
    stats.dext = Math.floor(Math.random() * 6) + 10;
    stats.const = Math.floor(Math.random() * 6) + 10;
    stats.hp = stats.const + Math.floor(Math.random() * 10);
}

//creeStats();

$(document).ready(function(){
//alert();


        $('#pts').html(pts);
        creeStats();
        $('#force').html(stats.force);
        $('#dext').html(stats.dext);
        $('#const').html( stats.const);
        $('#hp').html(stats.hp);

 //click du bouton pour relancer
    $('#change').click(function(){
        //alert();
       
        creeStats();
        $('#force').html(stats.force);
        $('#dext').html(stats.dext);
        $('#const').html( stats.const);
        $('#hp').html(stats.hp) ;
    })

    //click du bouton valider
    $('#valide').click(function(){
        //alert('ok');//debug


        $forceValide = stats.force
        $dextValide = stats.dext
        $constValide = stats.const
        $hpValide = stats.hp

        $('.stats').hide();
        $('.carou').show();

       /* $.ajax({
            url: 'creation',
            type: 'post',
            data: {'id': $(this).prop('id').substr(1)},
            dataType: 'json',
            error: function(a,b,c){
                alert(a+b+c);
            },
            success: function(data){
                window.location.reload();
                $('#message').html(data.msg);
            }


        });*/// fin ajax
    });// fin bouton validation cliqué



});


/*document.getElementById('change').addEventListener('click', function(e){
    e.preventDefault();
    creeStats();
    document.getElementById('force').innerHTML = stats.force;
    document.getElementById('dext').innerHTML = stats.dext;
    document.getElementById('const').innerHTML = stats.const;
    document.getElementById('hp').innerHTML = stats.hp;
})*/