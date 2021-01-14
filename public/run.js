function delim() {
    
    // start 
    var btnSeparatorType = document.getElementById('btnSeparatorType');

    // select option Comma(,) 
    var ddComma = document.getElementById('ddComma');

    ddComma.addEventListener('click', function () {
        btnSeparatorType.innerHTML = ",";
    })

    // select option SemiColon(;) 
    var ddSemiColon = document.getElementById('ddSemiColon');

    ddSemiColon.addEventListener('click', function () {
        btnSeparatorType.innerHTML = ";";
    });

    // select option pipe(|) 
    var ddHLine = document.getElementById('ddHLine');

    ddHLine.addEventListener('click', function () {
        btnSeparatorType.innerHTML = "|";
    });

     // select option space
    var ddSpace = document.getElementById('ddSpace');

    ddSpace.addEventListener('click', function () {
        btnSeparatorType.innerHTML = "Space";
    });
    
    
    
     //select option funcs end
     

    //  separating strings
    var separatorType = document.getElementById('btnSeparatorType').innerHTML;
        
    var btnSeperateMultiline = document.getElementById('btnSeperateMultiline');

    btnSeperateMultiline.addEventListener('click', function () {
        separatorType = document.getElementById('btnSeparatorType').innerHTML;
        if (separatorType == "Space") {
            document.getElementById('Textarea2').value = separateMultiline(" ");
        } else {
            document.getElementById('Textarea2').value = separateMultiline(separatorType);
        }

    });

    var btnClear = document.getElementById('btnClear');

    btnClear.addEventListener('click', function () {
        document.getElementById('Textarea1').value = "";
        document.getElementById('Textarea2').value = "";
    });
 

}


// funtion for delimiting

function separateMultiline (separator) {
    var inputText = document.getElementById('Textarea1').value;

    var inputTextArr = inputText.split("\n");

    var outputText = "";

    for (i of inputTextArr) {
        outputText = outputText + i.toLocaleString() + separator.toLocaleString();
    }

    return outputText.slice(0, outputText.length - 1);
}

var body = document.getElementsByTagName('body')[0];

body.onload = function () {
    delim();
};

ipc.on ('new-selector', function(event,arg){
    var newSelector = String(arg);
    btnSeparatorType.innerHTML = newSelector.toLocaleString('en');
});