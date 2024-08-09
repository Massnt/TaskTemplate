let valoresAlterados = false

let observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        var elemento = document.querySelector("#modal-overlay");
        if (elemento) {
            let controller = new URL('http://controller.com' + $('form[method="post"]').attr('action')).searchParams.get('controller');

            if (controller == "TaskCreationController" && !valoresAlterados) {
                let templateId = $('#template-select').val();

                if (templateId && templateId !== "0") {
                    KB.http.get('/kanboard/?controller=TemplateController&action=getTemplate&plugin=TaskTemplate&id=' + templateId)
                        .success(function (data) {
                            $('#form-title').val(data.titulo);
                            $('textarea[name="description"]').val(data.descricao);
                            valoresAlterados = true;
                        })
                }
            }
        }
        else{
            valoresAlterados = false;
        }
    });
});

observer.observe(document.body, { childList: true, subtree: true });

