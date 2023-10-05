const { upperCase } = require("lodash");

var forms = document.querySelectorAll("form");
if(forms){
    forms.forEach(function(form) {
        form.addEventListener("submit", function(e) {
            e.preventDefault();
            var menssagem = "";
            var method = form.querySelector("input[name='_method']");
            if(!method){
                menssagem = "Deseja realmente salvar?";
            }else{
                switch (upperCase(method.value)) {
                    case "DELETE":
                        menssagem = "Deseja realmente excluir?";
                        break;
                    case "PATCH":
                        menssagem = "Deseja realmente atualizar?";
                        break;
                    default:
                        break;
                }
            }           
            var confirmacao = confirm(menssagem);
            if (confirmacao) {
                form.submit();
            }
        });
    });
}
