var socket = io();
var params = jQuery.deparam(window.location.search);


socket.on('connect', function(){

    //Check if server access tocken is valid
    socket.emit('validator', params);

    socket.emit('requestDbNames', params.tocken);//Get database names to display to user
});

socket.on('gameNamesData', function(data){
    for(var i = 0; i < Object.keys(data).length; i++){
        var div = document.getElementById('game-list');
        var button = document.createElement('button');
        
        button.innerHTML = data[i].name;
        button.setAttribute('onClick', "startGame('" + data[i].id + "')");
        button.setAttribute('id', 'gameButton');
        
        div.appendChild(button);
        div.appendChild(document.createElement('br'));
        div.appendChild(document.createElement('br'));
    }
});

socket.on('InvalidTocken', function(){
    window.location.href = 'http://capadu/profesor';//Redirect user to control panel
});

function startGame(data){
    window.location.href="/host/" + "?id=" + data + "&tocken=" + params.tocken;
}
