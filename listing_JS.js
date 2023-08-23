const uploadImage = document.getElementById("uploadImage");
const previewContainer = document.getElementById("displayImage");
const previewImage = previewContainer.querySelector(".image-preview-img");
const previewSpan = previewContainer.querySelector(".image-preview-span");

uploadImage.addEventListener("change", function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        previewSpan.style.display = "none";
        previewImage.style.display = "block";

        reader.addEventListener("load", function() {
            previewImage.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    } else {

        previewSpan.style.display = null;
        previewImage.style.display = null;

        previewImage.setAttribute("src", "");
    }
});