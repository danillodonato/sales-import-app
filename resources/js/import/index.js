$("#btn-import").on("click", () => {
    console.log(base_url);
    $.ajax({
        url: base_url + "/sales-import/send",
        method: "POST",
        data: {}
    })
});