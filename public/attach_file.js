function attach_file() {
    let addInputBtn = document.getElementById("button_attach_file");
    let inputOne = document.createElement("input");
    let labelTwo = document.createTextNode("Description: ");
    let newLine = document.createElement("br");
    let inputTwo = document.createElement("input");

    inputOne.setAttribute("name", "descriptions[]");
    inputOne.setAttribute(

        "style",

        "padding: 12px 20px; margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;"
    );
    inputTwo.setAttribute("name", "image_files[]");
    inputTwo.setAttribute("type", "file");
    inputTwo.setAttribute(
        "style",

        "display: flex; justify-content: center; align-content: center; padding-top: 10px;"
    );

    addInputBtn.parentNode.insertBefore(newLine, addInputBtn);
    addInputBtn.parentNode.insertBefore(inputTwo, addInputBtn);
    addInputBtn.parentNode.insertBefore(labelTwo, addInputBtn);
    addInputBtn.parentNode.insertBefore(inputOne, addInputBtn);
    addInputBtn.parentNode.insertBefore(newLine, addInputBtn);
}

module.exports = attach_file;
