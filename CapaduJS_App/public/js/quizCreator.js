var socket = io();
var params = jQuery.deparam(window.location.search);

var questionNum = 1; //Starts at two because question 1 is already present

//When host connects to server
socket.on('connect', function() {

    //Check if server access tocken is valid
    socket.emit('validator', params);

});

socket.on('InvalidTocken', function(){
    window.location.href = 'http://capadu/profesor';//Redirect user to control panel
});

function updateDatabase(){
    var questions = [];
    var name = document.getElementById('name').value;
    for(var i = 1; i <= questionNum; i++){
        var question = document.getElementById('q' + i).value;
        var answer1 = document.getElementById(i + 'a1').value;
        var answer2 = document.getElementById(i + 'a2').value;
        var answer3 = document.getElementById(i + 'a3').value;
        var answer4 = document.getElementById(i + 'a4').value;
        var correct = document.getElementById('correct' + i).value;
        var answers = [answer1, answer2, answer3, answer4];
        questions.push({"question": question, "answers": answers, "correct": correct})
    }
    
    var quiz = {id: 0, "name": name, "questions": questions, "tocken": params.tocken};
    socket.emit('newQuiz', quiz);
}

function addQuestion(){
    questionNum += 1;
    
    var questionsDiv = document.getElementById('allQuestions');
    
    var newQuestionDiv = document.createElement("div");
    
    var questionField = document.createElement('input');
    
    var answer1Label = document.createElement('label');
    var answer1Field = document.createElement('input');
    
    var answer2Label = document.createElement('label');
    var answer2Field = document.createElement('input');
    
    var answer3Label = document.createElement('label');
    var answer3Field = document.createElement('input');
    
    var answer4Label = document.createElement('label');
    var answer4Field = document.createElement('input');
    
    var correctLabel = document.createElement('label');
    var correctLabel_bold = document.createElement('b');
    var correctLabel_data = document.createElement('p');
    var correctField = document.createElement('input');
    

    questionField.setAttribute('placeholder', "Intrebarea " + String(questionNum) + ": ");
    questionField.setAttribute('class', 'question');
    questionField.setAttribute('id', 'q' + String(questionNum));
    questionField.setAttribute('type', 'text');
    
    answer1Label.innerHTML = "Raspunsul 1: ";
    answer2Label.innerHTML = " Raspunsul 2: ";
    answer3Label.innerHTML = "Raspunsul 3: ";
    answer4Label.innerHTML = " Raspunsul 4: ";

    correctLabel_data.innerHTML = "Correct Answer (1-4): ";
    correctLabel_bold.appendChild(correctLabel_data);
    correctLabel.appendChild(correctLabel_bold);
    
    answer1Field.setAttribute('id', String(questionNum) + "a1");
    answer1Field.setAttribute('type', 'text');
    answer2Field.setAttribute('id', String(questionNum) + "a2");
    answer2Field.setAttribute('type', 'text');
    answer3Field.setAttribute('id', String(questionNum) + "a3");
    answer3Field.setAttribute('type', 'text');
    answer4Field.setAttribute('id', String(questionNum) + "a4");
    answer4Field.setAttribute('type', 'text');

    correctField.setAttribute('id', 'correct' + String(questionNum));
    correctField.setAttribute('type', 'number');
    correctField.setAttribute('value', '1');
    correctField.setAttribute('min', '1');
    correctField.setAttribute('max', '4');
    
    newQuestionDiv.setAttribute('id', 'question-field');//Sets class of div
    
    newQuestionDiv.appendChild(questionField);
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(answer1Label);
    newQuestionDiv.appendChild(answer1Field);
    newQuestionDiv.appendChild(answer2Label);
    newQuestionDiv.appendChild(answer2Field);
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(answer3Label);
    newQuestionDiv.appendChild(answer3Field);
    newQuestionDiv.appendChild(answer4Label);
    newQuestionDiv.appendChild(answer4Field);
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(correctLabel);
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(correctField);
    newQuestionDiv.appendChild(document.createElement('br'));
    newQuestionDiv.appendChild(document.createElement('br'));
    
    questionsDiv.appendChild(document.createElement('br'));//Creates a break between each question
    questionsDiv.appendChild(newQuestionDiv);//Adds the question div to the screen
    
    newQuestionDiv.style.backgroundColor = randomColor();
}

//Called when user wants to exit quiz creator
function cancelQuiz(){
    if (confirm("Esti sigur ca vrei sa parasesti pagina ?")) {
        window.location.href = "http://capadu/profesor";
    }
}

socket.on('returnFromCreator', function(){
    window.location.href = "../../create/?tocken=" + params.tocken;
});

function randomColor(){
    
    var colors = ['rgba(249, 0, 0, 0.7)', 'rgba(249, 112, 0, 0.7)', 'rgba(243, 240, 41, 0.7)', 'rgba(39, 11, 141, 0.7)'];
    var randomNum = Math.floor(Math.random() * 4);
    return colors[randomNum];
}

function setBGColor(){
    var randColor = randomColor();
    document.getElementById('question-field').style.backgroundColor = randColor;
}









