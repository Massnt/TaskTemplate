KB.onChange('#template-select', function () {
    let templateId = $('#template-select').val();

    if (templateId) {
        if (templateId && templateId !== "0") {
            KB.http.get('/kanboard/?controller=TemplateController&action=getTemplate&plugin=TaskTemplate&id=' + templateId)
                .success(function (data) {
                    $('#form-title').val(data.titulo);
                    $('textarea[name="description"]').val(data.descricao);
                })
        } else if(templateId === "0") {
            $('#form-title').val('');
            $('textarea[name="description"]').val('');
        }
    }
})



