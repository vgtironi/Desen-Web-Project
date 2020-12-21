$(function(){
  $("#form-test").on("submit",function(){
    nome_input = $("input[name='name']");
    email_input = $("input[name='email']");
    senha_input = $("input[name='password']");
    conf_input = $("input[name='confirm_password']");

    if(nome_input.val() == "" || nome_input.val() == null)
    {
      $("#erro-nome").html("O nome é obrigatorio");
      return(false);
    }

    if(email_input.val() == "" || email_input.val() == null)
    {
      $("#erro-email").html("O email é obrigatorio");
      return(false);
    }

    if(senha_input.val() == "" || senha_input.val() == null)
    {
      $("#erro-senha").html("A senha é obrigatória");
      return(false);
    }

    if(conf_input.val() == "" || conf_input.val() == null)
    {
      $("#erro-conf").html("A confirmação é obrigatória");
      return(false);
    }

    return(true);
  });
});
