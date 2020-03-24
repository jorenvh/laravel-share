function copyLinkFunction() {
    /* Get the text field */
    var dummyContent = document.getElementById("copyLink").textContent;
    var dummy = $('<input id="dummy">').val(dummyContent).appendTo('body').select();
    document.execCommand('copy');
    var element = document.getElementById("dummy");
    element.parentNode.removeChild(element);
}
