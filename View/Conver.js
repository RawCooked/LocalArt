
document.addEventListener('DOMContentLoaded', function() {
    var myImages = document.querySelectorAll(".img-fluid.rounded-circle.mb-3.contact_img");

    myImages.forEach(function(myImage) {
        myImage.addEventListener('click', function() {
            var linkUrl = 'MessClient.php';
            window.open(linkUrl, '_blank');
        });
    });
});

