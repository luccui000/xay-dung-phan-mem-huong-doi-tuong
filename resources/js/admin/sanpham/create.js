export function handleHinhanhUpload(hinhanhUploader) {
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
}
// export function makeEditor(editor, options, callback)
// {
//     ClassicEditor
//         .create(editor, options)
//         .then( editor => {
//             callback(editor);
//         })
//         .catch(error => {
//             console.error( error.stack );
//         });
// }
