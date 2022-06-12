const hinhanhUploader = document.querySelectorAll(".hinhanh-uploader");
const editor = document.querySelector('#mo_ta');

hinhanhUploader.forEach(uploader => {
    uploader.addEventListener("change", function (e) {
        const fileReader = new FileReader();
        const label = $(uploader).parent();
        const fileSource = e.target.files[0];
        fileReader.onload = function () {
            label.css({
                "background-image": `url(${fileReader.result})`
            })
        }
        fileReader.readAsDataURL(fileSource)
    })
})

ClassicEditor
    .create(editor)
    .then( editor => {
        console.log('Editor was initialized', editor);
    })
    .catch(error => {
        console.error( error.stack );
    });
