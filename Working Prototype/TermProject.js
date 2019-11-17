function openImage(image) {
    var newTab = window.open("", "Image", "width=800,height=600");
    setTimeout(function() {
        newTab.document.body.innerHTML = image.innerHTML;
    }, 500);
    return false;
}