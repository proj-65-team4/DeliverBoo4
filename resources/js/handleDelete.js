window.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".form-delete");

    console.log(forms);
    for (const form of forms) {
        form.addEventListener("submit", function(e){
            e.preventDefault();

            const result = confirm("Sei sicuro di voler cancellare questo elemento?")

            if(result){
                form.submit();
            }
        })
    }
})